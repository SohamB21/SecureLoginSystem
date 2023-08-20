<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<?php
	$showAlert = false;
	$showError = false;
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		include 'partials/_dbconnect.php';
		$username = $_POST["username"];
		$password = $_POST["password"];

		if(!empty($username) && !empty($password)){
			$sql = "SELECT * FROM `users` WHERE username = '$username'";			
			$db_result = mysqli_query($conn, $sql);
			$num = mysqli_num_rows($db_result);

			if($num==1){
				while ($row = mysqli_fetch_assoc($db_result)) {
					if(password_verify($password, $row['password'])){
						$showAlert = "You are logged into your account";
						session_start();
						$_SESSION['loggedin'] = true;
						$_SESSION['username'] = $username;
						header("location: welcome.php");						
					}
				}
			}
			else
				$showError = "You must signup first";
		}
		else
			$showError = "You have not provided your credentials";
	}
	?>

	<?php 
	require 'partials/_nav.php';
	
	if($showAlert)
  		echo '<div class="alert alert-success alert-dismissible fade show p-2">
		    <button type="button" class="btn-close top-50 translate-middle" data-bs-dismiss="alert">
		    </button>
	    	<strong>Success!</strong> '.$showAlert.'.
	  	</div>';

  	if($showError)
  		echo '<div class="alert alert-danger alert-dismissible fade show p-2">
		    <button type="button" class="btn-close top-50 translate-middle" data-bs-dismiss="alert">
		    </button>
	    	<strong>Failure!</strong> '.$showError.'.
	  	</div>';
  	?>

	<div class="container mx-auto col-md-6">
		<h3 class="text-center my-4">Login to our website!</h3>
		<form class="small p-3 border border-2 border-primary rounded" action="/LearningPHP/LoginSystem/login.php" method="post">
			<div class="mb-1">
			    <label for="username" class="form-label">Enter Username</label>
			    <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" maxlength="35">
		    	<div id="usernameHelp" class="form-text">We'll never share your name with anyone else.</div>
		    </div>
		    <div class="mb-2">
			    <label for="password" class="form-label">Enter Password</label>
			    <input type="password" class="form-control" id="password" name="password" maxlength="20">
		    </div>
		  	<div class="text-center">
		  		<button type="submit" class="btn btn-primary">LogIn</button>
		  	</div>
		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>