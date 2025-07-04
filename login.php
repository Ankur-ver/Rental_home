<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('./db_connect.php');
ob_start();
if(!isset($_SESSION['system'])){
	$system = $conn->query("SELECT * FROM system_settings limit 1")->fetch_array();
	foreach($system as $k => $v){
		$_SESSION['system'][$k] = $v;
	}
}
ob_end_flush();
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?php echo $_SESSION['system']['name'] ?></title>

<?php include('./header.php'); ?>
<?php 
if(isset($_SESSION['login_id']))
header("location:index.php?page=home");

?>

</head>
<body>


  <main id="main" class="row bg-white">
  	<div class="col-md-6 p-0">
  		<div id="login-left" class="bg-white">
  			<img src="assets/img/login.jpg" width="100%" class="vh-100">
  		</div>
  	</div>
  	<div class="col-md-6">
  		<div class="text-center mb-5 pt-5">
         <a href="index.php" class="logo logo-admin"><img src="assets/img/logo.png" alt="logo" width="250px"></a>
      </div>
  		<div id="login-right" class="bg-white">
  			<div class="w-100">
			<h4 class="text-dark text-center"><b><?php echo $_SESSION['system']['name'] ?></b></h4>
  			<div class="card border-0 col-md-8 mx-auto">
  				<div class="card-body">
  					<form id="login-form" >
  						<div class="form-group">
  							<label for="username" class="control-label">Username</label>
  							<input type="text" id="username" name="username" class="form-control" placeholder="Username">
  						</div>
  						<div class="form-group">
  							<label class="control-label">Password</label>
  							<input type="password" id="password-field" name="password" class="form-control" placeholder="Password">
  							<!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
  						</div>
  						<div class="g-recaptcha pb-3 mt-3" data-sitekey=""></div>
  						<center><button class="btn btn-primary btn-block waves-effect waves-light py-2 btn-1">Login</button></center>
  					</form>
  				</div>
  			</div>
  			</div>
  		</div>
   </div>

  </main>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>
<script src="https://www.google.com/recaptcha/api.js" async defer></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
	$('#login-form').submit(function(e){
		e.preventDefault()
		$('#login-form button[type="button"]').attr('disabled',true).html('Logging in...');
		if($(this).find('.alert-danger').length > 0 )
			$(this).find('.alert-danger').remove();
		$.ajax({
			url:'ajax.php?action=login',
			method:'POST',
			data:$(this).serialize(),
			error:err=>{
				console.log(err)
		$('#login-form button[type="button"]').removeAttr('disabled').html('Login');

			},
			success:function(resp){
				if(resp == 1){
					location.href ='index.php?page=home';
				}else{
					$('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
					$('#login-form button[type="button"]').removeAttr('disabled').html('Login');
				}
			}
		})
	})
</script>	

<script>
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
  </script>
</html>