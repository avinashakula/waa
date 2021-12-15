<?php
	include("inc/functions.php");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");
	
	if( $conn ){	
	
		if( !isset($_GET['id']) ){
			$response = array();
			$response["status"] = false;	
			$response["msg"] = "No Records Found";
			echo json_encode($response, JSON_PRETTY_PRINT);		
			exit();
		}else{
			$id = mysqli_real_escape_string($conn, $_GET['id']);	
		}
		$query = mysqli_query($conn, "SELECT * FROM `orders` WHERE user='$id' ORDER BY id DESC") or die(mysqli_error($conn));
		if ( $query ) {				
			$response = array();				
			header("Content-Type: JSON");
			while( $res = mysqli_fetch_array($query) ){
				$response[] = [$res['id'], $res['uniid'], $res['amount'], $res['orderedDate'], json_decode($res['cart'], true), $res['status'], $res['totalAmount']];	
			}						
			echo json_encode($response);	
		}else{
			$response = array();
			header("Content-Type: JSON");
			$response["status"] = false;									
			$response["msg"] = "Sorry for the inconvenience, Server updating for better security. Please try again after sometime.";									
			echo json_encode($response, JSON_PRETTY_PRINT);						
		}			
	}else{
		$response = array();
		header("Content-Type: JSON");
		$response["status"] = false;	
		$response["msg"] = "Sorry for the inconvenience, repairing backend at this moment. Please try again after sometime.";									
		echo json_encode($response, JSON_PRETTY_PRINT);		
	}

?>