<?php

namespace Arbolito\Core\model;

use Arbolito\Core\utils\ArbolitoUtils;

use Cose\model\impl\Entity;

use Cose\Security\model\User;

use Cose\utils\Logger;

/**
 * CuentaCorriente
 *
 * @Entity @Table(name="arbolito_cuenta_corriente")
 *
 * @author Marcos
 * @since 21-03-2018
 */

class CuentaCorriente extends Cuenta{

	//variables de instancia.

	/**
     * @ManyToOne(targetEntity="Cliente",cascade={"merge"})
     * @JoinColumn(name="cliente_oid", referencedColumnName="oid")
     * @var Cliente
     **/
	private $cliente;



	public function __construct(){
	}

	public function __toString(){
		 return  $this->getCliente()->__toString()  . " " . ArbolitoUtils::formatMontoToView($this->getSaldo()) ;
	}






	public function getCliente()
	{
	    return $this->cliente;
	}

	public function setCliente($cliente)
	{
	    $this->cliente = $cliente;
	}
}
?>
