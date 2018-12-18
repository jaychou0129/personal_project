<!--
Starting Date: 16 Dec 2018
Name: rooms.php (Available Rooms)
Features:
  1) Jumbotron disappears when screen too small (i.e. when navbar is collapsed)
  2) Cancel navbar freezing (sticking to the top of the screen) when collapsed
  3) Decreases size of "Mingdao International Department" when text-wrapped

-->
<?php
  session_start();
  if (!isset($_SESSION['stuID'])) {
    echo "<script>alert('You have to sign in first!'); window.location='login.php';</script>";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>

	<title>MDID ConNect</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="jumbotron disappear-when-too-small title" >
			<h1 class="smaller-when-necessary">Mingdao International Department</h1>
		</div>
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ConNect</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="rooms.php">Available Classrooms</a></li>
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

<div class="container main-cont" >
	<h1>This is Available Rooms.</h1>
	<p>created Dec 16th 2018</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p><p>Test</p>
</div>
</body>
</html>