<!--
Starting Date: 25 Dec 2018
Name: info.php (Classroom Info)
Features:
  1) Jumbotron disappears when screen too small (i.e. when navbar is collapsed)
  2) Cancel navbar freezing (sticking to the top of the screen) when collapsed
  3) Decreases size of "Mingdao International Department" when text-wrapped

-->
<?php
  session_start();
  if (!isset($_GET['room'])) header("location:index.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MDID ConNect</title>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
  <link href="MDB-Free_4/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="styles.css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="bower_components/moment/min/moment.min.js"></script>
  <script type="text/javascript" src="bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

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
        <li><a href="index.php">Home</a></li>
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

<div class="container-fluid main-cont bg-2" >

    <div class="col-sm-2"></div> <!--BLANK-->
    <div class="jumbotron col-sm-8">
      <h1><?=$_GET['room']?></h1>

      <div style="position:relative"><div style="position:absolute; top:78px; left:284px; width: 102px; height: 78px; background-color:rgb(50, 255, 30); padding:20px">G11 DP Philosophy SL</div>
      <table class="table table-bordered">
    <thead>
      <tr>
        <th></th>
        <th>Monday</th>
        <th>Tuesday</th>
        <th>Wednesday</th>
        <th>Thursday</th>
        <th>Friday</th>
        <th>Saturday</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Morning HR Hour</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Block 1</td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td></td>
      </tr>
      <tr>
        <td>Block 2</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Block 3</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Block 4</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Lunch Break</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Block 5</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Block 6</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Block 7</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Block 8</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Block 9</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table></div>


    </div>
  <div class="col-sm-2"></div><!--BLANK-->
</div>

<footer class="container-fluid bg-4 text-center" style="padding-top:30px; padding-bottom:30px">
  <p>Created by Jay Chou.</p>
  <p>Mingdao International Department, Taichung, Taiwan.</p>
</footer>



</body>
</html>