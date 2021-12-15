<?php
include ("db/db.php");

if( isset($_SESSION['SESS_DIT_UID']) ){ 
	header("location: index.php");
}	


$msg = "";
$firstname = "";
$lastname = "";
$mobile = "";
$email = "";
$password = "";

$s =  false;	
if ( isset($_POST['submit']) ){	
	function existance_check( $conn, $col, $val ){
		$checkemailexists = mysqli_query($conn, "SELECT COUNT(*) AS total FROM users WHERE $col='$val'") or die(mysqli_error($conn));
		$ttt = mysqli_fetch_array($checkemailexists);
		return $ttt['total'];			
	}
	$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);	
	$mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$password = mysqli_real_escape_string($conn,$_POST['password']);	
	$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
	
	if ( !empty( $lastname) && !empty($mobile) && !empty($email) && !empty($password)  ){
		
		$mobile_stat = existance_check($conn, "mobile", $mobile);
		$preferid_stat = existance_check($conn, "email", $email);
		
		if( $mobile_stat == 1 ){
			$msg = "<span class='fail_msg'>Mobile no. already existed!</span>";
		}else if( $preferid_stat == 1 ){
			$msg = "<span class='fail_msg'>Email already existed!</span>";
		}else{
			$date = date('Y-m-d');
			$query = mysqli_query($conn, "INSERT INTO `users` 
				(`lastname`,`mobile`,`shippingContact1`,`password`,`firstname`,`email`,`created_on`,`last_updated`,`shippingname`) VALUES('$lastname', '$mobile', '$mobile', '$password', '$firstname', '$email', '$date', '$date', '$firstname')") or die(mysqli_error($conn));
				$lastinsertid = mysqli_insert_id($conn);
				$_SESSION['SESS_DIT_UID'] = $lastinsertid;			
				$_SESSION['SESS_DIT_UNAME'] = $_POST['firstname'];			
				$s =  true;	
				$msg = "You have Successfully Registered! </b><br><br><a class='btn btn-info btn-sm' href='index.php'>redirecting please wait..</a>";
				// header("location: education_qualification.php");
				
		}		
		
		
		
		
	}else{		
		$msg = "<span class='fail_msg'>'*' indicated fields are mandatory!</span>";
	}

}
?>

<?php include("inc/head.php") ?>
<!-- <?php include("inctopHeader.php"); ?> -->
<?php include("navbar.php"); ?>
<div class='container'>
<div class="container">
  <div class="row justify-content-center">
    
    <div class="col-md-6 my-5">	
		<form action="./new-user.php" method="post" class='form-horizontal' name='registerForm' onclick="return(onRegister());">
			<div class='col mb-3'>
				<h1 class="display-6">New User</h1>
				<span class='text-info'><?php echo $msg; ?></span>
			</div>
			<div class='col mb-3'>
				<input type="text" class="form-control input-sm" placeholder="First name" name="firstname"  />
			</div>
			<div class='col mb-3'>
				<input required='required' type="text" class="form-control input-sm" placeholder="Last name" name="lastname"   />
			</div>
			
			<div class='col mb-3'>
				<input type="text" required='required' class="form-control input-sm input-sm" placeholder="Mobile" name="mobile" />
			</div>
			
			<div class='col mb-3'>
				<input type="text" required='required' class="form-control input-sm" name="email" placeholder="Email" />				
			</div>

			<div class='col mb-3'>
				<input type="password" required='required' class="form-control input-sm input-sm" placeholder="Password" name="password" />
			</div>

			<div class='col mb-3'>				
				<input type="submit" name="submit" id='submit' class="btn btn-md btn-primary" value="Register" />
				<a class='btn btn-link btn-md pull-right' href='user-login.php'>Already registered ?</a>
			</div>			
		</form>

		<div id="formMessage"></div>


	</div>
	
    
    
  </div>
</div>




		
	
	
</div>

<?php include('inc/footer.php');?>
<script>
	function formMessage(result){
		let formMessage = document.getElementById('formMessage');
		let msg = "";
		let status = false;
		if( result.status ){
			msg = `<div class="alert alert-success" role="alert">${result.msg}</div>`;
			status = true;
		}else{
			msg = `<div class="alert alert-danger" role="alert">${result.msg}</div>`;
		}
		formMessage.innerHTML = msg;
		return status;		
	}
	function validateInput(input){
		input.classList.remove("inputError");
		if( input.value == "" ){
			input.focus();
			input.classList.add("inputError");
			return false;
		}else{
			return true;
		}
	}
	function onRegister(){
		let firstname = document.registerForm.firstname;
		let lastname = document.registerForm.lastname;
		let mobile = document.registerForm.mobile;
		let email = document.registerForm.email;
		let password = document.registerForm.password;
		let submit = document.registerForm.submit;		
		
		if (!validateInput(firstname) || !validateInput(lastname) || !validateInput(mobile) || !validateInput(email) || !validateInput(password) ){return false;}		
		submit.disabled = true;
		submit.value = "Please wait...";
		let data = {firstname:firstname.value, lastname:lastname.value, mobile:mobile.value, email:email.value, password:password.value}
		axios.post(`./api/register.php`, data)
            .then(response => {               
                const result = response.data;
                let items = "";                              
                if(response.status==200){       
					if( formMessage(result) ){
						location.href='./index.php'
					}	
					submit.disabled = false;
					submit.value = "Register";           
                }                
            })
            .catch(error => console.error(error));
		return false;

	}
</script>
<style>
	.form-control:focus{
		border-color:red;
		box-shadow:none
	}
	.inputError{
		border:1px solid red
	}
</style>