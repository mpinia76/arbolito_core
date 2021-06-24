<?php

namespace Arbolito\Core\Test\cajas;

use Arbolito\Core\model\CajaChica;

use Arbolito\Core\utils\ArbolitoUtils;

use Arbolito\Core\model\Caja;

use Arbolito\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\CajaCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddCajasTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getCajaChicaService();

		\Logger::getLogger(__CLASS__)->info("agregando caja chica");

		$caja = new CajaChica();
		$caja->setNumero("1");
		$caja->setFecha( new \Datetime() );
		$caja->setSaldoInicial( 0 );
		$caja->setSaldo( 0 );
		$service->add( $caja );


	}
}
?>
