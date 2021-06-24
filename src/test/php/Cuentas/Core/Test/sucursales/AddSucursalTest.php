<?php

namespace Arbolito\Core\Test\sucursals;

use Arbolito\Core\model\Sucursal;

use Arbolito\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\SucursalCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddSucursalsTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getSucursalService();

		\Logger::getLogger(__CLASS__)->info("agregando sucursal");

		$sucursal = new Sucursal();
		$sucursal->setNombre("CASA MATRIZ");
		$service->add( $sucursal );


	}
}
?>
