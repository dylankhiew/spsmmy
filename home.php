<?php
include("connect.php");
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>School Portal System for Malaysian</title>

    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="carousel.css" rel="stylesheet">
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
	  <link rel="stylesheet" type="text/css" href="css/util.css">
	  <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!--===============================================================================================-->

  </head>

<body style="background-image: url(../background.jpg);
             background-attachment: fixed;
             background-size: cover;
             padding-top:180px">

  <nav class="navbar navbar-inverse fixed-top" style="background: rgba(0, 0, 0, 0.8)">
    <div id="navbar" class="navbar">
      <ul class="nav navbar-nav" >
        <li><a><font family="Montserrat" size="5"><i class="fa fa-graduation-cap" aria-hidden="true"></i> School Portal System for Malaysian</font></a></li>
      </ul>
    </div>
  </nav>


  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="container">

        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="overflow: hidden; border-radius:25px">
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img class="first-slide" src="slides/slide1.png" alt="First slide">
            </div>
            <div class="item">
              <img class="second-slide" src="slides/slide2.jpg" alt="Second slide">
            </div>
            <div class="item">
              <img class="third-slide" src="slides/slide3.jpg" alt="Third slide">
            </div>
          </div>
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        </div>
      </div>

      <div class="col-md-3">
        <center><div class="container" style="border-radius:25px">
          <br></br>
          <br></br>
          <a class="input100"><font size="2.7">Login as</font></a>
          <a href="teacherlogin.php" class="input100"><font size="5"><i class="fa fa-user-circle" aria-hidden="true"></i> Teacher</font></a>
          <br></br>
          <a href="studentlogin.php" class="input100"><font size="5"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Student</font></a>
          <br></br>
          <a href="parentlogin.php" class="input100"><font size="5"><i class="fa fa-child" aria-hidden="true"></i> Parent</font></a>
          <br></br>
          <br></br>
          <a href="adminlogin.php" class="input100"><font size="2"><i class="fa fa-cog" aria-hidden="true"></i> I'm an Admin</font></a>
        </div></center>
      </div>
    </div>
    </div>
  </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>
