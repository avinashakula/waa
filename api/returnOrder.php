<?php
	session_start();
	include("../inc/functions.php");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");

	if( $conn ){
		$json = file_get_contents('php://input');
		$datas = json_decode($json);
		$id = mysqli_real_escape_string($conn, $datas->orderId);
		$returnReason = mysqli_real_escape_string($conn, $datas->returnReason);
		$date = date('Y-m-d');
		if (  !empty($id) ){
			$query = mysqli_query($conn, "SELECT * FROM `orders` WHERE id='$id'") or die(mysqli_error($conn));			
			if( mysqli_num_rows($query) == 1 ){
				$delete = mysqli_query($conn, "UPDATE `orders` SET `status`='10', `returnReason`='$returnReason', `returnRequest`=now() WHERE id='$id'") or die(mysqli_error($conn));
						
						
				$response = array();
				header("Content-Type: JSON");
				$response["status"] = true;				
				$response["msg"] = "Success";
				echo json_encode($response, JSON_PRETTY_PRINT);
			}else{
				$response = array();
				header("Content-Type: JSON");
				$response["status"] = false;				
				$response["msg"] = "Order not found";
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