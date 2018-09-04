<?php 
	include("connecting.php");

	$sql = "CREATE DATABASE IF NOT EXISTS spedi_db";
	if (mysqli_query($conn, $sql)) {
	}
	else {
		echo "Error creating database" . mysqli_error($conn);
	}

	mysqli_close($conn);
 ?>