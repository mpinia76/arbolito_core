<?php

namespace Arbolito\Core\Test\gastos;


include_once dirname(__DIR__). '/conf/init.php';

use Arbolito\Core\Test\GenericTest;
use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\GastoCriteria;

use Cose\Security\service\SecurityContext;

class ListGastoTest extends GenericTest{

	/**
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getGastoService();

		$this->log("listando gastoss", __CLASS__);

		$criteria = new GastoCriteria();

		$entities = $service->getList( $criteria );

		foreach ($entities as $entity) {

			$this->log("Gasto: " . $entity, __CLASS__);

		}

	}
}
?>
