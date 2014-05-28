<?php

/*
	Login
	=====
	600		Updated complete.
	601		Fail at updating id.
*/

if (isset($_POST["email"]) ) {

	$email = $_POST['email'];

	require_once 'db_functions.php';
	
	$db = new DB_Functions();
	

	try{
		//Check this and be aware
		$result[] = $db->login($email);	
	}
	catch (Exception $e) {
		$result[] = array("code"=>"-1", "message"=>"Unknown problem.");
	}
	echo json_encode($result);	
		
}
else{
	$result[] = array("code"=>"-1", "message"=>"Unknown problem.");
	echo json_encode($result);
}

?>



