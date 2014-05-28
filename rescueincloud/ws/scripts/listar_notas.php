<?php

/*
	
*/
header("Content-Type: text/html;charset=utf-8");

if (isset($_POST["email"]) && isset($_POST["password"]) ) {

	$email = $_POST['email'];
	$password = $_POST['password'];

	require_once 'db_functions.php';
	
	$db = new DB_Functions();
	 

	try{
            $result[] = $db->lista_notas($email, $password);
	}
	catch (Exception $e) {
            $result[] = array("code"=>"-1", "message"=>"Unknown problem.");
	}
        
	$db->close();
        $encode =  json_encode($result,JSON_UNESCAPED_UNICODE);
        echo $encode;
		
}
else{

	$result[] = array("code"=>"102", "message"=>"101 usuario o contraseña inválida");
	echo json_encode($result);
}

?>



