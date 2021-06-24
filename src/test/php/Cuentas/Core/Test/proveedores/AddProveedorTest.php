<?php

namespace Arbolito\Core\Test\proveedores;

use Arbolito\Core\model\Proveedor;

use Arbolito\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\ProveedorCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddProveedorTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getProveedorService();

		\Logger::getLogger(__CLASS__)->info("agregando Proveedor");

		$proveedor = new Proveedor();
		$proveedor->setNombre("LOTERÍAS");
		//$proveedor->setApellido("LOTERÍAS");
		$proveedor->setRazonSocial("Lotería y Casinos de la Pcia de Bs As");
		$proveedor->setFechaAlta( new \DateTime() );
		$service->add( $proveedor );


	}
}
?>
