<?php
namespace Arbolito\Core\dao\impl;

use Arbolito\Core\dao\ITipoClienteDAO;

use Arbolito\Core\model\TipoCliente;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;

/**
 * dao para TipoCliente
 *
 * @author Marcos
 *
 */
class TipoClienteDoctrineDAO extends CrudDAO implements ITipoClienteDAO{

	protected function getClazz(){
		return get_class( new TipoCliente() );
	}

	protected function getQueryBuilder(ICriteria $criteria){

		$queryBuilder = $this->getEntityManager()->createQueryBuilder();

		$queryBuilder->select(array('tc'))
	   				->from( $this->getClazz(), "tc");


		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){

		$queryBuilder = $this->getEntityManager()->createQueryBuilder();

		$queryBuilder->select('count(tc.oid)')
	   				->from( $this->getClazz(), "tc");

		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){

		$nombre = $criteria->getNombre();
		if( !empty($nombre) ){
			$queryBuilder->andWhere("upper(tc.nombre)  like :nombre");
			$queryBuilder->setParameter( "nombre" , "%$nombre%" );
		}

        $pagaCuota = $criteria->getPagaCuota();
        if( !empty($pagaCuota) ){
            $queryBuilder->andWhere( "tc.pagaCuota= $pagaCuota" );
        }



	}

	protected function getFieldName($name){

		$hash = array();

		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "tc.$name";
		}

	}
}
