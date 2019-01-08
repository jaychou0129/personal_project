<!--
Starting Date: 16 Dec 2018
Name: login.php (Login)
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
    <div class="jumbotron col-sm-8" >
    <h1>Login</h1>

    <h5 id="info-msg">You've entered the wrong ID or password! Please check again!</h5>
    <form method="POST" action="login.php" id="login-form">
      <div class="form-group">
        <label for="stuID">Student ID:</label>
        <input type="text" class="form-control" id="stuID" name="stuID">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input data-toggle="tooltip" data-placement="bottom" title="Password is your ID number by default!" type="password" class="form-control grey-tooltip" id="pwd" name="pwd">
      </div>
      <button type="submit" class="btn btn-primary bg-1">Login</button>
    </form>
  </div>
  <div class="col-sm-2"></div><!--BLANK-->

</div>

<?php
if (isset($_POST['stuID']) && isset($_POST['pwd'])) {
  $stuID = strip_tags($_POST['stuID']);
  $pwd = strip_tags($_POST['pwd']);

  try {
    include 'db.php';
    $stmt = $db->prepare("SELECT * FROM `users` WHERE `ID` = ? AND `pwd` = ?");
    $stmt->execute(array($stuID, $pwd));
    $row_count = $stmt->rowCount();
    if($row_count == 1) {
      foreach($stmt as $row) {
        $_SESSION['stuID'] = $row['ID'];
        $_SESSION['class'] = $row['class'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['status'] = ($row['class'] == "admin") ? 1 : 0;
      }
      header("location: history.php");
    } else {
      echo "<script type='text/javascript'>$('#info-msg').show();</script>";
    }
  } catch (PDOException $ex) {
    echo $ex->getMessage();
  }
}
/*
if (!isset($_POST['stuID'])){}
else if ($_POST['stuID'] == "71KG05" && $_POST['pwd'] == "asdfghjkl;'") {
   echo "success!!";
   unset($_SESSION['error']);
   $_SESSION['stuID'] = $_POST['stuID'];
   $_SESSION['status'] = 0;
   header("location: history.php");
}
else {
  echo "<script type='text/javascript'>$('#info-msg').show();</script>";
}*/
 ?>

<footer class="container-fluid bg-4 text-center" style="padding-top:30px; padding-bottom:30px">
  <p>Created by Jay Chou.</p>
  <p>Mingdao International Department, Taichung, Taiwan.</p>
</footer>
</body>
</html>