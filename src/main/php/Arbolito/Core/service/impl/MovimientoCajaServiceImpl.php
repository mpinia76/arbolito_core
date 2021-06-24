<?php
namespace Arbolito\Core\service\impl;


use Arbolito\Core\criteria\MovimientoCajaCriteria;

use Arbolito\Core\model\Cuenta;

use Arbolito\Core\service\IMovimientoCajaService;

use Arbolito\Core\model\MovimientoVenta;



use Arbolito\Core\service\ServiceFactory;

use Arbolito\Core\model\Venta;



use Arbolito\Core\model\EstadoVenta;

use Arbolito\Core\service\IVentaService;

use Arbolito\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\Security\model\User;

use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

/**
 * servicio para MovimientoCaja
 *
 * @author Marcos
 * @since 09-03-2018
 *
 */
class MovimientoCajaServiceImpl extends CrudService implements IMovimientoCajaService {


	protected function getDAO(){
		return DAOFactory::getMovimientoCajaDAO();
	}

	function getMovimientos(Cuenta $cuenta, \Datetime $fecha = null){

		$criteria = new MovimientoCajaCriteria();

		$criteria->setCuenta($cuenta);
		//TODO hacer desde 00:00:00 hasta 23:59:59
		$criteria->setFecha($fecha);

		return $this->getList( $criteria );
	}

	function getMovimientosTarjetas( $cuentas, \Datetime $fecha = null){

		$criteria = new MovimientoCajaCriteria();

		$criteria->setCuentas($cuentas);
		//TODO hacer desde 00:00:00 hasta 23:59:59
		$criteria->setFecha($fecha);

		return $this->getList( $criteria );
	}



	function getTotales(Cuenta $cuenta = null, \Datetime $fecha = null){

		$debe = 0;
		$haber = 0;
		$movimientos = $this->getMovimientos($cuenta, $fecha);
		foreach ($movimientos as $movimiento) {
			$debe += $movimiento->getDebe();
			$haber += $movimiento->getHaber();
		}

		return $haber - $debe;

	}

	function getTotalesTarjetas( $cuentas, \Datetime $fecha = null){

		$debe = 0;
		$haber = 0;
		$movimientos = $this->getMovimientosTarjetas($cuentas, $fecha);
		foreach ($movimientos as $movimiento) {
			$debe += $movimiento->getDebe();
			$haber += $movimiento->getHaber();
		}

		return $haber - $debe;

	}

	function getTotalesCuentas( $cuentas, $fechaDesde=null, $fechaHasta=null){

		$debe = 0;
		$haber = 0;

		$criteria = new MovimientoCajaCriteria();

		$criteria->setCuentas($cuentas);
		$criteria->setFechaDesde($fechaDesde);
		$criteria->setFechaHasta($fechaHasta);

		$movimientos= $this->getList( $criteria );


		foreach ($movimientos as $movimiento) {
			$debe += $movimiento->getDebe();
			$haber += $movimiento->getHaber();
		}

		return $haber - $debe;

	}

	function getTotalesUsuarios(MovimientoCajaCriteria $criteria){

		$debe = 0;
		$haber = 0;


		$movimientos= $this->getList( $criteria );


		foreach ($movimientos as $movimiento) {
			$debe += $movimiento->getDebe();
			$haber += $movimiento->getHaber();
		}

		return $haber - $debe;

	}

	function getTotalesMes(Cuenta $cuenta = null, \Datetime $fecha = null){
		throw new ServiceException("sin implementar");
	}

	function getTotalesAnioPorMes(Cuenta $cuenta = null, $anio){
		throw new ServiceException("sin implementar");
	}

	/**
	 * redefino el add
	 * @param $entity
	 * @throws ServiceException
	 */
	public function add($entity){

		//actualizamos el saldo de la cuenta y le asignamos el saldo al movimiento.

		$cuenta = $entity->getCuenta();
		$saldo = $cuenta->getSaldo();

		$saldo += $entity->getHaber();
		$saldo -= $entity->getDebe();

		$cuenta->setSaldo($saldo);
		$entity->setSaldo($saldo);

		//agregamos el movimiento.
		parent::add($entity);

	}

	function validateOnAdd( $entity ){

		//TODO
	}


	function validateOnUpdate( $entity ){

		$this->validateOnAdd($entity);
	}

	function validateOnDelete( $oid ){}


}
