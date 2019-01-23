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

    <title>Student Login</title>

    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

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
	<!--===============================================================================================-->
  </head>

  <body style=" padding-top:180px">

    <nav class="navbar navbar-inverse fixed-top" style="background: rgba(0, 0, 0, 0.8)">
        <div id="navbar" class="navbar">
          <ul class="nav navbar-nav" >
            <li><a href="home.php"><font family="Montserrat" size="5"><i class="fa fa-graduation-cap" aria-hidden="true"></i></font></a></li>
          </ul>
        </div>
      </nav>

    <div class="container">
      <div class="row">
        <div class="col-md">
  			<div class="jumbotron">
				<form class="login100-form validate-form" method="post">
					<span class="login100-form-title p-b-26">
						Student
					</span>

					<span class="login100-form-title p-b-48">
            <img src="logo.png" style="width:80%"/>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Please enter ID">
						<input class="input100" type="text" name="id" style="color:black;" required placeholder="ID" autofocus>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Please enter password">
						<input class="input100" type="password" name="password" input type="password" id="inputPassword" placeholder="Password" required>
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn" style="width:60%">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn" type="submit" name="sendbtn">Login</button>
						</div>
					</div>
					</div>
				</form>
			</div>
		</div>
  </div>
</div>
	</div>

    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php
if (isset($_POST["sendbtn"]))
{
	$suname = $_POST["id"];
	$spass = $_POST["password"];

	$check_user = mysqli_query($conn,"select * from student where student_username = '$suname' and student_password= '$spass'");


	if ($row=mysqli_fetch_assoc($check_user))
	{
		$_SESSION["sid"] = $row["student_id"];
		mysqli_close($conn);
		header("Location: student/attendance.php");
	}
	else
	{
	?>
			<script type = "text/javascript">
				alert("Invalid Username or Password");
			</script>
	<?php
	}
}
?>
