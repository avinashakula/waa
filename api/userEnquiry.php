<?php
	session_start();
	include("../inc/functions.php");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");
	
	if( $conn ){
		$json = file_get_contents('php://input');
		$datas = json_decode($json);
		$message = mysqli_real_escape_string($conn, $datas->message);
		$mail = mysqli_real_escape_string($conn, $datas->mail);
		
		$date = date('Y-m-d');
		if (  !empty($message) && !empty($mail) ){
			
			$insert = mysqli_query($conn, "INSERT INTO `enquiries` 
			(`mail`,`message`,`date`,`status`) VALUES('$mail', '$message', '$date', '0')") or die(mysqli_error($conn));
			$response = array();
			header("Content-Type: JSON");
			$response["status"] = true;				
			$response["msg"] = "Success";
			echo json_encode($response, JSON_PRETTY_PRINT);
					
		}else{
			$response = array();
			header("Content-Type: JSON");
			$response["status"] = false;				
			$response["msg"] = "All fields are mandatory";
			echo json_encode($response, JSON_PRETTY_PRINT);
		}
	}
?>