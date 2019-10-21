<?php
session_start();
$db=mysqli_connect("localhost","root","","ip");
if(isset($_POST['register_btn'])){
	
	$name=mysqli_real_escape_string($db, $_POST['name']);
	$user=mysqli_real_escape_string($db, $_POST['user']);
	$email=mysqli_real_escape_string($db, $_POST['email']);
	$pass=mysqli_real_escape_string($db, $_POST['pass']);
	$pass1=mysqli_real_escape_string($db, $_POST['pass1']);
	

	if($_POST['pass'] == $_POST['pass1']){
		//create user
		$pass=md5($pass);//hashing password before storing for security purposes
		$sql="INSERT INTO register(name, username, email, password) VALUES('$name', '$user', '$email', '$pass')";
		mysqli_query($db, $sql);
		//$_SESSION['message']="You have registered";
		//$_SESSION['user']=$user;
		
		
		
		
		//header("location:index.html"); //redirect to home page



	}else{
		//failed
		
		$_SESSION['message']="The two passwords dont match";
	}
	
	
}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Art-Nation/Registration page</title>
	
	<link rel="stylesheet" type="text/css" href="regstyle.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
		crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/c3baa1b198.js" crossorigin="anonymous"></script>
</head>
<body>
	
<div class="container">
<div class="row">
<div class="col-md-10 offset=md-1">
<div class="row">
	<div class="col-md-5 register-left">
		<img src="assets/icon.png">
		<h3>Join US</h3>
		<p>Register now to be a part of Art-Nation family</p>
		<button type="button" class="btn btn-primary"><a href="index.html">Home</a></button>
	</div>
	<div class="register-right">
		<h2>Register Here</h2>
		<form action="" onsubmit="check()" method="POST">
		<div class="register-form">
			<div class="form-group">
			<input type="text" id="name" name="name" class="form-control" placeholder="Name">
			<span id="nam" class="text-danger" style="font-weight: bold"></span>
			</div>
			<div class="form-group">
			<input type="text" id="user" name="user" class="form-control" placeholder="Username">
			<span id="use" class="text-danger" style="font-weight: bold"></span>
			</div>
			<div class="form-group">
			<input type="email" id="email" name="email" class="form-control" placeholder="Email">
			<span id="e" class="text-danger" style="font-weight: bold"></span>
			</div>
			<div class="form-group">
			<input type="password" id="pass" name="pass" class="form-control" placeholder="Password">
			<span id="p" class="text-danger" style="font-weight: bold"></span>
			</div>
			<div class="form-group">
			<input type="password" id="pass1" name="pass1" class="form-control" placeholder="Password Again">
			<span id='message'></span>
			</div>
			<p>Already have an account? Try signing in</p>
			<input type="submit" name="register_btn" class="btn btn-primary" value="Register">
			<button type="button" class="btn btn-primary login-btn"><a href="login.php">Login</a></button>
			
		</div>
		</form>
	
	</div>
</div>
</div>
</div>
</div>
<script>
 function check() {
    if(document.getElementById('pass').value ===
            document.getElementById('pass1').value) {
				document.getElementById('message').style.color = 'green';		
                document.getElementById('message').innerHTML = "Registered Successfully";
    } else {
		document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = " ERROR :Password Not Matching";
    }
}

	
</script>


</body>
</html>
