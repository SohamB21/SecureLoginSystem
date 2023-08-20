<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
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
		$confirmPassword = $_POST["confirmPassword"];

		if(!empty($username) && !empty($password) && !empty($confirmPassword)){

			if(($password==$confirmPassword)){

				$hashPass = password_hash($password, PASSWORD_DEFAULT);
				$sql = "INSERT INTO `users` (`username`, `password`, `datetime`) VALUES ('$username', '$hashPass', CURRENT_TIMESTAMP())";
				$db_result = mysqli_query($conn, $sql);
				if($db_result)
						$showAlert = "Your account has been created. Proceed to Login";
			}
			else
				$showError = "Your passwords do not match";
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
		<h3 class="text-center my-4">Signup to our website!</h3>
		<form class="small p-3 border border-2 border-primary rounded" action="/LearningPHP/LoginSystem/signup.php" method="post">
			<div class="mb-1">
			    <label for="username" class="form-label">Enter Username</label>
			    <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp" maxlength="35">
		    	<div id="usernameHelp" class="form-text">We'll never share your name with anyone else.</div>
		    </div>
		    <div class="mb-1">
			    <label for="password" class="form-label">Enter Password</label>
			    <input type="password" class="form-control" id="password" name="password" maxlength="20">
		    </div>
		    <div class="mb-2">
			    <label for="confirmPassword" class="form-label">Confirm Password</label>
			    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" maxlength="20">
		    </div>

		  	<div class="text-center">
		  		<button type="submit" class="btn btn-primary">SignUp</button>
		  	</div>
		</form>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>