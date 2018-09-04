<?php 
include("../config.inc/connect_db.php");
  $id = $_REQUEST['token'];

  $sql = "SELECT  * FROM tbl_item WHERE i_item='$id'";

  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
  	while ($row = mysqli_fetch_assoc($result)) {
  		$projectname = $row['i_projectname'];
  		$location = $row['i_location'];
  		$category = $row['i_category'];
  		$type = $row['i_type'];
  		$description = $row['i_description'];
  		$unit = $row['i_unit'];
  		$mis = $row['i_mis'];
  		$issued = $row['i_issued'];
  		$mrs = $row['i_mrs'];
  		$returned = $row['i_returned'];
  		$mtstransferto = $row['i_transfer_to_mts'];
  		$transfertoproject = $row['i_transfer_to'];
  		$amounttransferto = $row['i_transfer_to_qty'];
  		$mtstransferfrom = $row['i_transfer_from_mts'];
  		$transferfromproject = $row['i_transfer_from'];
  		$amounttransferfrom = $row['i_transfer_from_qty'];
  		$po = $row['i_po'];
  		$purchased = $row['i_purchase'];
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
        $project_edit = strip_tags($_POST['project']);
        $location_edit = strip_tags($_POST['location']);
        $category_edit = strip_tags($_POST['category']);
        $type_edit = strip_tags($_POST['type']);
        $description_edit = strip_tags($_POST['description']);
        $unit_edit = strip_tags($_POST['unit']);
        $mis_edit = strip_tags($_POST['mis']);
        $issued_edit = strip_tags($_POST['issued']);
        $mrs_edit = strip_tags($_POST['mrs']);
        $returned_edit = strip_tags($_POST['returned']);
        $mtstransferto_edit = strip_tags($_POST['mtstransferto']);
        $transfertoproject_edit = strip_tags($_POST['transfertoproject']);
        $amounttransferto_edit = strip_tags($_POST['amounttransferto']);
        $mtstransferfrom_edit = strip_tags($_POST['mtstransferfrom']);
        $transferfromproject_edit = strip_tags($_POST['transferfromproject']);
        $amounttransferfrom_edit = strip_tags($_POST['amounttransferfrom']);
        $po_edit = strip_tags($_POST['po']);
        $purchased_edit = strip_tags($_POST['purchased']);

        $project_edit = mysqli_real_escape_string($conn, $project_edit);
        $location_edit = mysqli_real_escape_string($conn, $location_edit);
        $category_edit = mysqli_real_escape_string($conn, $category_edit);
        $type_edit = mysqli_real_escape_string($conn, $type_edit);
        $description_edit = mysqli_real_escape_string($conn, $description_edit);
        $unit_edit = mysqli_real_escape_string($conn, $unit_edit);
        $mis_edit = mysqli_real_escape_string($conn, $mis_edit);
        $issued_edit = mysqli_real_escape_string($conn, $issued_edit);
        $mrs_edit = mysqli_real_escape_string($conn, $mrs_edit);
        $returned_edit = mysqli_real_escape_string($conn, $returned_edit);
        $mtstransferto_edit = mysqli_real_escape_string($conn, $mtstransferto_edit);
        $transfertoproject_edit = mysqli_real_escape_string($conn, $transfertoproject_edit);
        $amounttransferto_edit = mysqli_real_escape_string($conn, $amounttransferto_edit);
        $mtstransferfrom_edit = mysqli_real_escape_string($conn, $mtstransferfrom_edit);
        $transferfromproject_edit = mysqli_real_escape_string($conn, $transferfromproject_edit);
        $amounttransferfrom_edit = mysqli_real_escape_string($conn, $amounttransferfrom_edit);
        $po_edit = mysqli_real_escape_string($conn, $po);
        $purchased_edit = mysqli_real_escape_string($conn, $purchased_edit);

        $balance_edit = $issued_edit + $amounttransferto_edit - $returned_edit - $amounttransferfrom_edit;

        $sql = "UPDATE tbl_item SET 
        i_projectname = '$project_edit', i_location = '$location_edit', i_category = '$category_edit', i_type = '$type_edit', i_description = '$description_edit', i_unit = '$unit_edit', i_mis = '$mis_edit', i_issued = '$issued_edit', i_mrs = '$mrs_edit', i_returned = '$returned_edit', i_transfer_to_mts = '$mtstransferto_edit', i_transfer_to = '$transfertoproject_edit', i_transfer_to_qty = '$amounttransferto_edit', i_transfer_from_mts = '$mtstransferfrom_edit', i_transfer_from = '$transferfromproject_edit', i_transfer_from_qty = '$amounttransferfrom_edit', i_po = '$po_edit', i_purchase = '$purchased_edit', i_balance = '$balance_edit' WHERE i_item='$id';";

        if ($conn->query($sql)) {
         echo '<div class="alert alert-dismissible alert-success text-center"> Edit Success! 
          <a href="control.php">Click here to continue</a></div>';
    }
    else {
      die("Inserting tbl_item error: " . mysqli_error($conn));
    }
      }
     ?>
    <form class="form-horizontal" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <div class="col-xs-12 col-md-12 col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <h3 class="panel-heading">Edit <?php echo $description . " In Project " . $projectname; ?></h3>
        </div>
        <div class="panel-body">
          <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Project</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="project" value="<?php echo $projectname ?>">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Location</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="location" value="<?php echo $location ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Category</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <select class="form-control" name="category">
                	<?php 
                		if ($category = "Materials") {
                			echo "<option value='".$category."'>".$category."</option>";
                			echo "<option>Tools and Equipment</option>";
                		}
                		else {
                			echo "<option value='".$category."'>".$category."</option>";
                			echo "<option>Materials</option>";
                		}
                	 ?>
                </select>
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Type</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="type" value="<?php echo $type; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Description</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="description" value="<?php echo $description; ?>">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Unit</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="unit" value="<?php echo $unit; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">MIS #</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="mis" value="<?php echo $mis; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Issued Amount</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="issued" value="<?php echo $issued; ?>" min="0">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">MRS #</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="mrs" value="<?php echo $mrs; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Returned Amount</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="returned" value="<?php echo $returned; ?>" min="0">
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">MTS # For Transfer to</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="mtstransferto" value="<?php echo $mtstransferto; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Transfer to Project</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="transfertoproject" value="<?php echo $transfertoproject; ?>">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Amount for Transfer to</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="amounttransferto" value="<?php echo $amounttransferto; ?>" min="0">
              </div>
            </div>  
             <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">MTS # For Transfer from</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="mtstransferfrom" value="<?php echo $mtstransferfrom; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Transfer from Project</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="transferfromproject" value="<?php echo $transferfromproject; ?>">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Amount for Transfer from</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="amounttransferfrom" value="<?php echo $amounttransferfrom; ?>" min="0">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">PO #</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="po" value="<?php echo $po; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Purchased Amount</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="purchased" value="<?php echo $purchased ?>" min="0">
              </div>
            </div> 
            <div class="panel-body">
              <div class="col-xs-12 col-md-3 col-lg-6">
                <button type="button" onclick="window.location='control.php'" class="btn btn-block btn-default">Back</button>
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