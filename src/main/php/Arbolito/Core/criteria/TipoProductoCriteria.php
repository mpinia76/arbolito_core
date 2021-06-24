<?php
namespace Arbolito\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de tipoProducto
 *
 * @author Marcos
 *
 */
class TipoProductoCriteria extends Criteria{

	private $nombre;

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


	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}




}
