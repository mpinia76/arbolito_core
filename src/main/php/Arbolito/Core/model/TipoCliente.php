<?php

namespace Arbolito\Core\model;

use Cose\model\impl\Entity;

use Cose\utils\Logger;

/**
 * TipoCliente
 *
 * @Entity @Table(name="arbolito_tipo_cliente")
 *
 * @author Marcos
 */

class TipoCliente extends Entity{

	//variables de instancia.

	/**
	 * @Column(type="string")
	 * @var string
	 */
	private $nombre;

    /** @Column(type="boolean") **/
    private $pagaCuota;

    /**
     * @return mixed
     */
    public function getPagaCuota()
    {
        return $this->pagaCuota;
    }

    /**
     * @param mixed $pagaCuota
     */
    public function setPagaCuota($pagaCuota)
    {
        $this->pagaCuota = $pagaCuota;
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
