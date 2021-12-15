<?php
include ("db/db.php");
if( isset($_SESSION['SESS_DIT_UID']) ){
	header("location: index.php");
}
$msg = "";
$email = "";
$password = "";
$s =  false;	
if ( isset($_POST['submit']) ){	
	
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);	
	
	if (  !empty($email) && !empty($password)  ){
		$query = mysqli_query($conn, "SELECT * FROM `users` WHERE password='$password' AND email='$email'") or die(mysqli_error($conn));
		
		if( mysqli_num_rows($query) == 1 ){
			$data = mysqli_fetch_array($query);
			$_SESSION['SESS_DIT_UID'] = $data['id'];	
			$_SESSION['SESS_DIT_UNAME'] = $data['fullname'];			
			header("location: index.php");			
		}else{
			$msg = "<span class='fail_msg'>Invalid Login! Try again</span>";
		}		
		
	}else{		
		$msg = "<span class='fail_msg'>'*' indicated fields are mandatory!</span>";
	} 

}
?>


<?php include("inc/head.php") ?>
<?php include("inc/topHeader.php"); ?>


<?php include("navbar.php"); ?>



<div class='container'>
	
	
<div class="container">
  <div class="row justify-content-center">
   
    <div class="col-md-6 my-5">
	
		<form action='./user-login.php' method='post' class='form-horizontal' name="loginForm" onsubmit="return(onLogin());">
			<div class='col mb-3'>
				<h1 class="display-6">User Login</h1>
				<span class='text-info'><?php echo $msg; ?></span>
			</div>			
			<div class='col mb-3'>
				<label class='form-label'>Email ID *</label>
				<input type="text" class="form-control input-sm" name="email" placeholder="Email Id" value="<?php echo $email; ?>" />				
			</div>
			<div class='col mb-3'>
				<label class='form-label'>Password*</label>
				<input type="password" class="form-control input-sm input-sm" name="password" placeholder="Password"  class="form-control input-sm input-sm" />
			</div>
			<div class='col mb-3'>				
				<input type="submit" name="submit" id='submit' class="btn btn-md btn-primary" value="Sign In" onclick="onLogin()" />
				<a class='btn btn-link btn-md pull-right' href='new-user.php'>New user ?</a>
			</div>			
		</form>
		
		<div id="formMessage"></div>

    </div>
	
   
  </div>
</div>




		
	
	
</div>

<?php include('inc/footer.php');?>
<script type='text/javascript' src='./js/login.js'></script>

<style>
	.form-control:focus{
		border-color:red;
		box-shadow:none
	}
	.inputError{
		border:1px solid red
	}
</style>
</body>
</html>  