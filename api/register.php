<?php
	session_start();
	include("../inc/functions.php");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");
	
	if( $conn ){
		$json = file_get_contents('php://input');
		$datas = json_decode($json);
		$firstname = mysqli_real_escape_string($conn, $datas->firstname);
		$lastname = mysqli_real_escape_string($conn, $datas->lastname);
		$mobile = mysqli_real_escape_string($conn, $datas->mobile);
		$email = mysqli_real_escape_string($conn, $datas->email);
		$password = mysqli_real_escape_string($conn, $datas->password);
		$date = date('Y-m-d');
		if (  !empty($firstname) && !empty($lastname) && !empty($mobile) && !empty($email) && !empty($password) ){
			$query = mysqli_query($conn, "SELECT * FROM `users` WHERE email='$email' OR mobile='$mobile'") or die(mysqli_error($conn));			
			if( mysqli_num_rows($query) == 0 ){
				$insert = mysqli_query($conn, "INSERT INTO `users` 
				(`lastname`,`mobile`,`shippingContact1`,`password`,`firstname`,`email`,`created_on`,`last_updated`,`status`,`shippingname`) VALUES('$lastname', '$mobile', '$mobile', '$password', '$firstname', '$email', '$date', '$date', '1', '$firstname')") or die(mysqli_error($conn));
				$lastinsertid = mysqli_insert_id($conn);
				$_SESSION['SESS_DIT_UID'] = $lastinsertid;			
				$_SESSION['SESS_DIT_UNAME'] = $firstname;			
						
				$response = array();
				header("Content-Type: JSON");
				$response["status"] = true;
				$response["id"] = $lastinsertid;
				$response["name"] = $firstname;
				$response["msg"] = "Success";
				echo json_encode($response, JSON_PRETTY_PRINT);
			}else{
				$response = array();
				header("Content-Type: JSON");
				$response["status"] = false;				
				$response["msg"] = "Email Id or Mobile No. already taken";
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