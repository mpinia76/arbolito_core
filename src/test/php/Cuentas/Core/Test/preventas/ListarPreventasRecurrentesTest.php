<?php

namespace Arbolito\Core\Test\preventas;

include_once dirname(__DIR__). '/conf/init.php';

use Arbolito\Core\Test\GenericTest;
use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\PreventaRecurrenteCriteria;

use Cose\Security\service\SecurityContext;

class ListPreventasRecurrentesTest extends GenericTest{

	/**
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getPreventaRecurrenteService();

		$this->log("listando PreventasRecurrentes", __CLASS__);

		$criteria = new PreventaRecurrenteCriteria();
		//$criteria->setMartes(1);
		$pr = $service->getList( $criteria );

		foreach ($pr as $prevRec) {

			$this->log( $prevRec->__toString(), __CLASS__);

		}

	}
}
?>
