<?php

namespace Arbolito\Core\Test\ventas;

use Arbolito\Core\utils\ArbolitoUtils;

use Arbolito\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\SucursalCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AnularVentaTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getVentaService();

		\Logger::getLogger(__CLASS__)->info("anulando");

		$venta = $service->get( 62  );

		$service->anular($venta, ArbolitoUtils::getUserByUsername("bernardo"));


	}
}
?>
