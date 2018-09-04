<?php 
	mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	include('../config.inc/connect_db.php');

	$token = $_REQUEST['token'];
	$description=$_REQUEST['description'];

	$sql = "DELETE FROM tbl_item2 WHERE a_item= $token;";
    $sql .= "DELETE FROM tbl_item_temp WHERE it_description='$description'";
	
	$result = mysqli_multi_query($conn, $sql);

	if (!$result) {
		die("Deleting data error: " . mysqli_error($conn));
	}
	else {
		header("Location: warehouse_inventory.php?");
	}
 ?>
