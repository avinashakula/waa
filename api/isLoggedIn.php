<?php
	session_start();
	include("../inc/functions.php");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");
	
	if( $conn ){		
		if (  isset($_SESSION['SESS_DIT_UID'])  ){					
			$response = array();
			header("Content-Type: JSON");
			$response["status"] = true;			
			$response["msg"] = "Success";
			$response["userid"] = $_SESSION['SESS_DIT_UID'];
			echo json_encode($response, JSON_PRETTY_PRINT);					
		}else{
			$response = array();
			header("Content-Type: JSON");
			$response["status"] = false;				
			$response["msg"] = "Login failed ".$_SESSION['SESS_DIT_UID'];
			echo json_encode($response, JSON_PRETTY_PRINT);
		}
	}
?>