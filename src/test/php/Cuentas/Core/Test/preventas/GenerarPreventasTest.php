<?php

namespace Arbolito\Core\Test\preventas;

use Arbolito\Core\model\DetallePreventaRecurrente;

use Arbolito\Core\utils\ArbolitoUtils;

use Arbolito\Core\model\PreventaRecurrente;

use Arbolito\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\PreventaRecurrenteCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class GenerarPreventasTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getPreventaRecurrenteService();

		\Logger::getLogger(__CLASS__)->info("generando preventas");

		$this->persistenceContext->beginTransaction();

		$fecha = new \DateTime();
		$fecha->modify("+2 days");
		$service->generarPreventas( $fecha );


		$this->persistenceContext->commit();
	}
}
?>
