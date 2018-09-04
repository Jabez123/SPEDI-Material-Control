<?php 
include("../config.inc/connect_db.php");
  $id = $_REQUEST['token'];
  $description= $_REQUEST['description'];
  

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
      
      <div class="panel panel-primary text-center">
          <div class="panel-heading">
            <h3 class="panel-heading">Detailed View for <?php echo $description1; ?></h3>
          </div>
          <div class="panel-body">
            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Description</th>
                  <th>Unit Cost</th>
                  <th>Quantity</th>
                  <th>Issuance</th>
                  <th>Return</th>
                  <th>Balance</th>
                  <th>Date Updated</th>
                </tr>
              </thead>
              <tbody>
                
                  <?php 
                    include("../config.inc/connect_db.php");

                   
                    $sql = "SELECT * FROM tbl_item_temp WHERE it_description='$description'";

                    $query = mysqli_query($conn, $sql);
                    $counter = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                  
                
                      $description1_edit = $row['it_description'];
                      $unitcost1_edit = $row['it_unitcost'];
                      $qty1_edit = $row['it_qty'];
                      $issuance1_edit = $row['it_issuance'];
                      $return1_edit = $row['it_return'];
                      $balance1_edit = $row['it_balance'];
                      $date_added = $row['it_date_added'];

                      if ($category1_edit = "Materials") {
                      echo "<tr class='success'>";
                      echo "<td>".$counter."</td>";
                    
                      echo "<td>".$description1_edit."</td>";
                      echo "<td>".$unitcost1_edit."</td>";
                      echo "<td>".$qty1_edit."</td>"; 
                      echo "<td>".$issuance1_edit."</td>";
                      echo "<td>".$return1_edit."</td>";
                      echo "<td>".$balance1_edit."</td>";
                      echo "<td>".$date_added."</td>";
                      }
                      else {
                      echo "<td>".$counter."</td>";
                   
                      echo "<td>".$description1_edit."</td>";
                      echo "<td>".$unitcost1_edit."</td>";
                      echo "<td>".$qty1_edit."</td>"; 
                      echo "<td>".$issuance1_edit."</td>";
                      echo "<td>".$return1_edit."</td>";
                      echo "<td>".$balance1_edit."</td>";
                      echo "<td>".$date_added."</td>";
                      }
                      $counter++;
                    }
                   ?>
                </tr>
              </tbody>
            </table>
          </div>
         
          <div class="panel-body ">
              <div class="col-xs-4 col-md-4 col-lg-4 pull-right">
                <button type="button" onclick="window.location='warehouse_inventory.php'" class="btn btn-block btn-default">Back</button>
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