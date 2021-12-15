<?php
	session_start();
	include("../inc/functions.php");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");
	
	if( $conn ){
		$json = file_get_contents('php://input');
		$datas = json_decode($json);

		// Variables
		$email = mysqli_real_escape_string($conn, $datas->email);
		$password = mysqli_real_escape_string($conn, $datas->password);
		if (  !empty($email) && !empty($password)  ){
			$query = mysqli_query($conn, "SELECT * FROM `users` WHERE password='$password' AND email='$email' AND status='1'") or die(mysqli_error($conn));			
			if( mysqli_num_rows($query) == 1 ){
				$data = mysqli_fetch_array($query);	
				$_SESSION['SESS_DIT_UID'] = $data['id'];	
				$_SESSION['SESS_DIT_UNAME'] = $data['fullname'];			
				$response = array();
				header("Content-Type: JSON");
				$response["status"] = true;
				$response["id"] = $data['id'];
				$response["name"] = $data['fullname'];
				$response["msg"] = "Success";
				echo json_encode($response, JSON_PRETTY_PRINT);
			}else{
				$response = array();
				header("Content-Type: JSON");
				$response["status"] = false;				
				$response["msg"] = "Invalid login";
				echo json_encode($response, JSON_PRETTY_PRINT);
			}			
		}else{
			$response = array();
			header("Content-Type: JSON");
			$response["status"] = false;				
			$response["msg"] = "All fields are mandatory";
			echo json_encode($response, JSON_PRETTY_PRINT);
		}
	}
?>