<?php

namespace Arbolito\Core\model;

use Arbolito\Core\utils\ArbolitoUtils;

use Cose\model\impl\Entity;

use Cose\Security\model\User;

use Cose\utils\Logger;

/**
 * CuentaCorriente
 *
 * @Entity @Table(name="arbolito_caja")
 *
 * @author Marcos
 * @since 22-03-2018
 */

class Caja extends Cuenta{

	//variables de instancia.




	public function __construct(){
	}

	public function __toString(){
		 return  "Caja"; // .CuentasUtils::formatMontoToView($this->getSaldo()) ;
	}
}
?>
