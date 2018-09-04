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
      <div class="col-xs-12 col-md-12 col-lg-12">
      <div class="panel panel-primary">
        <div class="panel-heading text-center">
          <h3 class="panel-heading">Detailed View for <?php echo $description; ?> Item</h3>
        </div>
        <div class="panel-body">
          <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Project</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $projectname; ?>">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Location</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $location; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Category</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $category; ?>">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Type</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $type; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Description</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $description; ?>">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Unit</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $unit; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">MIS #</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $mis; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Issued Amount</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" readonly="" value="<?php echo $issued; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">MRS #</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $mrs; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Returned Amount</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" readonly="" value="<?php echo $returned; ?>">
              </div>
            </div>
          </div>

          <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">MTS # For Transfer to</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $mtstransferto; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Transfer to Project</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $transfertoproject; ?>">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Amount for Transfer to</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" readonly="" value="<?php echo $amounttransferto; ?>">
              </div>
            </div>  
             <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">MTS # For Transfer from</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $mtstransferfrom; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Transfer from Project</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $transferfromproject; ?>">
              </div>
            </div>
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Amount for Transfer from</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" readonly="" value="<?php echo $amounttransferfrom; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">PO #</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="text" readonly="" value="<?php echo $po; ?>">
              </div>
            </div>  
            <div class="panel-body">
                <label class="col-xs-12 col-md-3 col-lg-3 control-label">Purchased Amount</label>
              <div class="col-xs-12 col-md-9 col-lg-9">
                <input class="form-control" type="number" readonly="" value="<?php echo $purchased; ?>">
              </div>
            </div> 
            <div class="panel-body">
              <div class="col-xs-12 col-md-12 col-lg-12">
                <button type="button" onclick="window.location='control.php'" class="btn btn-block btn-default">Back</button>
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