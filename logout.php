<?php
	session_start();
	session_unset();
	session_destroy();
	header("location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Logout</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<?php require 'partials/_nav.php'?>
</body>
</html>