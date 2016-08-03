<?php
/*
* Include the necessary configuration info
*/
include_once 'db-cred.inc.php';
/*
* Define constants for configuration info
*/
foreach ( $C as $name => $val )
{
    define($name, $val);
}

/*
* Create a Database object
*/
if (!defined('PATH_SEPARATOR')) {
    if (defined('DIRECTORY_SEPARATOR') && DIRECTORY_SEPARATOR == "\\") {
        define('PATH_SEPARATOR', ';');
    } else {
        define('PATH_SEPARATOR', ':');
    }
}

$include_path = ini_get("include_path");
@ini_set("include_path", $include_path . PATH_SEPARATOR . $_SERVER["DOCUMENT_ROOT"]."/PEAR");
//echo $include_path;

require_once("DB.php");
require_once("DB/DataObject.php");

$optionsDataObject = &PEAR::getStaticProperty('DB_DataObject','options');
$optionsDataObject = array(
    'debug'            => 0, // Permite detallar las consultas que ejecuta, tiene hasta 3 niveles de detalle
    'database'         => 'mysql://'.DB_USER.':'.DB_PASS.'@'.DB_HOST.'/'.DB_NAME.'', // Configura la base de datos
    'require_prefix'   => 'db/',
    'class_prefix'     => 'DataObject_',
    'db_driver' => 'DB',
    'generator_no_ini' => true);
?>
