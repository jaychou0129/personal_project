<!--
Starting Date: 16 Dec 2018
Name: index.php (Home)
Features:
  1) Jumbotron disappears when screen too small (i.e. when navbar is collapsed)
  2) Cancel navbar freezing (sticking to the top of the screen) when collapsed
  3) Decreases size of "Mingdao International Department" when text-wrapped

-->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>MDID ConNect</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="MDB-Free_4/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles.css?<?=filemtime("style.css")?>">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="MDB-Free_4/js/mdb.min.js"></script>
  <script src="script.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body >
  <div class="jumbotron disappear-when-too-small title" >
      <h1 class="smaller-when-necessary">Mingdao International Department</h1>
  </div>

	<nav class="navbar navbar-inverse sticky-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">ConNect</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="rooms.php">Available Classrooms</a></li>
        <li><a href="reserve.php">Reserve</a></li>
        <li><a href="history.php">My Reservations</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
          if (isset($_SESSION['stuID'])) {
            echo "<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Sign out (".$_SESSION['stuID'].")</a></li>";
          } else {
            echo "<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
          }
        ?>
      </ul>
    </div>
  </nav>

<div class="container-fluid bg-1 text-center main-cont" >
  <div class="col-sm-1"></div>
	<div class="col-sm-10">
		<h1>Top 3 most reserved classrooms</h1>
    <div class="card-deck">
      <div class="card" style="width:300px">
        <div class="fader"></div>
        <div class="card-body">
          <h4 class="card-title">Tie-Mei Hall</h4>
          <p class="card-text">Location: 1nd Floor</p>
          <a href="#" class="btn btn-primary">Check Availability</a>
          <a href="#" class="btn btn-success">Reserve Now</a>
        </div>
      </div>
      <div class="card" style="width:300px">
        <div class="fader"></div>
        <div class="card-body">
          <h4 class="card-title">8-6</h4>
          <p class="card-text">Location: 8th Floor</p>
          <a href="#" class="btn btn-primary">Check Availability</a>
          <a href="#" class="btn btn-success">Reserve Now</a>
        </div>
      </div>
      <div class="card" style="width:300px">
        <div class="fader"></div>
        <div class="card-body">
          <h4 class="card-title">9-1</h4>
          <p class="card-text">Location: 9th Floor</p>
          <a href="#" class="btn btn-primary">Check Availability</a>
          <a href="#" class="btn btn-success">Reserve Now</a>
        </div>
      </div>
    </div>
	</div>
</div>

<div class="container-fluid bg-2 text-center main-cont">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
    
    <h1>About MDID ConNect</h1>
    <br />
    <h4>This is an online system created and hosted by Jay from 1001. Please leave your comments or suggestions below.</h4>
    <div class="md-form">
      <textarea type="text" id="comments" class="md-textarea form-control" rows="3"></textarea>
      <label for="comments">Comments & Suggestions:</label>
    </div>
  </div>
</div>
</body>
</html>