<?php
namespace Arbolito\Core\service\impl;


use Arbolito\Core\dao\DAOFactory;

use Arbolito\Core\service\ITipoClienteService;

use Cose\Crud\service\impl\CrudService;

use Cose\Security\service\SecurityContext;

use Cose\exception\ServiceException;
use Cose\exception\ServiceNoResultException;
use Cose\exception\ServiceNonUniqueResultException;
use Cose\exception\DuplicatedEntityException;
use Cose\exception\DAOException;


/**
 * servicio para TipoCliente
 *
 * @author Marcos
 * @since 10-06-2021
 *
 */
class TipoClienteServiceImpl extends CrudService implements ITipoClienteService {


	protected function getDAO(){
		return DAOFactory::getTipoClienteDAO();
	}


	/**
	 * redefino el add para agregar funcionalidad
	 * @param $entity
	 * @throws ServiceException
	 */
	public function add($entity){

		/*
		 * Hacemos lo que queremos con la categoria.
		 * Por ejemplo, enviar un email al usuario.
		 */

		//agregamos la categoria.
		parent::add($entity);

	}

	function validateOnAdd( $entity ){

		/*
		 * Realizamos validaciones sobre la categoria.
		 * Por ejemplo, campos obligatorios.
		 */
	}


	function validateOnUpdate( $entity ){

		/*
		 * Validaciones como en el add pero
		 * las necesarias para modificar.
		 */

		$this->validateOnAdd($entity);
	}

	function validateOnDelete( $oid ){

		/*
		 * validaciones al borrar una categoria.
		 */
	}




}
