 <!-- Admin -->
 <?php 
 	include("connect_db.php");

 	$sql = "CREATE TABLE IF NOT EXISTS tbl_admin(
 			a_id INT(9) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 			a_username VARCHAR(30),
 			a_password VARCHAR(30))";

 	if (mysqli_query($conn, $sql)) {
 		
 	}
 	else {
 		die("<p>Error creating tbl_admin " . mysqli_error($conn)) . "</p>";
 	}
 	mysqli_close($conn);
  ?>

<!-- Insert Default Admin Account -->
  <?php 
 mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 	include("connect_db.php");
 	$id = 1;
 	$username = 'admin';
 	$password = '12345';
    $sql = "INSERT IGNORE INTO tbl_admin(a_id, a_username, a_password) 
				VALUES ('$id','$username','$password')";
			$query = mysqli_query($conn, $sql);

    if (!$query) {
      die("Inserting Data Error! " . mysqli_error($conn));
    }
    mysqli_close($conn);
  ?>

<!-- Item -->
<?php 
	include("connect_db.php");

	$sql = "CREATE TABLE IF NOT EXISTS tbl_item (
			i_item INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			i_category VARCHAR(200),
			i_type VARCHAR(200),
			i_description VARCHAR(200),
			i_unit VARCHAR(200),
			i_projectname VARCHAR(200),
			i_location VARCHAR(200),
			i_mis VARCHAR(200),
			i_issued INT,
			i_mrs VARCHAR(200),
			i_returned INT,
			i_transfer_to_mts VARCHAR(200),
			i_transfer_to VARCHAR(200),
			i_transfer_to_qty INT,
			i_transfer_from_mts VARCHAR(200),
			i_transfer_from VARCHAR(200),
			i_transfer_from_qty INT,
			i_po VARCHAR(200),
			i_purchase INT,
			i_balance INT,
			i_date_added TIMESTAMP
			)";

	if (mysqli_query($conn, $sql)) {
 		
 	}
 	else {
 		die("<p>Error creating tbl_item " . mysqli_error($conn)) . "</p>";
 	}
 	mysqli_close($conn);
 ?>

 <!-- Item2 -->
<?php 
	include("connect_db.php");

	$sql = "CREATE TABLE IF NOT EXISTS tbl_item2 (
			a_item INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			a_category VARCHAR(200),
			a_type VARCHAR(200),
			a_description VARCHAR(200),
			a_unitcost FLOAT,
			a_qty INT,
			a_issuance INT,
			a_return INT,
			a_balance INT,
			a_location VARCHAR(200),
			a_date_added TIMESTAMP
			)";

	if (mysqli_query($conn, $sql)) {
 		
 	}
 	else {
 		die("<p>Error creating tbl_item2 " . mysqli_error($conn)) . "</p>";
 	}
 	mysqli_close($conn);
 ?>

<!-- Item Temporary -->
<?php 
	include("connect_db.php");

	$sql = "CREATE TABLE IF NOT EXISTS tbl_item_temp (
			it_item INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			it_category VARCHAR(200),
			it_type VARCHAR(200),
			it_description VARCHAR(200),
			it_unitcost FLOAT,
			it_qty INT,
			it_issuance INT,
			it_return INT,
			it_balance INT,
			it_location VARCHAR(200),
			it_date_added TIMESTAMP
			)";

	if (mysqli_query($conn, $sql)) {
 		
 	}
 	else {
 		die("<p>Error creating tbl_item_temp " . mysqli_error($conn)) . "</p>";
 	}
 	mysqli_close($conn);
 ?>