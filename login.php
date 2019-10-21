<?php
session_start();
$db=mysqli_connect("localhost","root","","ip");
if(isset($_POST['login_btn'])){
	
	$user=mysqli_real_escape_string($db, $_POST['user']);
	$pass=mysqli_real_escape_string($db, $_POST['pass']);
	$pass=md5($pass);
	$sql="SELECT * FROM register WHERE username='$user' AND password='$pass'";
	$result=mysqli_query($db, $sql);
	if(mysqli_num_rows($result) == 1){
		$_SESSION['mesage']="You are now logged in";
		echo "done";
	}else{
		echo "not done";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Art-Nation/Login page</title>
	<link rel="stylesheet" type="text/css" href="loginstyle.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-10 offset=md-1">
<div class="row">
	<div class="col-md-5 login-left">
		<img src="assets/icon.png">
		<h3>Join US</h3>
		<p>Login now to resume your Art-Nation activities</p>
		<button type="button" class="btn btn-primary"><a href="index.html">Home</a></button>
	</div>
	<div class="login-right">
		<h2>Register Here</h2>
		<form action="" method="POST">
		<div class="login-form">
			<div class="form-group">
			
			<input type="text" name="user" class="form-control" placeholder="Username">
			</div>
			<div class="form-group">
			<input type="password" name="pass" class="form-control" placeholder="Password">
			</div>
			<p>Dont have an account? Register now!</p>
			<input type="submit" name="login_btn" class="btn btn-primary" value="Login">
			<button type="button" class="btn btn-primary login-btn"><a href="register.php">Register</a></button>
		    
		</form>
        </div> 
	</div>
</div>
</div>
</div>
</div>




</body>
</html>


