<?php 
include("../config.inc/connect_db.php");
  $id = $_REQUEST['token'];

  $sql = "SELECT  * FROM tbl_item2 WHERE a_item='$id'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
  	while ($row = mysqli_fetch_assoc($result)) {		
  		$category1 = $row['a_category'];
  		$type1 = $row['a_type'];
  		$description1 = $row['a_description'];
  		$unitcost1 = $row['a_unitcost'];
  		$qty1 = $row['a_qty'];
  		$issuance1 = $row['a_issuance'];
  		$return1 = $row['a_return'];
      $location1 = $row['a_location'];
      $balance1 = $row['a_balance'];
  	}
  }
  else {
  		echo "No display error";
  	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="../dist/css/font-awesome.css">
</head>
<body>
<div class="container">
	<div class="row">
    <?php 
    include("../config.inc/connect_db.php");
      if (isset($_POST['edit'])) {
        $category1_edit = strip_tags($_POST['category1']);
        $type1_edit = strip_tags($_POST['type1']);
        $description1_edit = strip_tags($_POST['description1']);
        $unitcost1_edit = strip_tags($_POST['unitcost1']);
        $qty1_edit = strip_tags($_POST['qty1']);
        $issuance1_edit = strip_tags($_POST['issuance1']);
        $return1_edit = strip_tags($_POST['return1']);
        $location1_edit = strip_tags($_POST['location1']);


        $category1_edit = mysqli_real_escape_string($conn, $category1_edit);
        $type1_edit = mysqli_real_escape_string($conn, $type1_edit);
        $description1_edit = mysqli_real_escape_string($conn, $description1_edit);
        $unitcost1_edit = mysqli_real_escape_string($conn, $unitcost1_edit);
        $qty1_edit = mysqli_real_escape_string($conn, $qty1_edit);
        $issuance1_edit = mysqli_real_escape_string($conn, $issuance1_edit);
        $return1_edit = mysqli_real_escape_string($conn, $return1_edit);
        $location1_edit = mysqli_real_escape_string($conn, $location1_edit);
        

        $balance1_edit = $qty1_edit - $issuance1_edit + $return1_edit;

        $sql = "UPDATE tbl_item2 SET 
        a_category = '$category1_edit', a_type = '$type1_edit', a_description = '$description1_edit', a_unitcost = '$unitcost1_edit', a_qty = '$qty1_edit', a_issuance = '$issuance1_edit', a_return = '$return1_edit', a_location = '$location1_edit', a_balance = '$balance1_edit' WHERE a_item='$id';";
        $sql .= "INSERT INTO tbl_item_temp SET
        it_category = '$category1_edit', it_type = '$type1_edit', it_description = '$description1_edit', it_unitcost = '$unitcost1_edit', it_qty = '$qty1_edit', it_issuance = '$issuance1_edit', it_return = '$return1_edit', it_location = '$location1_edit', it_balance = '$balance1_edit';";

        if ($conn->multi_query($sql)) {
         echo '<div class="alert alert-dismissible alert-success text-center"> Edit Success! 
          <a href="warehouse_inventory.php">Click here to continue</a></div>';
    }
    else {
      die("Inserting tbl_item2 error: " . mysqli_error($conn));
    }
      }
     ?>
    <form class="form-horizontal" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <div class="col-xs-12 col-md-12 col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <h3 class="panel-heading">Edit <?php echo $description1 . " In Type " . $type1; ?></h3>
        </div>
        <div class="panel-body">
          <div class="col-xs-12 col-md-6 col-lg-6"> 
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Type</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <select class="form-control" name="category1">
                	<?php 
                		if ($category1 = "Materials") {
                			echo "<option value='".$category1."'>".$category1."</option>";
                			echo "<option>Tools and Equipment</option>";

                		}
                		else {
                			echo "<option value='".$category1."'>".$category1."</option>";
                			echo "<option>Materials</option>";
                		}
                	 ?>
                </select>
              </div>
              <!-- CategoryMaterialToolTypeLocation-->
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Category</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="type1" value="<?php echo $type1; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Description</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="description1" value="<?php echo $description1; ?>">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Unit Cost</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="unitcost1" value="<?php echo $unitcost1; ?>" min="0" step="0.01">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Quantity</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="qty1" value="<?php echo $balance1; ?>" min="0">
              </div>
            </div>  
           
            
          </div>

          <div class="col-xs-12 col-md-6 col-lg-6"> 
             <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Issuance</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="issuance1" value="0" min="0">
              </div>
            </div> 
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Return</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="return1" value="0" min="0">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Location</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="location1" value="<?php echo $location1; ?>">
              </div>
            </div>
            <div class="panel-body">
              <div class="col-xs-12 col-md-3 col-lg-6">
                <button type="button" onclick="window.location='warehouse_inventory.php'" class="btn btn-block btn-default">Back</button>
              </div>
              <div class="col-xs-12 col-md-9 col-lg-6">
                <button type="submit" name="edit" class="btn btn-block btn-success">Submit</button>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </div>
    </form> 
  </div>
</div>
<script type="text/javascript" src="../dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../dist/js/bootstrap.js"></script>
<script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>
</body>
</html>