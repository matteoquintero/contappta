<?php
/*
* Include the necessary configuration info
*/
include(realpath(dirname()).'/application/db/db-cred.inc.php');

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

include(realpath(dirname()).'/pear/MDB2.php');
include(realpath(dirname()).'/pear/DB/DataObject-cron.php');
include(realpath(dirname()).'/pear/MDB2/Driver/mysql.php');

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
?>
