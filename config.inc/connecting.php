
<?php 
	$server = "localhost";
	$username = "root";
	$password = "";
	//Create Connection
	$conn = mysqli_connect($server, $username, $password);
	//Check Connection
	if (!$conn) {
		die("Connection error: " . mysqli_connect_error($conn));
	}
 ?>