
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPEDI Material Control System</title>
  <link rel="icon" href="img/favicon.ico">
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="dist/css/bootstrap-theme.min.css">
  <link rel="stylesheet" type="text/css" href="dist/css/font-awesome.css">
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
            <li><a href="project_clearance.php">Project Clearance</a></li>
            <li class="active"><a href="summary.php">Inventory Summary</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="Admin/login.php">Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <?php
  if (isset($_POST['submit'])) {
  include("config.inc/connect_db.php");
  $category1 = $_POST['category1'];
  $type1 = $_POST['type1'];

  if ($category1 != "") {
    $query = "SELECT * FROM `tbl_item2` WHERE CONCAT(`a_category`) LIKE '".$category1."%'";
    $search_result = filterTable($query);
  }
  elseif ($type1 != "") {
     $query = "SELECT * FROM `tbl_item2` WHERE CONCAT(`a_type`) LIKE '".$type1."'";
    $search_result = filterTable($query);
  }
  else {
    $query = "SELECT * FROM `tbl_item2`";
    $search_result = filterTable($query);
  }
}
 else {
    $query = "SELECT * FROM `tbl_item2`";
    $search_result = filterTable($query);
}
// function to connect and execute the query
function filterTable($query)
{
    include("config.inc/connect_db.php");
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
            <label>Type:</label>
            <select name="type1" class="form-control">
              <option value="">Select Type:</option>
              <?php 
                include("config.inc/connect_db.php");
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
            <label>Category:</label>
            <select name="category1" class="form-control">
              <option value="">Select Category:</option>
              <?php 
                include("config.inc/connect_db.php");
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
      <div class="panel panel-primary text-center " id="project_clearance_table">
        <div class="panel-body table-responsive">
          <table class="table table-bordered table-condensed table-hover">
            <thead>
              <tr>
                <th>Item</th>
                <th>Description</th>
                <th>Previous</th>
                <th>Present</th>
                <th>Unit</th>
                <th>Unit Cost</th>
                <th>Previous Total</th>
                <th>Present Total</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = mysqli_fetch_array($search_result)):?>
                  <?php echo "<tr>"; ?>
                  <?php echo "<td>".$row['a_item']."</td>"; ?>
                  <?php echo "<td>".$row['a_description']."</td>"; ?>
                  <?php echo "<td>".$row['a_prev']."</td>"; ?>
                  <?php echo "<td>".$row['a_pres']."</td>"; ?>
                  <?php echo "<td>".$row['a_unit']."</td>"; ?>
                  <?php echo "<td>".$row['a_unitcost']."</td>"; ?>
                  <?php echo "<td>".$row['a_prevtotal']."</td>"; ?>
                  <?php echo "<td>".$row['a_prestotal']."</td>"; ?>
                  <?php echo "</tr>"; ?>
              <?php endwhile;?>
            </tbody>     
          </table>
        </div>
      </div>
      <button name="create_excel" id="create_excel" class="btn btn-primary">Create Excel File</button>
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