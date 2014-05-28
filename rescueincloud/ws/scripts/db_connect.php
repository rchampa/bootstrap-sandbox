<?php
  
class DB_Connect {
  
    // constructor
    function __construct() {
  
    }
  
    // destructor
    function __destruct() {
        // $this->close();
    }
  
    // Connecting to database
    public function connect() {
        require_once 'config.php';
	
        // connecting to mysql
        //$con = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
        $con = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8',
        DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET utf8"));
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        // selecting database
        //mysql_select_db(DB_DATABASE);
  
        // return database handler
        return $con;
    }
  
    // Closing database connection
    public function close() {
        //mysql_close();
        $con = null;
    }
  
} 
?>
