<?php 
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	include('../config.inc/connect_db.php');

	$token = $_REQUEST['token'];

	$sql = "DELETE FROM tbl_item WHERE i_item= $token";
	
	$result = mysqli_query($conn, $sql);

	if (!$result) {
		die("Deleting data error: " . mysqli_error($conn));
	}
	else {
		header("Location: control.php");
	}
 ?>
