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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MDID ConNect</title>
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" />
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

<div class="container-fluid bg-1 bg-1-text text-center main-cont" >
  <h1><b>Available Classrooms</b></h1>
  <h4>Find your matching classroom with the filters and search bar.</h4>
  <br>
  <div class="col-sm-3 jumbotron" style="color:black; padding-left:10px; padding-right:10px; text-align:left">
    <h3 style="text-align:center">FILTERS</h3>
    <input class="form-control" id="roomsSearchBar" type="text" placeholder="Search.." style="margin-bottom:20px">
    <div class="form-group">
      <label for="floor">Location:</label>
      <select class="form-control" id="roomsFloor" name="floor">
        <option value="all">All</option>
        <option value="1">1F</option>
        <option value="2">2F</option>
        <option value="4">4F</option>
        <option value="5">5F</option>
        <option value="7">7F</option>
        <option value="8">8F</option>
        <option value="9">9F</option>
        <option value="10">10F</option>
      </select>
    </div>

      <div class="form-group">
        <label for="date">Available on:</label>
        <div class="input-group date" id="datepicker">
          <input type='text' class="form-control" id="date" name="date">
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>

        <div class="checkbox">
          <label><input type="checkbox" class="custom-control-input" name="periods" value="m_hrh"> Morning HR Hour</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" class="custom-control-input" name="periods" value="p1"> Block 1</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" class="custom-control-input" name="periods" value="p2"> Block 2</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" class="custom-control-input" name="periods" value="p3"> Block 3</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" class="custom-control-input" name="periods" value="p4"> Block 4</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" class="custom-control-input" name="periods" value="lb"> Lunch Break</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" class="custom-control-input" name="periods" value="p5"> Block 5</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" class="custom-control-input" name="periods" value="p6"> Block 6</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" class="custom-control-input" name="periods" value="p7"> Block 7</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" class="custom-control-input" name="periods" value="p8"> Block 8</label>
        </div>
        <div class="checkbox">
          <label><input type="checkbox" class="custom-control-input" name="periods" value="p9"> Block 9</label>
        </div>
      </div>

  </div>

  <div class="col-sm-9">
    <div class="row" id="rooms-wrapper">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="card" style="width:300px">
          <a href="info.php?room=Tie-Mei Hall"><div class="fader"></div></a>
          <div class="card-body">
            <h4 class="card-title">Tie-Mei Hall</h4>
            <p class="card-text">Location: 1st Floor</p>
            <a href="info.php?room=Tie-Mei Hall" class="btn btn-primary">Check Availability</a>
            <a href="reserve.php?room=Tie-Mei Hall" class="btn btn-success">Reserve Now</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="card" style="width:300px">
          <a href="info.php?room=9-2"><div class="fader"></div></a>
          <div class="card-body">
            <h4 class="card-title">9-2</h4>
            <p class="card-text">Location: 9th Floor</p>
            <a href="info.php?room=9-2" class="btn btn-primary">Check Availability</a>
            <a href="reserve.php?room=9-2" class="btn btn-success">Reserve Now</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
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
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="card" style="width:300px">
          <a href="info.php?room=8-2"><div class="fader"></div></a>
          <div class="card-body">
            <h4 class="card-title">8-2</h4>
            <p class="card-text">Location: 8th Floor</p>
            <a href="info.php?room=8-2" class="btn btn-primary">Check Availability</a>
            <a href="reserve.php?room=8-2" class="btn btn-success">Reserve Now</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="card" style="width:300px">
          <a href="info.php?room=8-3"><div class="fader"></div></a>
          <div class="card-body">
            <h4 class="card-title">8-3</h4>
            <p class="card-text">Location: 8th Floor</p>
            <a href="info.php?room=8-3" class="btn btn-primary">Check Availability</a>
            <a href="reserve.php?room=8-3" class="btn btn-success">Reserve Now</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="card" style="width:300px">
          <a href="info.php?room=9-7"><div class="fader"></div></a>
          <div class="card-body">
            <h4 class="card-title">9-7</h4>
            <p class="card-text">Location: 9th Floor</p>
            <a href="info.php?room=9-7" class="btn btn-primary">Check Availability</a>
            <a href="reserve.php?room=9-7" class="btn btn-success">Reserve Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="container-fluid bg-4 text-center" style="padding-top:30px; padding-bottom:30px">
  <p>Created by Jay Chou.</p>
  <p>Mingdao International Department, Taichung, Taiwan.</p>
</footer>
</body>
</html>