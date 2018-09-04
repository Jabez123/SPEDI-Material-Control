<?php 
  include("config.inc/connecting.php"); 
  include("config.inc/creatingdb.php");
  include("config.inc/connect_db.php");
  include("config.inc/createtbl.php");  
?>
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
            <li class="active"><a href="index.php">Dashboard</a></li>
            <li><a href="project_clearance.php">Project Clearance</a></li>
            <li><a href="summary.php">Inventory Summary</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
          	<li><a href="Admin/login.php">Login</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<!-- Dashboard -->
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-md-4 col-lg-4">
			<div class="panel panel-primary text-center">
  				<div class="panel-heading">
    				<h3 class="panel-title">Overall</h3>
  				</div>
  				<div style="font-size: 20px;" class="panel-body">
    				<?php 
                  include("config.inc/connect_db.php");
                  $sql = "SELECT COUNT(i_category) AS total FROM tbl_item";
                  $query = mysqli_query($conn, $sql);
                  $result = mysqli_fetch_assoc($query);
                  echo $result['total'];
             ?>
  				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-4 col-lg-4">
			<div class="panel panel-success text-center">
  				<div class="panel-heading">
    				<h3 class="panel-title">Materials</h3>
  				</div>
  				<div style="font-size: 20px;" class="panel-body">
    				<?php 
                  include("config.inc/connect_db.php");
                  $sql = "SELECT COUNT(i_category) AS total FROM tbl_item WHERE i_category='Materials'";
                  $query = mysqli_query($conn, $sql);
                  $result = mysqli_fetch_assoc($query);
                  echo $result['total'];
             ?>
  				</div>
			</div>
		</div>
    <div class="col-xs-12 col-md-4 col-lg-4">
      <div class="panel panel-info text-center">
          <div class="panel-heading">
            <h3 class="panel-title">Tools and Equipment</h3>
          </div>
          <div style="font-size: 20px;" class="panel-body">
            <?php 
                  include("config.inc/connect_db.php");
                  $sql = "SELECT COUNT(i_category) AS total FROM tbl_item WHERE i_category='Tools and Equipment'";
                  $query = mysqli_query($conn, $sql);
                  $result = mysqli_fetch_assoc($query);
                  echo $result['total'];
             ?>
          </div>
      </div>
    </div>

    <div class="col-xs-12 col-md-12 col-lg-12">
      <div class="panel panel-primary text-center">
          <div class="panel-heading">
            <h3 class="panel-title">Recent Added</h3>
          </div>
          <div class="panel-body">
            <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
              <thead>
                <tr>
                  <th>Item</th>
                  <th>Category</th>
                  <th>Type</th>
                  <th>Description</th>
                  <th>Date Added</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php 
                    include("config.inc/connect_db.php");

                    $sql = "SELECT * FROM tbl_item_temp";

                    $query = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($query)) {
                      $item = $row['it_item'];
                      $category = $row['it_category'];
                      $type = $row['it_type'];
                      $description = $row['it_description'];
                      $date_added = $row['it_date_added'];

                      echo "<td>".$item."</td>";
                      echo "<td>".$category."</td>";
                      echo "<td>".$type."</td>";
                      echo "<td>".$description."</td>";
                      echo "<td>".$date_added."</td>";
                    }
                   ?>
                </tr>
              </tbody>
            </table>
          </div>
      </div>
    </div>
	</div>
</div>
<script type="text/javascript" src="dist/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="dist/js/bootstrap.js"></script>
<script type="text/javascript">
  var textArray = [
    '“All happiness depends on <strong>courage and work</strong>.” ― Honoré de Balzac',
    '“Be <strong>steady and well-ordered in your life</strong> so that you can be fierce and original in your work.” ― Gustave Flaubert',
    '“The best way to not feel hopeless is to <strong>get up and do something</strong>. Don’t wait for good things to happen to you. If you go out and make some good things happen, you will fill the world with hope, you will fill yourself with hope.” ― Barack Obama',
    '“<strong>Get going. Move forward. Aim High. Plan a takeoff</strong>. Dont just sit on the runway and hope someone will come along and push the airplane. It simply wont happen. Change your attitude and gain some altitude. Believe me, you will love it up here.” ― Donald J. Trump',
    'Whether you think you can, or you think you can’t – you’re right. —Henry Ford',
    'Oh yes, the past can hurt. But you can either run from it, or learn from it. —Rafiki, The Lion King',
    'Intelligence is the ability to adapt to change. —Stephen Hawking',
    'If I had nine hours to chop down a tree, I’d spend the first six sharpening my axe. —Abraham Lincoln',
    'Talent wins games, but teamwork and intelligence wins championships. —Michael Jordan',
    ' The only way to achieve the impossible is to believe it is possible. —Charles Kingsleigh, Alice in Wonderland (2010)',
    'Man is only truly great when he acts from the passions; never irresistible but when he appeals to the imagination. —Benjamin Disraeli, Coningsby',
    ' When we strive to become better than we are, everything around us becomes better too. —Paulo Coelho, The Alchemist',
    'We must believe that we are gifted for something and that this thing must be attained. —Marie Curie',
    'Intelligence without ambition is a bird without wings. —Salvador Dali',
    ' If something is wrong, fix it now. But train yourself not to worry, worry fixes nothing. — Ernest Hemingway',
    'Don’t judge each day by the harvest you reap but by the seeds that you plant. —Robert Louis Stevenson',
    ' Life’s like a movie, write your own ending. Keep believing, keep pretending. —Jim Hensen',
    'You have brains in your head. You have feet in your shoes. You can steer yourself any direction you choose. You’re on your own. And you know what you know. And YOU are the one who’ll decide where to go… —Dr. Suess, Oh the Places You’ll Go',
    ' In matters of style, swim with the current; in matters of principle, stand like a rock. — Thomas Jefferson',
    'Do what you do so well that they will want to see it again and again and bring their friend. — Walt Disney',
    'So many things are possible just as long as you don’t know they’re impossible. —Norton Juster, The Phantom Tollbooth',
    'Everything should be made as simple as possible but not simpler. —Albert Einstein',
    'Innovation distinguishes from a leader and a follower. —Steve Jobs',
    ' The moment you doubt whether you can fly, you cease forever to be able to do it. —J.M. Barrie, Peter Pan',
    'The best way out is always through. —Robert Frost',
    'It isn’t the mountains ahead to climb that wear you out; it’s the pebble in your shoe. — Muhammad Ali',
    ' If your actions inspire others to dream more, learn more, do more and become more, you are a leader. —John Quincy Adams',
    ' Don’t go around saying the world owes you a living. The world owes you nothing. It was here first. ―Mark Twain',
    'A proud heart can survive general failure because such a failure does not prick its pride. It is more difficult and more bitter when a man fails alone. —Chinua Achebe, Things Fall Apart',
    'Follow your passion, stay true to yourself, never follow someone else’s path unless you’re in the woods and you’re lost and you see a path then by all means you should follow that. —Ellen Degeneres',
    'It’s easy to solve a problem that everyone sees, but it’s hard to solve a problem that almost no one sees. —Tony Fadell',
    'Learning never exhausts the mind. —Leonardo Da Vinci',
    'If you’re alive, you’re a creative person. —Elizabeth Gilbert',
    'Motivation is the art of getting people to do what you want them to do because they want to do it. —Dwight D. Eisenhower',
    'Failure is the condiment that gives success its flavor. —Truman Capote',
    'An innovator is one who does not know it cannot be done. —R.A. Mashelkar',
    'As long as they are well-intentioned, mistakes are not a matter for shame, but for learning. —Margaret Heffernan',
    'Always remember that you are absolutely unique. Just like everyone else. —Margaret Mead',
    'You can’t change how people treat you or what they say about you. All you can do is change how you react to it. —Mahatma Gandhi',
    'Learn from the mistakes of others. You can’t live long enough to make them all yourselves. —Chanakya',
    'Tough times never last, but tough people do. —Dr. Robert Schuller'
];
var randomNumber = Math.floor(Math.random()*textArray.length);
document.getElementById("quotes").innerHTML = textArray[randomNumber];
</script>
</body>
</html>