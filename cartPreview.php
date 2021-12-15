<?php
	function myProfile($conn){
		$query = mysqli_query($conn, "SELECT `street`, `city`, `state`, `pincode`, `country`,`firstname`,`lastname`,`shippingContact1`,`mobile2`,`land`,`email`,`shippingname` FROM  `users` WHERE id='".mysqli_real_escape_string($conn, $_SESSION['SESS_DIT_UID'])."'") or die(mysqli_error($conn));
		if( mysqli_num_rows($query) == 1 ){
			$data = mysqli_fetch_array($query);			
			setcookie("shippingAddress", $date);
			return $data;		
		}else{
			return null;
		}		
	}
	$myProfile = myProfile($conn);
?>
<div class="container">
    <div class="row g-10">        
        <div class="col-sm-4 col-md-4 col-lg-4 my-3">
			<div class="card" >
			  <div class="card-body">
				<h5 class="card-title">Shipping Address</h5>
				<p>Street: <?php echo $myProfile['street']; ?><br>
				City: <?php echo $myProfile['city']; ?><br>
				State: <?php echo $myProfile['state']; ?><br>				
				Zip code: <?php echo $myProfile['pincode']; ?><br>
				Country: <?php echo $myProfile['country']; ?></p>
				
				<h6 class="card-subtitle mb-2 text-muted">Contact</h6>				
				Name: <?php echo $myProfile['shippingname']; ?><br>
				Contact No: <?php echo $myProfile['shippingContact1']; ?><br>
				Alternative Contact: <?php echo !empty($myProfile['mobile2']) ? $myProfile['mobile2'] : "N/A"; ?><br>
				Land: <?php echo !empty($myProfile['land']) ? $myProfile['land'] : "N/A"; ?><br>
				Email Id: <?php echo $myProfile['email']; ?><br>
				<a class="card-link btn btn-sm btn-primary pull-right" id="editShippingAddress">Edit Shipping Address</a>
			  </div>
			</div>
		</div>
        <div class="col-sm-8 col-md-8 col-lg-8 my-3">
            <?php include("cart-fullview.php"); ?>
        </div>
    </div>
</div>
