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

class AddPreventaRecurrenteTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getPreventaRecurrenteService();

		\Logger::getLogger(__CLASS__)->info("agregando PreventaRecurrente");

		$empleado = ServiceFactory::getEmpleadoService()->get( ArbolitoUtils::CTS_EMPLEADO_DEFAULT );
		$cliente = ServiceFactory::getClienteService()->get( ArbolitoUtils::CTS_CLIENTE_DEFAULT );
		$sucursal = ServiceFactory::getSucursalService()->get( ArbolitoUtils::CTS_SUCURSAL_DEFAULT );

		$preventaRecurrente = new PreventaRecurrente();
		$preventaRecurrente->setCliente($cliente);
		$preventaRecurrente->setVendedor($empleado);
		$preventaRecurrente->setLunes(1);
		$preventaRecurrente->setMiercoles(1);

		$detalle = new DetallePreventaRecurrente();
		$detalle->setCantidad(1);
		$detalle->setObservaciones("8 9 13 22 30 31");
		$detalle->setPrecioUnitario(20);
		$detalle->setProducto( ServiceFactory::getProductoService()->get(1) );
		$preventaRecurrente->addDetalle($detalle);

		$this->persistenceContext->beginTransaction();

		$service->add( $preventaRecurrente );


		$this->persistenceContext->commit();
	}
}
?>
