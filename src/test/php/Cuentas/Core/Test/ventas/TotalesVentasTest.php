<?php

namespace Arbolito\Core\Test\ventas;

use Arbolito\Core\utils\ArbolitoUtils;

use Arbolito\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\SucursalCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class TotalesVentasTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getVentaService();

		\Logger::getLogger(__CLASS__)->info("totales de venta del día");

		$totales = $service->getTotalesDia( new \Datetime() );

		\Logger::getLogger(__CLASS__)->info( "cantidad: " . $totales["cantidad"]);
		\Logger::getLogger(__CLASS__)->info( "monto: " . $totales["monto"]);

		\Logger::getLogger(__CLASS__)->info("totales de venta del mes");

		$totales = $service->getTotalesMes( new \Datetime() );

		\Logger::getLogger(__CLASS__)->info( "cantidad: " . $totales["cantidad"]);
		\Logger::getLogger(__CLASS__)->info( "monto: " . $totales["monto"]);

	}
}
?>
