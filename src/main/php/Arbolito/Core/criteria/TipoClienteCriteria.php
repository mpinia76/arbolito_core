<?php
namespace Arbolito\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de tipoCliente
 *
 * @author Marcos
 *
 */
class TipoClienteCriteria extends Criteria{

	private $nombre;

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


	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}




}
