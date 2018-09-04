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
      if (isset($_POST['add'])) {
        $category1 = strip_tags($_POST['category1']);
        $type1 = strip_tags($_POST['type1']);
        $description1 = strip_tags($_POST['description1']);
        $unitcost1 = strip_tags($_POST['unitcost1']);
        $qty1 = strip_tags($_POST['qty1']);
        $issuance1 = strip_tags($_POST['issuance1']);
        $return1 = strip_tags($_POST['return1']);
        $location1 = strip_tags($_POST['location1']);

        $category1 = mysqli_real_escape_string($conn, $category1);
        $type1 = mysqli_real_escape_string($conn, $type1);
        $description1 = mysqli_real_escape_string($conn, $description1);
        $unitcost1 = mysqli_real_escape_string($conn, $unitcost1);
        $qty1 = mysqli_real_escape_string($conn, $qty1);
        $issuance1 = mysqli_real_escape_string($conn, $issuance1);
        $return1 = mysqli_real_escape_string($conn, $return1);
        $location1 = mysqli_real_escape_string($conn, $location1);

        $balance1 = $qty1 - $issuance1 + $return1;

        $sql = "INSERT INTO tbl_item2 
        (a_category, a_type, a_description, a_unitcost, a_qty, a_issuance, a_return, a_balance, a_location) VALUES 
        ('$category1','$type1','$description1','$unitcost1','$qty1','$issuance1','$return1','$balance1','$location1');";
        $sql .= "INSERT INTO tbl_item_temp SET
        it_category = '$category1', it_type = '$type1', it_description = '$description1', it_unitcost = '$unitcost1', it_qty = '$qty1', it_issuance = '$issuance1', it_return = '$return1', it_location = '$location1', it_balance = '$balance1';";

        if ($conn->multi_query($sql)) {
         echo '<div class="alert alert-dismissible alert-success text-center"> Adding Success! 
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
          <h3 class="panel-heading">Add to Inventory</h3>
        </div>
        <div class="panel-body">
          <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Type</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <select class="form-control" name="category1" required="">
                  <option>Materials</option>
                  <option>Tools and Equipment</option>
                </select>
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Category</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="type1" required="">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Description</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="description1" required="">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Unit Cost</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="unitcost1" min="0" value="0" step="0.01">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Quantity</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="qty1" min="0" value="0">
              </div>
            </div>  
             
            
            
          </div>
            <div class="col-xs-12 col-md-6 col-lg-6">
           <!-- edi wow -->
           <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Issuance</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="issuance1" min="0" value="0">
              </div>
            </div> 
           <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Return</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="return1" min="0" value="0">
              </div>
            </div>
           <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Location</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="location1" value="Valenzuela" required="">
              </div>
            </div>
            <div class="panel-body">
              <div class="col-xs-12 col-md-3 col-lg-6">
                <button type="button" onclick="window.location='warehouse_inventory.php'" class="btn btn-block btn-default">Back</button>
              </div>
              <div class="col-xs-12 col-md-9 col-lg-6">
                <button type="submit" name="add" class="btn btn-block btn-success">Submit</button>
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