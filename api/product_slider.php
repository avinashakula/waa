<?php
	include("../inc/functions.php");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");
	
	if( $conn ){	
		if( !isset($_GET['id']) || !isset($_GET['purpose']) ){
			$response = array();
			$response["status"] = false;	
			$response["msg"] = "No Records Found";
			echo json_encode($response, JSON_PRETTY_PRINT);		
			exit();
		}else{
			$id = stripslashes(mysqli_real_escape_string($conn, $_GET['id']));	
			$purpose = stripslashes(mysqli_real_escape_string($conn, $_GET['purpose']));	
			$slider = renderImageSlider($id, $purpose);
		}		
		if ( $slider ) {				
			$response = array();				
			header("Content-Type: JSON");
			$response['slider'] = $slider;										
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