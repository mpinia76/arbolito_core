<?php
namespace Arbolito\Core\service;



use Arbolito\Core\model\Cuenta;

use Arbolito\Core\model\Cliente;




use Cose\Security\model\User;

use Cose\Crud\service\ICrudService;

/**
 * interfaz para el servicio de Tarjeta
 *
 * @author Marcos
 * @since 27-03-2018
 *
 */
interface ITarjetaService extends ICrudService {



	/**
	 * se obtienen el total de ventas cobradas por cta cte
	 * para la fecha dada.
	 * @param \DateTime $fecha
	 */
	public function getTotalesVenta( \DateTime $fecha );




}
