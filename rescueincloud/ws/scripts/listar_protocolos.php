<?php

/*
	Request a new game
	======= = === ====
	200		New game added, waiting for player to accept the request...
	201		There is already a game in progress.
	codigos por definir...
*/

header("Content-Type: text/html;charset=utf-8");

$email = $_POST['email'];
$password = $_POST['password'];

require_once 'db_functions.php';
$db = new DB_Functions();

	try{
		$result[]=$db->lista_protocolos($email,$password);
	}
	catch(Exception $e){
		$result[]=array("code"=>"-1", "message"=>"Unknown problem.");
	}

        $db->close();
        $encode =  json_encode($result,JSON_UNESCAPED_UNICODE);
        echo $encode;

?>



