<?php
namespace Arbolito\Core\service\impl;


use Arbolito\Core\criteria\MovimientoPedidoCriteria;

use Arbolito\Core\model\MovimientoPedido;

use Arbolito\Core\service\ServiceFactory;

use Arbolito\Core\utils\ArbolitoUtils;

use Arbolito\Core\model\EstadoPedido;

use Arbolito\Core\model\Cuenta;

use Arbolito\Core\model\Pedido;

use Arbolito\Core\service\IPedidoService;

use Arbolito\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

use Cose\Security\model\User;

/**
 * servicio para Pedido
 *
 * @author Marcos
 * @since 10-07-2020
 *
 */
class PedidoServiceImpl extends CrudService implements IPedidoService {


	protected function getDAO(){
		return DAOFactory::getPedidoDAO();
	}


	/**
	 * redefino el add
	 * @param $entity
	 * @throws ServiceException
	 */
	public function add($entity){

		$entity->setEstado( EstadoPedido::Impago );

		//calculamos el monto dado los detalles
		$monto = 0;
		foreach ($entity->getDetalles() as $detalle) {
			$monto += $detalle->getSubtotal();
		}

		$entity->setMonto( $monto );
		$entity->setMontoDebe( $monto );

		//agregamos el pedido.
		parent::add($entity);

	}

	function validateOnAdd( $entity ){

		//TODO
	if( count( $entity->getDetalles() ) == 0 ){
			throw new ServiceException("pedido.detalles.required");
		}
	}


	function validateOnUpdate( $entity ){

		$this->validateOnAdd($entity);
	}

	function validateOnDelete( $oid ){}

	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Arbolito/Core/service/Arbolito\Core\service.IPedidoService::pagar()
	 */
	public function pagar(Pedido $pedido, Cuenta $cuenta, User $user){

		$this->validateOnPagar($pedido, $cuenta);

		//seteamos el pedido como pagado
		$pedido->setEstado( EstadoPedido::Pagado );

		//obtenemos lo que hay que pagar.
		$monto = $pedido->getMonto();

		//creo un movimiento pedido "debe" por el monto a pagar.
		$movimiento = new MovimientoPedido();
		$movimiento->setDebe($monto);
		$movimiento->setHaber( 0 );
		$movimiento->setFecha( new \Datetime() );
		$movimiento->setObservaciones("");
		$movimiento->setPedido($pedido);
		$movimiento->setCuenta($cuenta);
		$movimiento->setConcepto( ArbolitoUtils::getConceptoMovimientoPedido() );
		$movimiento->setUser($user);

		ServiceFactory::getMovimientoPedidoService()->add( $movimiento );

	}

	function validateOnPagar(Pedido $pedido, Cuenta $cuenta){

		//el estado debe ser "Impago"
		if( EstadoPedido::Impago != $pedido->getEstado() ){
			throw new ServiceException("pedido.pagar.impago.required");
		}

		//TODO algo sobre la cuenta??


	}

	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Arbolito/Core/service/Arbolito\Core\service.IPedidoService::anular()
	 */
	public function anular(Pedido $pedido, User $user){


		//validamos si se puede
		$this->validateOnAnular($pedido);


		//si fue pagado, hay que generar un contramovimiento.
		if( $pedido->getEstado() == EstadoPedido::Pagado ){

			//generar contramovimiento.

			//hay que buscar el movimiento de cuenta realizado para este pedido
			//generar uno igual con el monto en haber, fecha actual y concepto "anulaci??n pedido"
			$criteria = new MovimientoPedidoCriteria();
			$criteria->setPedido($pedido);
			$movimiento = ServiceFactory::getMovimientoPedidoService()->getSingleResult( $criteria );

			$contramovimiento = $movimiento->buildContramovimiento();
			$contramovimiento->setConcepto( ArbolitoUtils::getConceptoMovimientoAnulacionPedido() );
			$contramovimiento->setUser($user);

			ServiceFactory::getMovimientoPedidoService()->add( $contramovimiento );


		}

		//si fue recibido hay que anular la recepci??n para reestablecer el stock.
		if( $pedido->isRecibido() ){
			$this->anularRecibir($pedido, $user);
		}

		//modificamos el estado del pedido
		$pedido->setEstado(EstadoPedido::Anulado);

		//persistimos los cambios.
		try {

			$this->getDAO()->update( $pedido );

		} catch (DAOException $e){

			throw new ServiceException( $e->getMessage() );

		} catch (\Exception $e) {

			throw new ServiceException( $e->getMessage() );

		}

	}

	function validateOnAnular( Pedido $pedido ){

		//que no est?? anulado
		if( !$pedido->podesAnularte() ){
			throw new ServiceException("pedido.anular.anulado");
		}

	}

	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Arbolito/Core/service/Arbolito\Core\service.IPedidoService::recibir()
	 */
	public function recibir(Pedido $pedido, User $user){


		$this->validateOnRecibir($pedido);

		$pedido->setUserRecibio($user);
		$pedido->setFechaHoraRecibido( new \Datetime() );

		//actualizamos el stock y el precio de compra de los productos recibidos.
		foreach ($pedido->getDetalles() as $detalle) {

			$producto = $detalle->getProducto();
			$cantidad = $detalle->getCantidad();
			$precio = $detalle->getPrecioUnitario();

			//$producto->updateStock( $cantidad );

			$producto->setStock($producto->getStock()+$cantidad);

			//$producto->setPrecioCompra( $precio );
			$producto->setCosto( $precio );

			$precioNuevo= $producto->getCosto()+($producto->getCosto()*($producto->getPorcentajeGanancia()/100));

			$producto->setPrecioLista($precioNuevo);
			$producto->setPrecioEfectivo($precioNuevo);

		}

		//persistimos los cambios.
		try {

			$this->getDAO()->update( $pedido );

		} catch (DAOException $e){

			throw new ServiceException( $e->getMessage() );

		} catch (\Exception $e) {

			throw new ServiceException( $e->getMessage() );

		}

	}

	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Arbolito/Core/service/Arbolito\Core\service.IPedidoService::anularRecibir()
	 */
	public function anularRecibir(Pedido $pedido, User $user){

		$this->validateOnAnularRecibir($pedido);

		$pedido->setFechaHoraRecibido( null );

		//reestablecemos el stock de los productos.
		foreach ($pedido->getDetalles() as $detalle) {

			$producto = $detalle->getProducto();
			$cantidad = $detalle->getCantidad() * (-1);
			$producto->setStock($producto->getStock()-$cantidad);
			//$producto->updateStock( $cantidad, $pedido->getSucursal() );

		}

		//persistimos los cambios.
		try {

			$this->getDAO()->update( $pedido );

		} catch (DAOException $e){

			throw new ServiceException( $e->getMessage() );

		} catch (\Exception $e) {

			throw new ServiceException( $e->getMessage() );

		}
	}


	function validateOnRecibir( Pedido $pedido ){

		//que no est?? anulado
		if( !$pedido->podesAnularte() ){
			throw new ServiceException("pedido.recibir.anulado");
		}

		//que a??n no se haya recibido
		if( $pedido->isRecibido() ){
			throw new ServiceException("pedido.recibir.recibido");
		}

	}

	function validateOnAnularRecibir( Pedido $pedido ){

		//que no est?? anulado
		if( !$pedido->podesAnularte() ){
			throw new ServiceException("pedido.anularRecibir.anulado");
		}

		//que se haya recibido
		if( !$pedido->isRecibido() ){
			throw new ServiceException("pedido.anularRecibir.noRecibido");
		}
	}


}
