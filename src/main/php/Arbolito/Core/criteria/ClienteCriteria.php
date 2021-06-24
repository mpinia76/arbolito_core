<?php
namespace Arbolito\Core\criteria;

use Cose\criteria\impl\Criteria;

/**
 * criteria de cliente
 *
 * @author Marcos
 *
 */
class ClienteCriteria extends Criteria{

	private $nombre;
	private $mail;
	private $documento;

	private $tieneCtaCte;

    private $tipoCliente;

    private $tiposIn;

    private $tiposNotIn;

    /**
     * @return mixed
     */
    public function getTiposIn()
    {
        return $this->tiposIn;
    }

    /**
     * @param mixed $tiposIn
     */
    public function setTiposIn($tiposIn)
    {
        $this->tiposIn = $tiposIn;
    }

    /**
     * @return mixed
     */
    public function getTiposNotIn()
    {
        return $this->tiposNotIn;
    }

    /**
     * @param mixed $tiposNotIn
     */
    public function setTiposNotIn($tiposNotIn)
    {
        $this->tiposNotIn = $tiposNotIn;
    }

    /**
     * @return mixed
     */
    public function getTipoCliente()
    {
        return $this->tipoCliente;
    }

    /**
     * @param mixed $tipoCliente
     */
    public function setTipoCliente($tipoCliente)
    {
        $this->tipoCliente = $tipoCliente;
    }

    private $nroSocio;

    /**
     * @return mixed
     */
    public function getNroSocio()
    {
        return $this->nroSocio;
    }

    /**
     * @param mixed $nroSocio
     */
    public function setNroSocio($nroSocio)
    {
        $this->nroSocio = $nroSocio;
    }

	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	public function getMail()
	{
	    return $this->mail;
	}

	public function setMail($mail)
	{
	    $this->mail = $mail;
	}

	public function getDocumento()
	{
	    return $this->documento;
	}

	public function setDocumento($documento)
	{
	    $this->documento = $documento;
	}

	public function getTieneCtaCte()
	{
	    return $this->tieneCtaCte;
	}

	public function setTieneCtaCte($tieneCtaCte)
	{
	    $this->tieneCtaCte = $tieneCtaCte;
	}
}
