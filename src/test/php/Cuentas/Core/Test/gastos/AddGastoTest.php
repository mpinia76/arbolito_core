<?php

namespace Arbolito\Core\Test\gastos;

use Arbolito\Core\utils\ArbolitoUtils;

use Arbolito\Core\model\EstadoGasto;

use Arbolito\Core\model\Gasto;

use Arbolito\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\GastoCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddGastoTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getSucursalService();

		\Logger::getLogger(__CLASS__)->info("agregando Gasto");

		$gasto = new Gasto();
		$gasto->setEstado(EstadoGasto::Realizado);
		$gasto->setFechaHora( new \Datetime() );
		$gasto->setMonto(380);

		$gasto->setVendedor( ArbolitoUtils::getEmpleadoDefault() );

		$gasto->setUser(ArbolitoUtils::getUserByUsername("bernardo"));
		$gasto->setConcepto( ArbolitoUtils::getConceptoGastoVarios() );

		$service->add( $gasto );


	}
}
?>
