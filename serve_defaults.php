<?php
	include("./inc/functions.php");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST');
	header("Access-Control-Allow-Headers: X-Requested-With");
	
	if( $conn ){
		
		$ifor_query = "";
		$type_query = "";
		$productType_query = "";
		$brands_query = "";
		$frame_shapes_query = "";
		$frame_materials_query = "";

		$start = 0;	
		$expectedRecords = 8;	
		
		function adjustArrayValues($ele){
			return str_replace("_"," ",$ele);
		}
		if( isset($_GET['page']) ){
			if( is_numeric($_GET['page']) ){
				$page = intval($_GET['page']);
				$start = ($page-1) * $expectedRecords;
			}		
		}

		if( isset($_GET['ifor']) && !empty($_GET['ifor']) && $_GET['ifor']!="" && $_GET['ifor']!=" " ){			
			$ifor = mysqli_real_escape_string($conn, $_GET['ifor']);

			if( $ifor == "all" ){
				$ifor_query = "";	
			}else{
				$ifor_list = explode(" ", $ifor);			
				$newArray_ifor_list = array_map("adjustArrayValues", $ifor_list);
				$finalArray_ifor_list = "'" . implode("', '", $newArray_ifor_list) . "'";	
				$ifor_query = "AND `gender` IN ($finalArray_ifor_list)";
			}
		}
		// if( isset($_GET['type']) && !empty($_GET['type']) && $_GET['type']!="" && $_GET['type']!=" " ){			
		// 	$type = mysqli_real_escape_string($conn, $_GET['type']);			
		// 	if( $type == "all" ){
		// 		$type_query = "";	
		// 	}else{
		// 		$type_query = "AND `gender`='$type'";	
		// 	}
		// }

		if( isset($_GET['product_type']) && !empty($_GET['product_type']) && $_GET['product_type']!="" && $_GET['product_type']!=" " && $_GET['product_type']!='undefined' ){			
			$product_list = explode(" ", mysqli_real_escape_string($conn, $_GET['product_type']));			
			$newArray_producttype = array_map("adjustArrayValues", $product_list);
			$finalArray_producttype = "'" . implode("', '", $newArray_producttype) . "'";			
			$productType_query = "AND `product_type` IN ($finalArray_producttype)";				
		}
		if( isset($_GET['brand']) && !empty($_GET['brand']) && $_GET['brand']!="" && $_GET['brand']!=" " && $_GET['brand']!='undefined' ){		
			$brand_list = explode(" ", mysqli_real_escape_string($conn, $_GET['brand']));			
			$newArray_brands = array_map("adjustArrayValues", $brand_list);
			$finalArray_brands = "'" . implode("', '", $newArray_brands) . "'";			
			$brands_query = "AND `brand_name` IN ($finalArray_brands)";			
		}else{
			$brands_query = "";
		}
		if( isset($_GET['frame_shape']) && !empty($_GET['frame_shape']) && $_GET['frame_shape']!="" && $_GET['frame_shape']!=" " && $_GET['frame_shape']!='undefined' ){		
			$frame_shape_list = explode(" ", mysqli_real_escape_string($conn, $_GET['frame_shape']));			
			$newArray_frame_shapes = array_map("adjustArrayValues", $frame_shape_list);
			$finalArray_frame_shapes = "'" . implode("', '", $newArray_frame_shapes) . "'";			
			$frame_shapes_query = "AND `frame_shape` IN ($finalArray_frame_shapes)";			
		}else{
			$frame_shapes_query = "";
		}
		if( isset($_GET['frame_type']) && !empty($_GET['frame_type']) && $_GET['frame_type']!="" && $_GET['frame_type']!=" " && $_GET['frame_type']!='undefined' ){		
			$frame_type_list = explode(" ", mysqli_real_escape_string($conn, $_GET['frame_type']));			
			$newArray_frame_types = array_map("adjustArrayValues", $frame_type_list);
			$finalArray_frame_types = "'" . implode("', '", $newArray_frame_types) . "'";			
			$frame_types_query = "AND `frame_type` IN ($finalArray_frame_types)";			
		}else{
			$frame_types_query = "";
		}
		
		if( isset($_GET['frame_material']) && !empty($_GET['frame_material']) && $_GET['frame_material']!="" && $_GET['frame_material']!=" " && $_GET['frame_material']!='undefined' ){		
			$frame_material_list = explode(" ", mysqli_real_escape_string($conn, $_GET['frame_material']));			
			$newArray_frame_materials = array_map("adjustArrayValues", $frame_material_list);
			$finalArray_frame_materials = "'" . implode("', '", $newArray_frame_materials) . "'";			
			$frame_materials_query = "AND `frame_material` IN ($finalArray_frame_materials)";			
		}else{
			$frame_materials_query = "";
		}
		
		if( isset($_GET['clearduration']) && !empty($_GET['clearduration']) && $_GET['clearduration']!="" && $_GET['clearduration']!=" " && $_GET['clearduration']!='undefined' ){		
			$clearduration = mysqli_real_escape_string($conn, $_GET['clearduration']);
			$clearduration2 = ucwords(str_replace("_", " ", $clearduration));						
			$clearduration_query = "AND `contactlens_clear_duration`='$clearduration2'";
		}else{
			$clearduration_query = "";
		}
		
		// if( isset($_GET['clearbrand']) && !empty($_GET['clearbrand']) && $_GET['clearbrand']!="" && $_GET['clearbrand']!=" " && $_GET['clearbrand']!='undefined' ){		
		// 	$clearbrand = mysqli_real_escape_string($conn, $_GET['clearbrand']);
		// 	$clearbrand2 = ucwords(str_replace("_", " ", $clearbrand));						
		// 	$clearbrand_query = "AND `contactlens_clear_brand`='$clearbrand2'";
		// }else{
		// 	$clearbrand_query = "";
		// }

		if( isset($_GET['clearsolution']) && !empty($_GET['clearsolution']) && $_GET['clearsolution']!="" && $_GET['clearsolution']!=" " && $_GET['clearsolution']!='undefined' ){		
			$clearsolution = mysqli_real_escape_string($conn, $_GET['clearsolution']);
			$clearsolution2 = ucwords(str_replace("_", " ", $clearsolution));						
			$clearsolution_query = "AND `contactlens_clear_solutions`='$clearsolution2'";
		}else{
			$clearsolution_query = "";
		}

		if( isset($_GET['colorduration']) && !empty($_GET['colorduration']) && $_GET['colorduration']!="" && $_GET['colorduration']!=" " && $_GET['colorduration']!='undefined' ){		
			$colorduration = mysqli_real_escape_string($conn, $_GET['colorduration']);
			$colorduration2 = ucwords(str_replace("_", " ", $colorduration));						
			$colorduration_query = "AND `contactlens_color_duration`='$colorduration2'";
		}else{
			$colorduration_query = "";
		}

		// if( isset($_GET['colorbrand']) && !empty($_GET['colorbrand']) && $_GET['colorbrand']!="" && $_GET['colorbrand']!=" " && $_GET['colorbrand']!='undefined' ){		
		// 	$colorbrand = mysqli_real_escape_string($conn, $_GET['colorbrand']);
		// 	$colorbrand2 = ucwords(str_replace("_", " ", $colorbrand));						
		// 	$colorbrand_query = "AND `contactlens_color_brand`='$colorbrand2'";
		// }else{
		// 	$colorbrand_query = "";
		// }

		if( isset($_GET['contactlenscolor']) && !empty($_GET['contactlenscolor']) && $_GET['contactlenscolor']!="" && $_GET['contactlenscolor']!=" " && $_GET['contactlenscolor']!='undefined' ){		
			$contactlenscolor = mysqli_real_escape_string($conn, $_GET['contactlenscolor']);
			$contactlenscolor2 = ucwords(str_replace("_", " ", $contactlenscolor));						
			$contactlenscolor_query = "AND `contactlens_color_colors`='$contactlenscolor2'";
		}else{
			$contactlenscolor_query = "";
		}
		

		
		
		
		if( isset($_GET['item_price']) && !empty($_GET['item_price']) && $_GET['item_price']!="" && $_GET['item_price']!=" " && $_GET['item_price']!='undefined' ){
			$finalArray_item_price = mysqli_real_escape_string($conn, $_GET['item_price']);
			if( $finalArray_item_price == "500" ){
				$item_price_query = "AND `sellingPrice`>=500";
			}else{
				$item_price_query = "AND `sellingPrice`<=$finalArray_item_price";
			}			
		}else{
			$item_price_query = "";
		}
		if( isset($_GET['arrival']) && !empty($_GET['arrival']) && $_GET['arrival']!="" && $_GET['arrival']!=" " && $_GET['arrival']!='undefined' ){			
			if( $_GET['arrival']=="clear" || $_GET['arrival']=="color" ){
				$arrival = mysqli_real_escape_string($conn, $_GET['arrival']);
				$arrival_query = "AND `contact_lens_type`='$arrival' ORDER BY id DESC";
			}else{
				$arrival_query = "ORDER BY id DESC";					
			}
		}else{
			$arrival_query = "ORDER BY id DESC";
		}


		if( isset($_GET['prescription_lens']) && !empty($_GET['prescription_lens']) && $_GET['prescription_lens']!="" && $_GET['prescription_lens']!=" " && $_GET['prescription_lens']!='undefined' ){		
			$prescription_lens = mysqli_real_escape_string($conn, $_GET['prescription_lens']);
			$prescription_lens2 = str_replace("_", " ", $prescription_lens);						
			$prescription_lens_query = " AND `prescription_lens`='$prescription_lens2'";
		}else{
			$prescription_lens_query = "";
		}
		
			
		$q = "SELECT * FROM `products` WHERE status='1' $ifor_query $productType_query $brands_query $frame_shapes_query $frame_types_query $item_price_query $frame_materials_query $clearduration_query $clearsolution_query $colorduration_query $prescription_lens_query $contactlenscolor_query $arrival_query  LIMIT $start, $expectedRecords";
		// $response = array();
		// $response[] = $q;					
		// header("Content-Type: JSON");
		// echo json_encode($response, JSON_PRETTY_PRINT);	
		// exit();		
		$query = mysqli_query($conn, $q) or die(mysqli_error($conn));
		if ( $query ) {				
			$response = array();				
			header("Content-Type: JSON");
			while( $res = mysqli_fetch_object($query) ){
				$id = $res->id;
				$res->pic1 = base64encodeImage("$ImagePath/$id"."_1.jpg");
				// $res->pic1 = "$ImagePath/$id"."_1.jpg";
				$res->pic2 = base64encodeImage("$ImagePath/$id"."_2.jpg");
				$response[] = $res;					
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