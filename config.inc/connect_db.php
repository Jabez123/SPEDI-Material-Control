<?php 
	$server = "localhost";
	$username = "root";
	$password = "";
	$dbname = "spedi_db";

	$conn = mysqli_connect($server, $username, $password, $dbname);

	if (!$conn) {
		die("Connection Error: " . mysqli_error($conn));
	}
?>