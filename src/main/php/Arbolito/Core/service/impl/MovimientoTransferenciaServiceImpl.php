<?php
namespace Arbolito\Core\service\impl;


use Arbolito\Core\model\Cuenta;

use Arbolito\Core\service\IMovimientoCuentaService;

use Arbolito\Core\model\MovimientoVenta;

use Arbolito\Core\service\ServiceFactory;

use Arbolito\Core\model\Caja;

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
 * servicio para MovimientoTransferencia
 *
 *  @author Marcos
 * @since 02-08-2018
 *
 */
class MovimientoTransferenciaServiceImpl extends MovimientoCuentaServiceImpl {


	protected function getDAO(){
		return DAOFactory::getMovimientoTransferenciaDAO();
	}

	function getTotales( Cuenta $cuenta=null, \Datetime $fecha = null){

		$result = $this->getDAO()->getTotales($cuenta, $fecha);
		$totales = $result[0];
		return $totales["haber"] - $totales["debe"];

	}

}
