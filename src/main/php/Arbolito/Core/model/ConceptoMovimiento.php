<?php

namespace Arbolito\Core\model;

use Cose\model\impl\Entity;

use Cose\utils\Logger;

/**
 * ConceptoMovimiento
 *
 * @Entity @Table(name="arbolito_concepto_movimiento")
 *
 * @author Marcos
 */

class ConceptoMovimiento extends Entity{

	//variables de instancia.

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $nombre;




	public function __construct(){
	}

	public function __toString(){
		 return $this->getNombre();
	}


	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}
}
?>
