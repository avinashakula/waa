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
   
    <div class="col-4 my-5">
      

	
	<?php if($s == false){ ?>
			<div class='col mb-3'>
				<h1 class="display-6">My Profile</h1>
				<span class='text-info'><?php echo $msg; ?></span>
			</div>
			
			<div class='col mb-3'>
				<input type="text" class="form-control input-sm" id="firstname" placeholder="First name" name="firstname" value="<?php echo $myProfile['firstname']; ?>"  />
			</div>
			<div class='col mb-3'>
				<input required='required' type="text" class="form-control input-sm" placeholder="Last name" id="lastname" name="lastname" value="<?php echo $myProfile['lastname']; ?>"  />
			</div>
			
			<div class='col mb-3'>
				<input type="text" required='required' class="form-control input-sm input-sm" placeholder="Mobile" name="mobile" id="mobile"  value="<?php echo $myProfile['mobile']; ?>" class="form-control input-sm input-sm" minlength='10' maxlength='10'  />
			</div>
			
			<div class='col mb-3'>
				<input type="password" required='required' class="form-control input-sm input-sm" placeholder="Password" name="password" id="password"  value="<?php echo $myProfile['password']; ?>" class="form-control input-sm input-sm" />
			</div>

			<div class='col mb-3'>				
				<button id='updateProfile' class="btn btn-md btn-primary">Update Profile</button>
			</div>
			<div class='col mb-3' id="profileStatus"></div>			
	<?php }else{ echo $msg; } ?>
	





    </div>
	
	
   
  </div>
</div>




		
	
	
</div>

<?php include('inc/footer.php');?>
<script>
		$(document).ready(function(){
			$('#updateProfile').click(function(){
				firstname = $('#firstname').val();
				lastname = $('#lastname').val();
				mobile = $('#mobile').val();
				password = $('#password').val();
				$.post("setData.php", {
					firstname:firstname,
					lastname:lastname,
					mobile:mobile,
					password:password
				}, function(res){
					if(res){
						let profileStatus = `<div class='alert alert-success' role='alert' style='margin-bottom:0'>Updated</div>`;
						$('#profileStatus').html(profileStatus);
					}
				});
			});
			$('#updateAddress').click(function(){
				doorno = $('#doorno').val();
				street = $('#street').val();
				city = $('#city').val();				
				state = $('#state').val();				
				pincode = $('#pincode').val();
				country = $('#country').val();
				
				$.post("./api/setData.php", {
					doorno:doorno,
					street:street,
					city:city,
					state:state,
					pincode:pincode,
					country:country					
				}, function(res){
					if(res){
						let shippingStatus = `<div class='alert alert-success' role='alert' style='margin-bottom:0'>Updated</div>`;
						$('#shippingStatus').html(shippingStatus);
					}
				});
			});
		});
</script>
</body>
</html>  