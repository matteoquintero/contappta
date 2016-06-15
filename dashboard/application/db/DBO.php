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
@ini_set("include_path", $include_path . PATH_SEPARATOR . $_SERVER["DOCUMENT_ROOT"].BASE."/pear");

require_once("MDB2.php");
require_once("DB/DataObject.php");
require_once("MDB2/Driver/mysql.php");

$DB_DSN = array(
  'phptype' => 'mysql',
  'username' => DB_USER,
  'password' => DB_PASS,
  'hostspec' => DB_HOST,
  'database' => DB_NAME,
  'charset' => 'utf8',
);

$optionsDataObject = &PEAR::getStaticProperty('DB_DataObject','options');
$optionsDataObject = array(
    'debug'            => 0, // Permite detallar las consultas que ejecuta, tiene hasta 3 niveles de detalle
    'database'         => $DB_DSN, // Configura la base de datos
    'require_prefix'   => 'db/',
    'schema_location'  => '',
    'class_location'   => '',
    'db_driver'   => 'MDB2',
    'class_prefix'     => 'DataObject_',
    'generator_no_ini' => true);


$mdb2 =& MDB2::connect($DB_DSN);
if (PEAR::isError($db)) {
    die($db->getMessage());
}

$sql  = "SET SESSION time_zone = 'America/Bogota'";

$affected =& $mdb2->exec($sql);

if (PEAR::isError($affected)) {
    die($affected->getMessage());
}

$mdb2->disconnect();

?>
