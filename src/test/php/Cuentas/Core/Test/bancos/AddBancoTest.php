<?php

namespace Arbolito\Core\Test\bancos;

use Arbolito\Core\utils\ArbolitoUtils;

use Arbolito\Core\model\Banco;

use Arbolito\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\BancoCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddBancosTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getBancoService();

		\Logger::getLogger(__CLASS__)->info("agregando banco");

		$banco = new Banco();
		$banco->setNombre("BAPRO");
		$banco->setNumero("33322");
		$banco->setFecha( new \Datetime() );
		$banco->setTitular("Marcos Iribarne");
		$banco->setCbu("434000003333403944");
		$banco->setCuit("20-28070832-2");
		$banco->setSaldoInicial( 0 );
		$service->add( $banco );


	}
}
?>
