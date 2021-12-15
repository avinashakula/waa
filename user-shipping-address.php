<?php
include ("db/db.php");

$msg = "";
$firstname = "";
$lastname = "";
$mobile = "";
$email = "";
$password = "";
$s =  false;	
function myProfile($conn){
	$query = mysqli_query($conn, "SELECT * FROM  `users` WHERE id='".mysqli_real_escape_string($conn, $_SESSION['SESS_DIT_UID'])."'") or die(mysqli_error($conn));
	if( mysqli_num_rows($query) == 1 ){
		$data = mysqli_fetch_array($query);
		return $data;		
	}else{
		return null;
	}		
}
$myProfile = myProfile($conn);
?>


<?php include("inc/head.php") ?>
<?php include("inc/topHeader.php"); ?>
<?php include("navbar.php"); ?>


<div class='container'>
	
	
<div class="container">
  <div class="row justify-content-center">
   	<div class='col-md-12 my-5'>
	   <h1 class="display-6 text-center">Shipping Address</h1>  	
	</div>
    
	<div class="col-md-4">			
			<div class='col mb-3'>
				<label>Shipping Username</label>
				<input type="text" class="form-control input-sm" id="shippingname" placeholder="Receiver name" value="<?php echo $myProfile['shippingname']; ?>"  />
			</div>
			<div class='col mb-3'>
				<label>Door No.</label>
				<input type="text" class="form-control input-sm" id="doorno" placeholder="Door No./Floor/Building" value="<?php echo $myProfile['doorno']; ?>"  />
			</div>
			<div class='col mb-3'>
				<label>Street</label>
				<input type="text" class="form-control input-sm" placeholder="Street" id="street" value="<?php echo $myProfile['street']; ?>"  />
			</div>			
			<div class='col mb-3'>
				<label>City</label>
				<input type="text" class="form-control input-sm input-sm" placeholder="City" id="city"  value="<?php echo $myProfile['city']; ?>" class="form-control input-sm input-sm" />
			</div>			
			<div class='col mb-3'>
				<label>State</label>	
				<input type="text" class="form-control input-sm input-sm" placeholder="State" id="state"  value="<?php echo $myProfile['state']; ?>" class="form-control input-sm input-sm" />
			</div>
			<div class='col mb-3'>
				<label>Pin/Zip code</label>
				<input type="text" class="form-control input-sm input-sm" placeholder="Zip code" id="pincode"  value="<?php echo $myProfile['pincode']; ?>" class="form-control input-sm input-sm" />
			</div>
			<div class='col mb-3'>
				<label>Country</label>	
				<input type="text" class="form-control input-sm input-sm" placeholder="Country" id="country"  value="<?php echo $myProfile['country']; ?>" class="form-control input-sm input-sm" />
			</div>			

    </div>

	<div class="col-md-4">
		<div class='col mb-3'>
			<label>Contact Number</label>	
			<input type="text" class="form-control input-sm input-sm" placeholder="Contact Number" id="shippingContact1"  value="<?php echo $myProfile['shippingContact1']; ?>" class="form-control input-sm input-sm" />
		</div>
		<div class='col mb-3'>
			<label>Alternative Contact Number</label>	
			<input type="text" class="form-control input-sm input-sm" placeholder="Contact Number" id="mobile2"  value="<?php echo $myProfile['mobile2']; ?>" class="form-control input-sm input-sm" />
		</div>
		<div class='col mb-3'>
			<label>Land Number</label>	
			<input type="text" class="form-control input-sm input-sm" placeholder="Contact Number" id="landnumber"  value="<?php echo $myProfile['land']; ?>" class="form-control input-sm input-sm" />
		</div>

		<div class='col mb-3'>				
			<button id='updateAddress' class="btn btn-md btn-primary">Update Address</button>
		</div>		
		<div class='col mb-3' id="shippingStatus"></div>
	</div>
	
   
  </div>
</div>




		
	
	
</div>

<?php include('inc/footer.php');?>
<script>
		$(document).ready(function(){
			
			$('#updateAddress').click(function(){
				doorno = $('#doorno').val();
				street = $('#street').val();
				city = $('#city').val();				
				state = $('#state').val();				
				pincode = $('#pincode').val();
				country = $('#country').val();
				shippingContact1 = $('#shippingContact1').val();
				mobile2 = $('#mobile2').val();
				landnumber = $('#landnumber').val();
				shippingname = $('#shippingname').val();

				
				
				$.post("../api/setData.php", {
					doorno:doorno,
					street:street,
					city:city,
					state:state,
					pincode:pincode,
					country:country,
					shippingContact1:shippingContact1,
					mobile2:mobile2,
					landnumber:landnumber,
					shippingname:shippingname
				}, function(res){
					alert(JSON.stringify(res));
					if(res.status){
						localStorage.setItem('shippingAddress',JSON.stringify([res]));
						let shippingStatus = `<div class='alert alert-success' role='alert' style='margin-bottom:0'>Updated</div>`;
						$('#shippingStatus').html(shippingStatus);
					}
				});
			});
		});
</script>
</body>
</html>  