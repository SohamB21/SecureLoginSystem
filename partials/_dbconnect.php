<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "login_system";

	$conn = mysqli_connect($server, $username, $password, $database);
	if(!$conn)
		die("Connection failed due to ".mysqli_connect_error());
?>