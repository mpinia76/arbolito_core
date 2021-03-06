<?php
namespace Arbolito\Core\dao\impl;

use Arbolito\Core\dao\IClienteDAO;

use Arbolito\Core\model\Cliente;

use Cose\Crud\dao\impl\CrudDAO;

use Cose\criteria\ICriteria;

use Cose\exception\DAOException;
use Doctrine\ORM\QueryBuilder;

/**
 * dao para Cliente
 *
 * @author Marcos
 *
 */
class ClienteDoctrineDAO extends CrudDAO implements IClienteDAO{

	protected function getClazz(){
		return get_class( new Cliente() );
	}

	protected function getQueryBuilder(ICriteria $criteria){

		$queryBuilder = $this->getEntityManager()->createQueryBuilder();

		$queryBuilder->select(array('c','cc','tc'))
	   				->from( $this->getClazz(), "c")
	   				->leftJoin('c.cuentaCorriente', 'cc')
                     ->leftJoin('c.tipoCliente', 'tc');


		return $queryBuilder;
	}

	protected function getQueryCountBuilder(ICriteria $criteria){

		$queryBuilder = $this->getEntityManager()->createQueryBuilder();

		$queryBuilder->select('count(c.oid)')
	   				->from( $this->getClazz(), "c")
	   				->leftJoin('c.cuentaCorriente', 'cc')
        ->leftJoin('c.tipoCliente', 'tc');


		return $queryBuilder;
	}

	protected function enhanceQueryBuild(QueryBuilder $queryBuilder, ICriteria $criteria){



		$nombre = $criteria->getNombre();
		if( !empty($nombre) ){
			$queryBuilder->andWhere("upper(c.nombre)  like :nombre");
			$queryBuilder->setParameter( "nombre" , "%$nombre%" );
		}

		$mail = $criteria->getMail();
		if( !empty($mail) ){
			$queryBuilder->andWhere("upper(c.mail)  like :mail");
			$queryBuilder->setParameter( "mail" , "%$mail%" );
		}

		$documento = $criteria->getDocumento();
		if( !empty($documento) ){
			$queryBuilder->andWhere("upper(c.documento)  like :documento");
			$queryBuilder->setParameter( "documento" , "%$documento%" );
		}

        $nroSocio = $criteria->getNroSocio();
        if( !empty($nroSocio) ){
            $queryBuilder->andWhere("upper(c.nroSocio)  like :nroSocio");
            $queryBuilder->setParameter( "nroSocio" , "%$nroSocio%" );
        }

        $nroSocioExacto = $criteria->getnroSocioExacto();
        if( !empty($nroSocioExacto) ){
            $queryBuilder->andWhere("upper(c.nroSocio)  = :nroSocioExacto");
            $queryBuilder->setParameter( "nroSocioExacto" , "$nroSocioExacto" );

        }

		$tieneCtaCte = $criteria->getTieneCtaCte();
		if( !empty($tieneCtaCte) ){
			$queryBuilder->andWhere("cc.oid IS NOT NULL ");

		}

        $tipoCliente = $criteria->getTipoCliente();
        if( !empty($tipoCliente) && $tipoCliente!=null){
            if (is_object($tipoCliente)) {
                $tipoClienteOid = $tipoCliente->getOid();
                if(!empty($tipoClienteOid))
                    $queryBuilder->andWhere( "tc.oid= $tipoClienteOid" );
            }
            else $queryBuilder->andWhere( "tc.nombre like '%$tipoCliente%'");

        }

        $tiposNotIn = $criteria->getTiposNotIn();
        if( !empty($tiposNotIn)){

            $oids = implode(",", $tiposNotIn);

            $queryBuilder->andWhere("c.tipoCliente not in ($oids)");
        }

        $tiposIn = $criteria->getTiposIn();
        if( !empty($tiposIn)){

            $oids = implode(",", $tiposIn);

            $queryBuilder->andWhere("c.tipoCliente in ($oids)");
        }

	}

	protected function getFieldName($name){

		$hash = array();

		if( array_key_exists($name, $hash) )
			return $hash[$name];
		else{
			return "c.$name";
		}

	}
}
