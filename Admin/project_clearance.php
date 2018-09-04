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
    <nav class="navbar navbar-inverse">
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
            <li><a href="control.php">Inventory Control</a></li>
            <li class="active"><a href="project_clearance.php">Project Clearance</a></li>
            <li><a href="warehouse_inventory.php">Warehouse Inventory</a></li>
            <li><a href="summary.php">Inventory Summary</a></li>
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
  $project = $_POST['project'];
  $category = $_POST['category'];

  if ($project != "") {
    $query = "SELECT * FROM `tbl_item` WHERE CONCAT(`i_projectname`) LIKE '".$project."'";
    $search_result = filterTable($query);
  }
  elseif ($category != "") {
    $query = "SELECT * FROM `tbl_item` WHERE CONCAT(`i_category`) LIKE '".$category."%'";
    $search_result = filterTable($query);
  }
  else {
    $query = "SELECT * FROM `tbl_item`";
    $search_result = filterTable($query);
  }
}
 else {
    $query = "SELECT * FROM `tbl_item`";
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
  <div class="container">
  <div class="row">
    <div class="panel panel-primary">
      <div class="panel-heading text-center">
        <h3 class="panel-title">Filter</h3>
      </div>
      <div class="panel-body">
        <div class="col-xs-12 col-md-6 col-lg-6">
          <div class="text-center">
            <label>Project:</label>
          <select name="project" class="form-control">
            <option value="">Select Project</option>
            <?php 
                include("../config.inc/connect_db.php");
                $sql = "SELECT DISTINCT i_projectname FROM tbl_item;";

                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($query)) {
                  $project = $row['i_projectname'];
                  echo "<option value='".$project."'>".$project."</option>";
                }
            ?>
            </select>
          </div>
        </div>

        <div class="col-xs-12 col-md-6 col-lg-6">
          <div class="text-center">
            <label>Category:</label>
            <select name="category" class="form-control">
              <option value="">Select Category:</option>
              <?php 
                include("../config.inc/connect_db.php");
                  $sql = "SELECT DISTINCT i_category FROM tbl_item;";

                  $query = mysqli_query($conn, $sql);

                  while ($row = mysqli_fetch_assoc($query)) {
                    $category = $row['i_category'];
                    echo "<option value='".$category."'>".$category."</option>";
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
      <div class="panel panel-primary text-center " id="project_clearance_table">
        <div class="panel-body table-responsive">
          <table class="table table-bordered table-condensed table-hover">
            <thead>
              <tr>
                <th>Project Name</th>
                <th>Location</th>
                <th>Item</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Issued</th>
                <th>Returned</th>
                <th>Transfer To</th>
                <th>Transfer From</th>
                <th>Balance</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = mysqli_fetch_array($search_result)):?>
                  <?php echo "<tr>"; ?>
                  <?php echo "<td>".$row['i_projectname']. "</td>"; ?>
                  <?php echo "<td>".$row['i_location']."</td>"; ?>
                  <?php echo "<td>".$row['i_item']."</td>"; ?>
                  <?php echo "<td>".$row['i_description']."</td>"; ?>
                  <?php echo "<td>".$row['i_unit']."</td>"; ?>
                  <?php echo "<td>".$row['i_issued']."</td>"; ?>
                  <?php echo "<td>".$row['i_returned']."</td>"; ?>
                  <?php echo "<td>".$row['i_transfer_to_qty']."</td>"; ?>
                  <?php echo "<td>".$row['i_transfer_from_qty']."</td>"; ?>
                  <?php 
                      if ($row['i_balance'] > 0) {
                        echo "<td class='danger'>".$row['i_balance']."</td>";
                      }
                      elseif ($row['i_balance'] < 0) {
                        echo "<td class='info'>".$row['i_balance']."</td>";
                      }
                      else {
                        echo "<td class='default'>".$row['i_balance']."</td>";
                      }
                      $project = $row['i_projectname'];
                      $GLOBALS['token'] = $GLOBALS['project'];
                  ?>
                  <?php echo "</tr>"; ?>
              <?php endwhile;?>
            </tbody>     
          </table>
        </div>
      </div>
      <form method="post" action="export.php">
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