<?php

namespace Arbolito\Core\Test\sorteos;

include_once dirname(__DIR__). '/conf/init.php';

use Arbolito\Core\Test\GenericTest;
use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\SorteoCriteria;

use Cose\Security\service\SecurityContext;

class ListSorteosTest extends GenericTest{

	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getSorteoService();


		$criteria = new SorteoCriteria();
		$criteria->addOrder("oid", "DESC");
		$criteria->setMaxResult(1);
		$ultimo = $service->getSingleResult( $criteria );
		$this->log("Ultimo: " . $ultimo->getLoteria(), __CLASS__);

		$this->log("listando Sorteos", __CLASS__);

		$sorteos = $service->getUltimosSorteos();

		foreach ($sorteos as $sorteo) {

			$this->log("Sorteo: " . $sorteo, __CLASS__);

		}


	}
}
?>
