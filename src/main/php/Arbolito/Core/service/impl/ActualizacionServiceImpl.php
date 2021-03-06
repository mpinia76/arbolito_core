<?php
namespace Arbolito\Core\service\impl;


use Arbolito\Core\service\ServiceFactory;

use Arbolito\Core\utils\ArbolitoUtils;

use Arbolito\Core\model\Actualizacion;



use Arbolito\Core\service\IActualizacionService;

use Arbolito\Core\dao\DAOFactory;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;
use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;
use Cose\Security\model\User;

/**
 * servicio para Actualizacion
 *
 * @author Marcos
 * @since 13-02-2020
 *
 */
class ActualizacionServiceImpl extends CrudService implements IActualizacionService {


	protected function getDAO(){
		return DAOFactory::getActualizacionDAO();
	}


	function validateOnAdd( $entity ){

		//TODO
	}


	function validateOnUpdate( $entity ){

		$this->validateOnAdd($entity);
	}

	function validateOnDelete( $oid ){}




}
