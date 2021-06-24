<?php

namespace Arbolito\Core\Test\bancos;

include_once dirname(__DIR__). '/conf/init.php';

use Arbolito\Core\Test\GenericTest;
use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\BancoCriteria;
use Arbolito\Core\utils\ArbolitoUtils;
use Cose\Security\service\SecurityContext;

class BalanceGastosTest extends GenericTest{

	/**
	 * @Security( permission="listar_bancos" )
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getMovimientoGastoService();

		$this->log("balance de gastos", __CLASS__);

		$desde = new \DateTime("2015-01-01");
		$hasta = new \DateTime("2015-02-08");

		$totales = $service->getBalance( $desde, $hasta );

		$this->log("Total: " . ArbolitoUtils::formatMontoToView($totales) , __CLASS__);


	}
}
?>
