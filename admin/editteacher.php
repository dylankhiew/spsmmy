<?php
include("../connect.php");
ob_start();

$aid = $_SESSION["aid"];
if(!isset($aid))
{
header("Location: ../adminlogin.php");
}
else
{
if(isset($_GET["sid"])){
$query = mysqli_query($conn,"select * from admin where admin_id = $aid")or die(mysqli_error($conn));
$arow = mysqli_fetch_assoc($query);
$sid = $_GET["sid"];
$query = mysqli_query($conn,"select * from teacher where teacher_id = '$sid'");
$row = mysqli_fetch_assoc($query);
$suname = $row["teacher_username"];
 if ($row["teacher_gender"]==="Male")
		 {$gender="Female";}
	      else $gender="Male";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Teacher</title>

    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="../navbar-fixed-top.css" rel="stylesheet">
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<!--===============================================================================================-->
  </head>

  <body style="background-image: url();
               background-attachment: fixed;
               background-size: cover;
               padding-top:100px">

               <nav class="navbar navbar-inverse fixed-top" style="background: rgba(0, 0, 0, 0.5)">
                 <div class="container-fluid">
                   <div class="navbar-header">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                       <span class="icon-bar"></span>
                     </button>
                   </div>
                   <div class="collapse navbar-collapse" id="myNavbar">
                     <div class="container">
                       <div class="row">
                         <div class="col-md">
                           <center><a href="studentlist.php"><font size= "4"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Student</font></a></center>
                         </div>
                         <div class="col-md">
                           <center><a href="teacherlist.php"><font size= "4"><i class="fa fa-user-circle" aria-hidden="true"></i> Teacher</font></a></center>
                         </div>
                         <div class="col-md-1">
                           <center><a href="logout.php"><font size= "4"><i class="fa fa-sign-out" aria-hidden="true"></i></font></a></center>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </nav>

        <div class="container">
          <div class="jumbotron" style="opacity: 0.9; color: black;">
            <span class="login100-form-title p-b-48">
              Edit Teacher
            </span>
            <div class="limiter">
            <table style="margin-bottom:15px;font-size:21px;font-weight:200; width:70%;">

              <form class="login100-form validate-form" method="POST">

              <span class="input100">
              Username
              <div class="controls">
                <input type="text" name="username" value="<?php echo $row["teacher_username"];?>" class="form-control" required>
                <p><font size="3">Username can contain any letters or numbers without spaces</font></p>
              </div>
            </span>
            <br></br>
            <br></br>

            <span class="input100">
            Password
            <div class="controls">
              <input type="password" name="password" value="<?php echo $row["teacher_password"];?>" class="form-control" required>
              <p><font size="3">Password with at least more than six characters are more secure.</font></p>
            </div>
          </span>
          <br></br>
          <br></br>

          <span class="input100">
          Full Name
          <div class="controls">
            <input type="text" name="name" value="<?php echo $row["teacher_name"];?>" class="form-control" required>
          </div>
          </span>
          <br></br>

          <span class="input100">
          Gender
          <div class="controls">
            <select name="gender">
           <option value="Male">Male</option>
           <option value="Female">Female</option>
           </select>
          </div>
          </span>
          <br></br>

          <span class="input100">
          IC Number
          <div class="controls">
            <input type="text" name="icno" value="<?php echo $row["teacher_ic"];?>" class="form-control" required>
          </div>
          </span>
          <br></br>

          <span class="input100">
          E-mail
          <div class="controls">
            <input type="text" name="email" value="<?php echo $row["teacher_email"];?>" class="form-control" required>
          </div>
          </span>
          <br></br>

          <span class="input100">
          Contact Number
          <div class="controls">
            <input type="text" name="tel" value="<?php echo $row["teacher_contactno"];?>" class="form-control" required>
          </div>
          </span>
          <br></br>

          <span class="input100">
          Date of Birth
          <div class="controls">
            <input type="date" name="dateofbirth" value="<?php echo $row["teacher_birthdate"];?>" class="form-control" required>
          </div>
          </span>
          <br></br>

          <span class="input100">
          Address
          <div class="controls">
            <textarea class="form-control" rows="3" name="add" required><?php echo $row["teacher_address"];?></textarea>

          </div>
          </span>
          <br></br>
          <br></br>
          <br></br>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" input type="submit" class="btn btn-success" name="sendbtn">Update</button>
            </div>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" input type="submit" class="btn btn-success" name="deletebtn">Delete</button>
            </div>
          </div>
        </table>
        </div>
        </form>
    	  </div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php
if (isset($_POST["sendbtn"]))
{
	$suname = $_POST["username"];
	$spass = $_POST["password"];
	$sname = $_POST["name"];
	$sic = $_POST["icno"];
	$sdate = $_POST["dateofbirth"];
	$sgender = $_POST["gender"];
	$scontact = $_POST["tel"];
	$semail = $_POST["email"];
	$saddress = $_POST["add"];

	mysqli_query($conn,"UPDATE teacher SET teacher_username='$suname', teacher_password='$spass', teacher_name='$sname', teacher_ic='$sic',teacher_birthdate='$sdate',teacher_gender='$sgender', teacher_contactno='$scontact', teacher_email='$semail', teacher_address='$saddress'
	WHERE teacher_id=$sid");
    header("location: editteacher.php?sid=$sid");
}
if (isset($_POST["deletebtn"]))
{
	mysqli_query($conn,"DELETE FROM teacher WHERE teacher_id=$sid");
  header("location: teacherlist.php");

}
}
}
?>
