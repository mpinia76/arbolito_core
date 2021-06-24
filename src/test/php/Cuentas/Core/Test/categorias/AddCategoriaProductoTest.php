<?php

namespace Arbolito\Core\Test\categorias;

use Arbolito\Core\model\CategoriaProducto;

use Arbolito\Core\utils\ArbolitoUtils;

use Arbolito\Core\Test\GenericTest;

use Cose\Security\service\SecurityContext;

use Arbolito\Core\service\ServiceFactory;
use Arbolito\Core\criteria\CajaCriteria;

include_once dirname(__DIR__). '/conf/init.php';

class AddCategoriaProductoTest extends GenericTest{


	public function test(){


		$securityContext =  SecurityContext::getInstance();
		$securityContext->login( "bernardo", "bernardo");

		$service = ServiceFactory::getCategoriaProductoService();

		\Logger::getLogger(__CLASS__)->info("agregando CategoriaProducto");

		$cp = new CategoriaProducto();
		$cp->setNombre("RUBRO GENERAL");
		$service->add( $cp );


	}
}
?>
