<?php

namespace Arbolito\Core\Test\bancos;

include_once dirname(__DIR__). '/conf/init.php';

use Arbolito\Core\Test\GenericTest;
use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\BancoCriteria;

use Cose\Security\service\SecurityContext;

class ListBancosTest extends GenericTest{

	/**
	 * @Security( permission="listar_bancos" )
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getBancoService();

		$this->log("listando bancos", __CLASS__);

		$criteria = new BancoCriteria();
		$criteria->setMaxResult(5);
		//$criteria->setNombre("Ber");

		$bancos = $service->getList( $criteria );

		foreach ($bancos as $banco) {

			$this->log("Banco: " . $banco, __CLASS__);

		}

	}
}
?>