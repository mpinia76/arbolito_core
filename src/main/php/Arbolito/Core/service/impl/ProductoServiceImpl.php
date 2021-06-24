<?php
namespace Arbolito\Core\service\impl;

use Arbolito\Core\criteria\ClienteCriteria;
use Arbolito\Core\criteria\ProductoCriteria;

use Arbolito\Core\criteria\TipoClienteCriteria;
use Arbolito\Core\dao\DAOFactory;

use Arbolito\Core\model\DetalleVenta;
use Arbolito\Core\model\Venta;
use arbolito\Core\Proxies\__CG__\Arbolito\Core\model\Cliente;
use Arbolito\Core\service\IProductoService;

use Arbolito\Core\service\ServiceFactory;
use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;

use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;


/**
 * servicio para Producto
 *
 * @author Marcos
 * @since 28-02-2018
 *
 */
class ProductoServiceImpl extends CrudService implements IProductoService {


	protected function getDAO(){
		return DAOFactory::getProductoDAO();
	}


	/**
	 * redefino el add para agregar funcionalidad
	 * @param $entity
	 * @throws ServiceException
	 */
	public function add($entity){

		/*
		 * Hacemos lo que queremos con la estado.
		 * Por ejemplo, enviar un email al usuario.
		 */

		//agregamos la estado.

		parent::add($entity);

	}

	function validateOnAdd( $entity ){

		/*
		 * Realizamos validaciones sobre la estado.
		 * Por ejemplo, campos obligatorios.
		 */
	}


	function validateOnUpdate( $entity ){

		/*
		 * Validaciones como en el add pero
		 * las necesarias para modificar.
		 */

		$this->validateOnAdd($entity);
	}

	function validateOnDelete( $oid ){

		/*
		 * validaciones al borrar una estado.
		 */
	}

	/**
	 * (non-PHPdoc)
	 * @see src/main/php/Arbolito/Core/service/Arbolito\Core\service.IProductoService::getProductosDebajoStockMinimo()
	 */
	public function getProductosDebajoStockMinimo(){



		$criteria = new ProductoCriteria();
		$criteria->setStockMinimo(1);

		return $this->getList( $criteria );
	}


    function asignar( $entity, $user ){
        $criteria = new TipoClienteCriteria();
        $criteria->setPagaCuota(1);

        $tiposCliente = ServiceFactory::getTipoClienteService()->getList( $criteria );
        $oids = array();
        foreach ($tiposCliente as $tipoCliente){
            $oids[]=$tipoCliente->getOid();
        }
        $criteria = new ClienteCriteria();
        $criteria->setTiposIn($oids);
        $clientes = ServiceFactory::getClienteService()->getList( $criteria );
        foreach ($clientes as $cliente){

            $venta = new Venta();
            $venta->setFecha( new \Datetime() );
            $venta->setCliente($cliente);
            $venta->setUser($user);

            $detalle = new DetalleVenta();

            $detalle->setCantidad( 1);
            $detalle->setPrecioUnitario($entity->getPrecioLista()  );
            $detalle->setCosto( $entity->getCosto()   );
            $detalle->setStockActualizado( 1);
            $detalle->setProducto( $entity);



            $venta->addDetalle( $detalle );

            try {

                ServiceFactory::getVentaService()->add($venta);

            } catch (\Exception $e) {

                //throw new RastyException( $e->getMessage() );

            }




        }
    }

}
