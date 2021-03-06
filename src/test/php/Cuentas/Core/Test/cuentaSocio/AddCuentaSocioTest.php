<?php

namespace Arbolito\Core\Test\cuentaSocios;

use Arbolito\Core\utils\ArbolitoUtils;

use Arbolito\Core\model\CuentaSocio;

use Arbolito\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\CuentaSocioCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddCuentaSociosTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getCuentaSocioService();

		\Logger::getLogger(__CLASS__)->info("agregando cuentaSocio");

		$cuentaSocio = new CuentaSocio();
		$cuentaSocio->setNombre("Marcos");
		$cuentaSocio->setNumero("1");
		$cuentaSocio->setFecha( new \Datetime() );
		$cuentaSocio->setSaldoInicial( 0 );
		$service->add( $cuentaSocio );

		$cuentaSocio = new CuentaSocio();
		$cuentaSocio->setNombre("Hernán");
		$cuentaSocio->setNumero("2");
		$cuentaSocio->setFecha( new \Datetime() );
		$cuentaSocio->setSaldoInicial( 0 );
		$service->add( $cuentaSocio );

	}
}
?>
