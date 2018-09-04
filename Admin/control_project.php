<?php 
include("../config.inc/connect_db.php");
  $project1 = $_REQUEST['project'];
  $sql = "SELECT * FROM tbl_item WHERE i_projectname ='".$project1."'";
  $query = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($query)) {
    $location = $row['i_location'];
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
                  <li><a tabindex="-1" href="#"></a>BOBO</li>
                </li>
                <li class="divider"></li>
                <li><a href="../index.php">Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container-fluid">
	<div class="col-xs-9 col-md-3 col-lg-3">
        <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    		<div class="input-group">
    			<select name="project" class="form-control" id="select">
            <option value="None">Select Project</option>
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
    			<span class="input-group-btn">
      				<button type="submit" name="submit" class="btn btn-primary" type="button">Submit</button>
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
        				$_REQUEST['project'] = $row['i_projectname'];
        			}
        	}
         ?>
      </div>
      <button type="button" class="btn btn-success pull-right" onclick="window.location='add.php'">Add +</button>
    </div>
<div style="margin-top: 20px;" class="container">
	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">
			<div class="panel panel-primary text-center ">
				<div class="panel-heading">
					<h3 class="panel-heading">Project: <?php echo $project1; ?> Location: <?php echo $location; ?>
					</h3>
				</div>
				<div class="panel-body table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
            <thead>
              <tr>
                <th>Item</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Action</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                include("../config.inc/connect_db.php");

                $sql = "SELECT * FROM tbl_item WHERE i_projectname = '$project1'";

                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                  while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row['i_item']."</td>";
                    echo "<td>".$row['i_description']."</td>";
                    echo "<td>".$row['i_unit']."</td>";
                    echo "<td><div class='col-xs-12'><a href='edit.php?token=".$row['i_item']."'><button type='button' class='btn btn-primary'>Edit</button></a>  <a href='delete.php?token=".$row['i_item']."'><button type='submit' name='delete' class='btn btn-danger'>Delete</button></a></div></td>";
                    echo "<td><a href='view.php?token=".$row['i_item']."'><button class='btn btn-sm btn-info'>View</button></a></td>";
                  }
                }
                else {
                }
              ?>
            </tbody>     
          </table>
				</div>
			</div>
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
</body>
</html>