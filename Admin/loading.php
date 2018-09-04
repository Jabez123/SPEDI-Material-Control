<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Loading...</title>
	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap-theme.min.css">
</head>
<body>
<div style="padding-top: 250px;" class="row">
	<div class="col-xs-12 col-md-4 col-lg-4"></div>
	<div class="col-xs-12 col-md-4 col-lg-4">
		<h1>Redirecting to Administrator Page...</h1>
		<div class="progress">
			<div class="progress progress-striped active">
  				<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
			</div>
		</div>
	</div>
	<div class="col-xs-4 col-md-4 col-lg-4"></div>
</div>
<script type="text/javascript" src="../dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../dist/js/bootstrap.js"></script>
<script type="text/javascript">
	var progressBar = $('.progress-bar');
var percentVal = 0;

window.setInterval(function(){
  	percentVal += 10;
    progressBar.css("width", percentVal+ '%').attr("aria-valuenow", percentVal+ '%').text(percentVal+ '%'); 
    
    if (percentVal == 100)
    {
    	window.location.href = "index.php";      
    }
    
}, 500);

</script>
</body>
</html>