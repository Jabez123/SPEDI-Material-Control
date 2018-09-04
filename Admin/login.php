<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="../dist/css/font-awesome.min.css">
</head>
<body>
	<div style="padding-top: 150px;" class="container">
		<div class="row">
			<div class="col-xs-12 col-md-3 col-lg-3"></div>
			<div class="col-xs-12 col-md-6 col-lg-6">
				<?php 
					if (isset($_POST['login'])) {
						mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
						include("../config.inc/connect_db.php");

						$username = strip_tags($_POST['username']);
						$password = strip_tags($_POST['password']);

						$username = mysqli_real_escape_string($conn, $username);
						$password = mysqli_real_escape_string($conn, $password);

						$sql = "SELECT a_id, a_username, a_password FROM tbl_admin WHERE a_username='$username' AND a_password='$password'";
                        $query = mysqli_query($conn, $sql);

                        $row = $query->fetch_array();

                        // IF USERNAME AND PASSWORD ARE CORRECT RETURN 1 ROW
                        $count = $query->num_rows;

                        if ($count == 1) {
                        	// STORE SESSION DATA 		INITIALIZE SESSION TO VARIABLE
                        	$_SESSION['admin_user'] = $row['a_id'];
                        	header("Location: loading.php");
                        }
                        else {
                        	echo '<div class="alert alert-danger fade in">
                                      <p class="text-center">Incorrect Username and Password</p>
                                  </div>';
                        }
                        mysqli_close($conn);
					}
				 ?>
				<div class="panel panel-primary">
  					<div class="panel-heading text-center">
    					<h3 class="panel-title">Login</h3>
  					</div>
  					<div class="panel-body">
    					<form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    						<div class="form-group">
    							<label class="col-xs-4 control-label">Username</label>
    							<div class="col-xs-8">
    								<input class="form-control" type="text" name="username">
    							</div>
    						</div>
    						<div class="form-group">
    							<label class="col-xs-4 control-label">Password</label>
    							<div class="col-xs-8">
    								<input class="form-control" type="password" name="password">
    							</div>
    						</div>
    						<div class="form-group">
    							<div class="col-xs-4">
    								<button class="pull-left btn btn-primary" type="button" onclick="window.location.href = '../index.php'">Back</button>
    							</div>
    							<div class="col-xs-8">
    								<button class="pull-right btn btn-success" type="submit" name="login">Login</button>
    							</div>
    						</div>
    					</form>
  					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-3 col-lg-3"></div>
		</div>
	</div>
	<script type="text/javascript" src="../dist/js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../dist/js/bootstrap.min.js"></script>
</body>
</html>