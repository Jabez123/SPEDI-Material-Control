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
        $project = strip_tags($_POST['project']);
        $location = strip_tags($_POST['location']);
        $category = strip_tags($_POST['category']);
        $type = strip_tags($_POST['type']);
        $description = strip_tags($_POST['description']);
        $unit = strip_tags($_POST['unit']);
        $mis = strip_tags($_POST['mis']);
        $issued = strip_tags($_POST['issued']);
        $mrs = strip_tags($_POST['mrs']);
        $returned = strip_tags($_POST['returned']);
        $mtstransferto = strip_tags($_POST['mtstransferto']);
        $transfertoproject = strip_tags($_POST['transfertoproject']);
        $amounttransferto = strip_tags($_POST['amounttransferto']);
        $mtstransferfrom = strip_tags($_POST['mtstransferfrom']);
        $transferfromproject = strip_tags($_POST['transferfromproject']);
        $amounttransferfrom = strip_tags($_POST['amounttransferfrom']);
        $po = strip_tags($_POST['po']);
        $purchased = strip_tags($_POST['purchased']);

        $project = mysqli_real_escape_string($conn, $project);
        $location = mysqli_real_escape_string($conn, $location);
        $category = mysqli_real_escape_string($conn, $category);
        $type = mysqli_real_escape_string($conn, $type);
        $description = mysqli_real_escape_string($conn, $description);
        $unit = mysqli_real_escape_string($conn, $unit);
        $mis = mysqli_real_escape_string($conn, $mis);
        $issued = mysqli_real_escape_string($conn, $issued);
        $mrs = mysqli_real_escape_string($conn, $mrs);
        $returned = mysqli_real_escape_string($conn, $returned);
        $mtstransferto = mysqli_real_escape_string($conn, $mtstransferto);
        $transfertoproject = mysqli_real_escape_string($conn, $transfertoproject);
        $amounttransferto = mysqli_real_escape_string($conn, $amounttransferto);
        $mtstransferfrom = mysqli_real_escape_string($conn, $mtstransferfrom);
        $transferfromproject = mysqli_real_escape_string($conn, $transferfromproject);
        $amounttransferfrom = mysqli_real_escape_string($conn, $amounttransferfrom);
        $po = mysqli_real_escape_string($conn, $po);
        $purchased = mysqli_real_escape_string($conn, $purchased);

        $balance = $issued + $amounttransferto - $returned - $amounttransferfrom;

        $sql = "INSERT INTO tbl_item 
        (i_projectname, i_location, i_category, i_type, i_description, i_unit, i_mis
        , i_issued, i_mrs, i_returned, i_transfer_to_mts, i_transfer_to, i_transfer_to_qty
        , i_transfer_from_mts, i_transfer_from, i_transfer_from_qty, i_po, i_purchase, i_balance) VALUES 
        ('$project','$location','$category','$type','$description','$unit','$mis'
        ,'$issued','$mrs','$returned','$mtstransferto','$transfertoproject','$amounttransferto'
        ,'$mtstransferfrom','$transferfromproject','$amounttransferfrom','$po','$purchased','$balance');";

        if ($conn->query($sql)) {
         echo '<div class="alert alert-dismissible alert-success text-center"> Adding Success! 
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
          <h3 class="panel-heading">Add to Inventory</h3>
        </div>
        <div class="panel-body">
          <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Project</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="project" required="">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Location</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="location" required="">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Category</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <select class="form-control" name="category" required="">
                  <option>Materials</option>
                  <option>Tools and Equipment</option>
                </select>
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Type</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="type" required="">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Description</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="description" required="">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Unit</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="unit" required="">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">MIS #</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="mis">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Issued Amount</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="issued" min="0" value="0">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">MRS #</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="mrs">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Returned Amount</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="returned" min="0" value="0">
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">MTS # For Transfer to</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="mtstransferto">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Transfer to Project</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="transfertoproject">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Amount for Transfer to</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="amounttransferto" min="0" value="0">
              </div>
            </div>  
             <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">MTS # For Transfer from</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="mtstransferfrom">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Transfer from Project</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="transferfromproject">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Amount for Transfer from</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="amounttransferfrom" min="0" value="0">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">PO #</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" name="po">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Purchased Amount</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" name="purchased" min="0" value="0">
              </div>
            </div> 
            <div class="panel-body">
              <div class="col-xs-12 col-md-3 col-lg-6">
                <button type="button" onclick="window.location='control.php'" class="btn btn-block btn-default">Back</button>
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