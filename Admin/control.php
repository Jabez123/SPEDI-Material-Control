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
            <li class="active"><a href="control.php">Inventory Control</a></li>
            <li><a href="project_clearance.php">Project Clearance</a></li>
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
    <!-- SANDIRPURD -->
<div class="container-fluid">
	<div class="col-xs-9 col-md-3 col-lg-3">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    		<div class="input-group">
    			<select name="project" class="form-control" id="select">
          			<option>Select Project</option>
          				<?php 
                    include("../config.inc/connect_db.php");
          					$sql = "SELECT DISTINCT i_projectname FROM tbl_item;";

          					$query = mysqli_query($conn, $sql);

          					if ($query) {
                      while ($row = mysqli_fetch_assoc($query)) {
                      $project = $row['i_projectname'];
                      echo "<option value='".$project."''>".$project."</option>";
                    }
                  }
                    else {
                      die("Error: " .mysqli_error($conn));
                    }
                  
          				?>
        		</select>
    			<span class="input-group-btn">
      				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
    			</span>
  			</div>
        </form>
        <?php 
        include("../config.inc/connect_db.php");
        	if (isset($_POST['submit'])) {
        			$project = $_POST['project'];
        			$sql = "SELECT DISTINCT i_projectname FROM tbl_item WHERE i_projectname = '$project'";
        			$query = mysqli_query($conn, $sql);
        			while ($row = mysqli_fetch_assoc($query)) {
        				$project = $row['i_projectname'];
        			}
              header("Location: control_project.php?project=".$project."");
        	}
         ?>
      </div>
      <button type="button" class="btn btn-success pull-right" onclick="window.location='add.php'">Add +</button>
    </div>
<div style="margin-top: 20px;" class="container">
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-primary text-center">
				<div class="panel-heading">
					<h3 class="panel-heading">Project: None Location: None
					</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-responsive table-hover table-condensed table-bordered">
            <thead>
              <tr>
                <th>Item</th>
                <th>Type</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Action</th>
                <th>View</th>
              </tr>
            </thead>     
            <tbody>
            </tbody>
          </table>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/.nav-collapse -->
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