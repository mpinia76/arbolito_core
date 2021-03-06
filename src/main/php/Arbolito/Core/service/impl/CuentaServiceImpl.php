<?php
namespace Arbolito\Core\service\impl;


use Arbolito\Core\model\MovimientoCuenta;

use Arbolito\Core\model\Cuenta;

use Arbolito\Core\criteria\CuentaCriteria;

use Arbolito\Core\model\Empleado;

use Arbolito\Core\service\ICuentaService;

use Arbolito\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;

/**
 * servicio para cuenta
 *
 * @author Marcos
 * @since 09-03-2018
 *
 */
class CuentaServiceImpl extends CrudService implements ICuentaService {


	protected function getDAO(){
		return DAOFactory::getCuentaDAO();
	}

	function validateOnAdd( $entity ){

		//unicidad (numero + fecha + horaApertura )

	}


	function validateOnUpdate( $entity ){

		$this->validateOnAdd($entity);
	}

	function validateOnDelete( $oid ){}




}
