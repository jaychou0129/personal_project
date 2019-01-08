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
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="MDB-Free_4/css/mdb.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="styles.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="script.js"></script>

</head>

<body>
  <script type="text/javascript" src="MDB-Free_4/js/mdb.min.js"></script>


  <div class="jumbotron disappear-when-too-small title" >
      <h1 class="smaller-when-necessary">Mingdao International Department</h1>
  </div>

	<nav class="navbar navbar-inverse sticky-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span> 
        </button>
        <a class="navbar-brand" href="index.php">ConNect</a>
      </div>

      <ul class="nav navbar-nav" id="mainNavbar">
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

<div class="container-fluid bg-1 bg-1-text text-center main-cont" >
  <div class="col-sm-1"></div>
	<div class="col-sm-10">
		<h1><b>Top 3 most reserved classrooms</b></h1>
    <br>
    <div class="card-deck">
      <div class="card" style="width:300px">
        <a href="info.php?room=Tie-Mei Hall"><div class="fader"></div></a>
        <div class="card-body">
          <h4 class="card-title">Tie-Mei Hall</h4>
          <p class="card-text">Location: 1nd Floor</p>
          <a href="info.php?room=Tie-Mei Hall" class="btn btn-primary">Check Availability</a>
          <a href="reserve.php?room=Tie-Mei Hall" class="btn btn-success">Reserve Now</a>
        </div>
      </div>
      <div class="card" style="width:300px">
        <a href="info.php?room=8-6"><div class="fader"></div></a>
        <div class="card-body">
          <h4 class="card-title">8-6</h4>
          <p class="card-text">Location: 8th Floor</p>
          <a href="info.php?room=8-6" class="btn btn-primary">Check Availability</a>
          <a href="reserve.php?room=8-6" class="btn btn-success">Reserve Now</a>
        </div>
      </div>
      <div class="card" style="width:300px">
        <a href="info.php?room=9-1"><div class="fader"></div></a>
        <div class="card-body">
          <h4 class="card-title">9-1</h4>
          <p class="card-text">Location: 9th Floor</p>
          <a href="info.php?room=9-1" class="btn btn-primary">Check Availability</a>
          <a href="reserve.php?room=9-1" class="btn btn-success">Reserve Now</a>
        </div>
      </div>
    </div>
	</div>
</div>

<div class="container-fluid bg-2 bg-2-text text-center main-cont">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
    
    <h1>About MDID ConNect</h1>
    <br />
    <h4 align="left" style="line-height: 30px">This is an online system created and hosted by Jay from 1001 for his MYP Personal Project. The primary purpose of the website is to bridge the distance between students and the school, creating a more convenient process for classroom reservation, and shortening the time needed for both students and teachers to reserve classrooms. Here are some of the services it offers: <br>
    <u>For students and teachers:</u> 
      <ol><li>Check availability of each classroom</li>
        <li>Reserve classrooms</li>
        <li>Check admin's reply on whether reservation is approved (sent via email simultaneously)</li>
      </ol>
    <u>For admin:</u>
      <ol><li>View reservation requests (sent via email simultaneously)</li>
      <li>Approve/Disapprove reservations</li>
    </ol>
    </h4>
  </div>
</div>

<div class="container-fluid bg-3 text-center main-cont">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
    
    <h1>Comments and Feedback</h1>
    <br />
    <h4 align="left" style="line-height: 30px">Please leave your comments or suggestions down below to help improve the website. Any feedback is appreciated!</h4>
    <div class="md-form green-textarea active-green-textarea">
      <textarea type="text" id="comments" class="md-textarea form-control" rows="3"></textarea>
      <label for="comments">Comments & Suggestions:</label>
      <button type="submit" class="btn btn-default submit-btn" style="font-size:13px">Submit</button>
    </div>
  </div>
</div>

<footer class="container-fluid bg-4 text-center" style="padding-top:30px; padding-bottom:30px">
  <p>Created by Jay Chou.</p>
  <p>Mingdao International Department, Taichung, Taiwan.</p>
</footer>
</body>
</html>