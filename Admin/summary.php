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
<!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">SPEDI Material Control System</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Dashboard</a></li>
            
            <li><a href="warehouse_inventory.php">Warehouse Inventory</a></li>
            <li class="active"><a href="summary.php">Inventory Summary</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Settings <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="create_account.php">Create Account</a></li>
                <li class="dropdown-submenu">
                  <a class="test" tabindex="-1" href="#"><span class="caret"></span> Themes</a>
                  <ul class="dropdown-menu">
                    <li class="active"><a tabindex="-1" href="index.php">Default</a></li>
                    <li><a tabindex="-1" href="#">Light</a></li>
                    <li><a tabindex="-1" href="#">Dark</a></li>
                  </ul>
                </li>
                <li class="divider"></li>
                <li><a href="../index.php">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

 <?php

if (isset($_POST['submit'])) {
  include("../config.inc/connect_db.php");
  $category1 = $_POST['category1'];
  $type1 = $_POST['type1'];


  
  if ($type1 != "") {
     $query = "SELECT * FROM `tbl_item2` WHERE CONCAT(`a_type`) LIKE '".$type1."' ORDER BY a_description";
    $search_result = filterTable($query);
  }
  elseif ($category1 != "") {
    $query = "SELECT * FROM `tbl_item2` WHERE CONCAT(`a_category`) LIKE '".$category1."%'  ORDER BY a_description";
    $search_result = filterTable($query);
  }
  else {
    $query = "SELECT * FROM `tbl_item2`  ORDER BY a_description";
    $search_result = filterTable($query);
  }
}
 else {
    $query = "SELECT * FROM `tbl_item2`  ORDER BY a_description";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    include("../config.inc/connect_db.php");
    $filter_Result = mysqli_query($conn, $query);
    return $filter_Result;
}

?>
<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  <div class="container" style="margin-top: 80px">
  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading text-center">
        <h3 class="panel-title">Filter</h3>
      </div>
      <div class="panel-body">

        <div class="col-xs-12 col-md-6 col-lg-6">
          <div class="text-center">
            <label>Category:</label>
            <select name="type1" class="form-control">
              <option value="">Select Category:</option>
              <?php 
                include("../config.inc/connect_db.php");
                  $sql = "SELECT DISTINCT a_type FROM tbl_item2;";

                  $query = mysqli_query($conn, $sql);

                  while ($row = mysqli_fetch_assoc($query)) {
                    $type1 = $row['a_type'];
                    echo "<option value='".$type1."'>".$type1."</option>";
                  }
                ?>
            </select>
          </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6">
          <div class="text-center">
            <label>Type:</label>
            <select name="category1" class="form-control">
              <option value="">Select Type:</option>
              <?php 
                include("../config.inc/connect_db.php");
                  $sql = "SELECT DISTINCT a_category FROM tbl_item2;";

                  $query = mysqli_query($conn, $sql);

                  while ($row = mysqli_fetch_assoc($query)) {
                    $category1 = $row['a_category'];
                    echo "<option value='".$category1."'>".$category1."</option>";
                  }
                ?>
            </select>
          </div>
        </div>

      </div>
      <div class="panel-footer">
        <div class="text-center">
          <button type="submit" name="submit" class="btn btn-success">Submit</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form>

<div style="margin-top: 20px;" class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
      <div class="panel panel-primary " id="project_clearance_table">
        <div class="panel-body table-responsive">
          <table class="table table-bordered table-condensed table-hover">
            <thead>
              <tr>
                <th>NO.</th>
                <th><center>Item Description</center></th>
                <th>Category</th>
                <th>Unit Cost</th>
                <th>Quantity</th>
                <th>Issuance</th>
                <th>Return</th>
                <th>Balance</th>
                <th>Location</th>
              </tr>
            </thead>
            <tbody>
              <?php $counter = 1; ?>
              <?php while($row = mysqli_fetch_array($search_result)):?>
                  <?php echo "<tr>"; ?>
                  <?php echo "<td>" . $counter . "</td>"; ?> 
                  <?php echo "<td>".$row['a_description']."</td>"; ?>
                  <?php echo "<td>".$row['a_type']."</td>"; ?>
                  <?php echo "<td>".number_format($row['a_unitcost'],2)."</td>"; ?>
                  <?php echo "<td>".$row['a_qty']."</td>"; ?>
                  <?php echo "<td>".$row['a_issuance']."</td>"; ?>
                  <?php echo "<td>".$row['a_return']."</td>"; ?>
                  <?php 
                      if ($row['a_balance'] > 0) {
                        echo "<td class='danger'>".$row['a_balance']."</td>";
                      }
                      elseif ($row['a_balance'] < 0) {
                        echo "<td class='info'>".$row['a_balance']."</td>";
                      }
                      else {
                        echo "<td class='default'>".$row['a_balance']."</td>";
                      }


                      $type1 = $row['a_type'];
                      $GLOBALS['token'] = $GLOBALS['type1'];
                  ?>
                   <?php echo "<td>".$row['a_location']."</td>"; ?>
                 
                  <?php echo "</tr>"; ?>
                  <?php $counter++ ?>
              <?php endwhile;?>
            </tbody>     
          </table>
        </div>
      </div>
      <form method="post" action="export1.php">
     <input type="submit" name="export" class="btn btn-primary" value="Create Excel File" />
    </form>
    </div>
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
 <script>  
 $(document).ready(function(){  
      $('#create_excel').click(function(){  
           var excel_data = $('#project_clearance_table').html();  
           var page = "excel.php?data=" + excel_data;  
           window.location = page;  
      });  
 });  
 </script>  
</body>
</html>