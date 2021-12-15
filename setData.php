<?php
    include ("./db/db.php");
    if ( isset($_POST['firstname']) ){
        $firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn,$_POST['lastname']);	
        $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);	
        $password = mysqli_real_escape_string($conn,$_POST['password']);		
        $date = date('Y-m-d');
        if (  !empty($firstname) && !empty($lastname) && !empty($mobile) && !empty($password)  ){
            $query = mysqli_query($conn, "UPDATE `users` SET last_updated='$date', firstname='$firstname', lastname='$lastname', mobile='$mobile', password='$password' WHERE id='".mysqli_real_escape_string($conn,$_SESSION['SESS_DIT_UID'])."'") or die(mysqli_error($conn));
            echo true;	
        }else{		
            echo false;
        }
        exit();
    }
    if ( isset($_POST['doorno']) ){
        $doorno = mysqli_real_escape_string($conn,$_POST['doorno']);
        $street = mysqli_real_escape_string($conn,$_POST['street']);	
        $city = mysqli_real_escape_string($conn,$_POST['city']);	
        $pincode = mysqli_real_escape_string($conn,$_POST['pincode']);		
        $country = mysqli_real_escape_string($conn,$_POST['country']);		
		$state = mysqli_real_escape_string($conn,$_POST['state']);	
		$shippingContact1 = mysqli_real_escape_string($conn,$_POST['shippingContact1']);	
		$mobile2 = mysqli_real_escape_string($conn,$_POST['mobile2']);	
		$landnumber = mysqli_real_escape_string($conn,$_POST['landnumber']);	
        $date = date('Y-m-d');
        // if (  !empty($doorno) && !empty($street) && !empty($city) && !empty($pincode) && !empty($country) ){
            $query = mysqli_query($conn, "UPDATE `users` SET `shippingContact1`='$shippingContact1', `mobile2`='$mobile2', `land`='$landnumber', last_updated='$date', doorno='$doorno', street='$street', city='$city', pincode='$pincode', country='$country', state='$state' WHERE id='".mysqli_real_escape_string($conn,$_SESSION['SESS_DIT_UID'])."'") or die(mysqli_error($conn));
            if($query){
                $response = array();
                header("Content-Type: JSON");
                $data = mysqli_fetch_array($query);	
                $response["status"] = true;		
                $response["street"] = $street;
                $response["city"] = $city;
                $response["state"] = $state;
                $response["pincode"] = $pincode;
                $response["country"] = $country;
                $response["firstname"] = $firstname;
                $response["lastname"] = $lastname;
                $response["shippingContact1"] = $shippingContact1;
                $response["email"] = $email;
                $response["idd"] = $_SESSION['SESS_DIT_UID'];
                echo json_encode($response, JSON_PRETTY_PRINT);	
            }
           

        // }else{		
        //     echo false;
        // }
        exit();

    }
?>