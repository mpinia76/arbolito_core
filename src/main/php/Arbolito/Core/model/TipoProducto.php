<?php

namespace Arbolito\Core\model;

use Cose\model\impl\Entity;

use Cose\utils\Logger;

/**
 * TipoProducto
 *
 * @Entity @Table(name="arbolito_tipo_producto")
 *
 * @author Marcos
 */

class TipoProducto extends Entity{

	//variables de instancia.

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $nombre;


    /** @Column(type="boolean") **/
    private $stock;

    /**
     * @return mixed
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param mixed $stock
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
    }

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
