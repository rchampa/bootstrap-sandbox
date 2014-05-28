<?php
/**
 * Database config variables
 */
//$host = getenv('OPENSHIFT_MYSQL_DB_HOST');// . ':' . getenv('OPENSHIFT_MYSQL_DB_PORT');
////$host = getenv('OPENSHIFT_MYSQL_DB_HOST'). ':' . getenv('OPENSHIFT_MYSQL_DB_PORT');
//$dbname = getenv('OPENSHIFT_APP_NAME');
//$username = getenv('OPENSHIFT_MYSQL_DB_USERNAME');
//$password = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');

$host = "localhost";
$dbname = "ems";
$username = "root";
$password = "";

define("DB_HOST", $host);
define("DB_USER", $username);
define("DB_PASSWORD", $password);
define("DB_DATABASE", $dbname);
 
?>
