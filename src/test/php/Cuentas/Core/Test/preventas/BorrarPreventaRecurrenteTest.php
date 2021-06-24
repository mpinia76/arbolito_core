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

class BorrarPreventaRecurrenteTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getPreventaRecurrenteService();

		\Logger::getLogger(__CLASS__)->info("borrando PreventaRecurrente");

		$this->persistenceContext->beginTransaction();

		$service->delete( 5 );


		$this->persistenceContext->commit();
	}
}
?>
