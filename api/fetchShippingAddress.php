<?php
	session_start();
	include("../inc/functions.php");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");
	

	if( $conn ){		
		$query = mysqli_query($conn, "SELECT * FROM  `users` WHERE id='".mysqli_real_escape_string($conn, $_SESSION['SESS_DIT_UID'])."'") or die(mysqli_error($conn));
		if( mysqli_num_rows($query) == 1 ){
			$response = array();
			header("Content-Type: JSON");
			$data = mysqli_fetch_array($query);	
			$response["status"] = true;		
			$response["doorno"] = $data["doorno"];
			$response["street"] = $data["street"];
			$response["city"] = $data["city"];
			$response["state"] = $data["state"];
			$response["pincode"] = $data["pincode"];
			$response["country"] = $data["country"];
			$response["firstname"] = $data["firstname"];
			$response["lastname"] = $data["lastname"];
			$response["shippingContact1"] = $data["shippingContact1"];
			$response["email"] = $data["email"];
			$response["idd"] = $_SESSION['SESS_DIT_UID'];
			echo json_encode($response, JSON_PRETTY_PRINT);			
		}else{
			$response = array();
			header("Content-Type: JSON");
			$response["status"] = false;				
			echo json_encode($response, JSON_PRETTY_PRINT);
		}	
	}
?>