<?php

namespace Arbolito\Core\Test\empleados;

include_once dirname(__DIR__). '/conf/init.php';

use Arbolito\Core\Test\GenericTest;
use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\EmpleadoCriteria;

use Cose\Security\service\SecurityContext;

class ListEmpleadosTest extends GenericTest{

	/**
	 * @Security( permission="listar_empleados" )
	 */
	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getEmpleadoService();

		$this->log("listando empleados", __CLASS__);

		$criteria = new EmpleadoCriteria();
		$criteria->setMaxResult(5);
		//$criteria->setNombre("Ber");

		$empleados = $service->getList( $criteria );

		foreach ($empleados as $empleado) {

			$this->log("Empleado: " . $empleado, __CLASS__);

		}

	}
}
?>
