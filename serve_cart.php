<?php
	session_start();
	include("inc/functions.php");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");
	
	if( $conn ){	
		function uniid($conn){
			$rand = rand(111111111111, 999999999999);
			$check = mysqli_query($conn, "SELECT * FROM `orders` WHERE uniid='$rand'");
			$count =  mysqli_num_rows($check);
			if($count == 0){
				return $rand;
			}else{
				uniid();
			}
		}
		$id = mysqli_real_escape_string($conn, $_GET['user']);
		$date = date("Y-m-d");
		
		$query1 = mysqli_query($conn, "SELECT 
			users.firstname, 
			users.lastname, 
			users.mobile, 
			users.email, 
			users.doorno,
			users.street,
			users.city,
			users.pincode,
			users.country,
			users.id		
			FROM users WHERE users.id='$id'") or die(mysqli_error($conn));
			if ( $query1 ) {		
				$res = mysqli_fetch_array($query1);	
				$firstname = $res['firstname'];
				$lastname = $res['lastname'];
				$mobile = $res['mobile'];
				$email = $res['email'];
				$doorno = $res['doorno'];
				$street = $res['street'];
				$city = $res['city'];
				$pincode = $res['pincode'];
				$country = $res['country'];
				$idd = $res['id'];
				$uniid = uniid($conn);
				$amt = stripslashes(mysqli_real_escape_string($conn, $_GET['amt']));
				$cart = json_decode($_GET['cart']);
				$shippingAddress = json_decode($_GET['shippingAddress']);
				$shippingAddressUpdated = json_encode($shippingAddress);
				$finalTotal = json_decode($_GET['finalTotal']);
				$finalVat = json_decode($_GET['vat']);
				$shippingCharges = json_decode($_GET['shipping']);

				
				// $cart2 = serialize($cart);
				// $cart3 = json_encode($cart2);
				$cart3 = json_encode($cart);
				$date = date('Y-m-d');

				$query = mysqli_query($conn, "INSERT INTO `orders` VALUES('','$uniid','$amt','$cart3','$idd','$firstname','$lastname','$mobile','$email','$doorno','$street','$city','$pincode','$country','0','$date','','$date','','','','$shippingAddressUpdated','','','','','','$finalTotal','$finalVat','$shippingCharges')") or die(mysqli_error($conn));
				if ( $query ) {				
					$response = array();				
					header("Content-Type: JSON");
					$_SESSION['current_pan'] = array(
						"id"=>$uniid
						, "name"=>$firstname
						, "email"=>$email
						, "mobile"=>$mobile
						, "totalprice"=>$amt			
						, "purchaser"=>"customer"						
					);				
					$response["status"] = true;									
					$response["uniid"] = $uniid;
					echo json_encode($response, JSON_PRETTY_PRINT);			
				}else{
					$response = array();
					header("Content-Type: JSON");
					$response["status"] = false;									
					$response["msg"] = "Order Not Placed due to some technical issue. Try again later";									
					echo json_encode($response, JSON_PRETTY_PRINT);						
				}	

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