<?php

namespace Arbolito\Core\Test\clientes;

include_once dirname(__DIR__). '/conf/init.php';

use Arbolito\Core\Test\GenericTest;
use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\ClienteCriteria;

use Cose\Security\service\SecurityContext;

class ListClientesTest extends GenericTest{

	/**
	 * @Security( permission="listar_clientes" )
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getClienteService();

		$this->log("listando clientes", __CLASS__);

		$criteria = new ClienteCriteria();
		$criteria->setMaxResult(5);
		//$criteria->setNombre("Ber");

		$clientes = $service->getList( $criteria );

		foreach ($clientes as $cliente) {

			$this->log("Cliente: " . $cliente, __CLASS__);

		}

	}
}
?>
