<?php


include_once  dirname(__DIR__) . '/vendor/autoload.php';


use Arbolito\Core\conf\ArbolitoConfig;
use Cose\persistence\PersistenceContext;
use Arbolito\Core\notificaciones\backupBBDD\BackupBBDD;

//inicializamos cuentas core.
ArbolitoConfig::getInstance()->initialize();
ArbolitoConfig::getInstance()->initLogger( dirname(__FILE__).  "/log4php.xml");

$persistenceContext =  PersistenceContext::getInstance();


$notificacion = new BackupBBDD();
$notificacion->send();

//cerramos la conexión a la base.
$persistenceContext->close();




?>
