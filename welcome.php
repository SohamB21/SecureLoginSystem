<?php
	session_start();

	if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
		header("location: login.php");
		exit;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<?php require 'partials/_nav.php'?>
	<header class="my-5 p-3 bg-warning border border-danger text-center">
		<h5>Hey there! Welcome <?php echo $_SESSION['username'] ?>!</h5><br>
		<h6>If you wish to Logout, simply press Logout above.</h6>
	</header>
</body>
</html>