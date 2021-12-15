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
		$query = mysqli_query($conn, "SELECT * FROM `orders` WHERE id='$id'") or die(mysqli_error($conn));
		if ( $query ) {				
			$response = array();				
			header("Content-Type: JSON");
			while( $res = mysqli_fetch_array($query) ){
				$response['id'] = $res['id'];
				$response['cart'] = $res['cart'];
				$response['address'] = $res['shippingAddress'];
				$response['status'] = $res['status'];
				$response['bookingId'] = $res['bookingId'];
				$response['initiatedDate'] = $res['initiatedDate'];
				$response['shippingDate'] = $res['shippingDate'];
				$response['deliveredDate'] = $res['deliveredDate'];
				$response['cancelledDate'] = $res['cancelledDate'];
				$response['returnRequest'] = $res['returnRequest'];
				$response['returnAcceptedDate'] = $res['returnAcceptedDate'];
				$response['returnId'] = $res['returnId'];
				$response['returnReceivedDate'] = $res['returnReceivedDate'];
				$response['totalAmount'] = $res['totalAmount'];
				$response['doorno'] = $res['doorno'];
				
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