
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
<div style="margin-top: 20px;" class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
      <div class="panel panel-primary text-center ">
        <div class="panel-heading">
          <img src="../img/logo.jpg" width="500" height="120">
        </div>
        <div class="panel-body table-responsive">
          <table class="table table-striped table-condensed table-hover">
            <thead>
              <tr>
                <th class="text-center">Project Name</th>
                <th class="textcenter">Location</th>
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
              <?php 
                include("../config.inc/connect_db.php");
                $token = $_REQUEST['token'];
                $sql = "SELECT * FROM tbl_item WHERE i_projectname='$token'";
                $query = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($query)) {
                      echo "<tr><td>".$row['i_projectname']."</td>
                            <td>".$row['i_location']."</td>
                            <td>".$row['i_item']."</td>
                            <td>".$row['i_description']."</td>
                            <td>".$row['i_unit']."</td>
                            <td>".$row['i_issued']."</td>
                            <td>".$row['i_returned']."</td>
                            <td>".$row['i_transfer_to_qty']."</td>
                            <td>".$row['i_transfer_from_qty']."</td>";
                            if ($row['i_balance'] > 0) {
                              echo "<td class='danger'>".$row['i_balance']."</td>";
                            }
                            elseif ($row['i_balance'] < 0) {
                              echo "<td class='info'>".$row['i_balance']."</td>";
                            }
                            else {
                              echo "<td class='default'>".$row['i_balance']."</td>";
                            }
                }
               ?>
            </tbody>     
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid footer">
  <div class="row">
    <div class="col-xs-4 col-md-3 col-lg-3">
      _____________________  <br>
      <label>Prepared By:</label>
    </div>
    <div class="col-xs-4"></div>
    <div class="col-xs-4"></div>
  </div>
</div>
<script type="text/javascript" src="../dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../dist/js/bootstrap.js"></script>
</body>
</html>