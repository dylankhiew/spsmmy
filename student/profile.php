<?php
include("../connect.php");
ob_start();

$sid = $_SESSION["sid"];
if(!isset($sid))
{
  header("Location: ../studentlogin.php");
}
else
{
$query = mysqli_query($conn,"select * from student where student_id = $sid");
$row = mysqli_fetch_assoc($query);
$attendance_percentage = $row["attend"] / ($row["attend"]+$row["absent"]) * 100;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $row["student_name"];?></title>

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

  <body style="background-image: url(../background1.png);
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
                           <center><a href="attendance.php"><font size= "3"><i class="fa fa-users" aria-hidden="true"></i> Attendance</font></a></center>
                         </div>
                         <div class="col-md">
                           <center><a href="results.php"><font size= "3"><i class="fa fa-paperclip" aria-hidden="true"></i> Results</font></a></center>
                         </div>
                         <div class="col-md">
                           <center><a href="announcementlist.php"><font size= "3"><i class="fa fa-bell" aria-hidden="true"></i> Announcement</font></a></center>
                         </div>
                         <div class="col-md">
                           <center><a href="onlinenotes.php"><font size= "3"><i class="fa fa-file-text" aria-hidden="true"></i> Notes</font></a></center>
                         </div>
                         <div class="col-md-1">
                           <center><a href="profile.php"><font size= "4"><i class="fa fa-user-circle" aria-hidden="true"></i></font></a></center>
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
          <div class="jumbotron" style="background: rgba(0, 0, 0, 0.7);border-radius:25px">
            <span>
              <a><font color="white" size="7">Welcome, <?php echo $row["student_name"];?></font><br>
              <font color="gray" size="4">Today is <?php
              echo date("d M Y");
              ?>,
              <?php echo date("l");?>
            </font></a>
            </span>
            <hr class="featurette-divider">

          <!-- Clock Widget -->
          <br></br>
          <br></br>

          <!-- Details -->
          <div class="limiter">
            <form class="login100-form validate-form" method="post">

              <tr>
              <span class="input100"><font size="5" color="#dcdcdc"><a><i class="fa fa-user" aria-hidden="true"></i> Username: </a></font></span>
              <span class="input100"><font color="#dcdcdc"><?php echo $row["student_username"];?></font></span>
              </tr>

              <tr>
              <span class="input100"><font size="5" color="#dcdcdc"><a><i class="fa fa-id-card" aria-hidden="true"></i> IC Number: </a></font></span>
              <span class="input100"><font color="#dcdcdc"><?php echo $row["student_ic"];?></font></span>
              </tr>

              <tr>
              <span class="input100"><font size="5" color="#dcdcdc"><a><i class="fa fa-birthday-cake" aria-hidden="true"></i> Date of Birth </a></font></span>
              <span class="input100"><font color="#dcdcdc"><?php echo $row["student_birthdate"];?></font></span>
              </tr>

              <tr>
              <span class="input100"><font size="5" color="#dcdcdc"><a><i class="fa fa-male" aria-hidden="true"></i><i class="fa fa-female" aria-hidden="true"></i> Gender: </a></font></span>
              <span class="input100"><font color="#dcdcdc"><?php echo $row["student_gender"];?></font></span>
              </tr>

               <tr>
               <span class="input100"><font size="5" color="#dcdcdc"><a><i class="fa fa-phone" aria-hidden="true"></i> Contact: </a></font></span>
               <input style="width: 50%;" type="text" name="contact" class="form-control" value="<?php echo $row["student_contactno"];?>">
               </tr>
               <br></br>

               <tr>
               <span class="input100"><font size="5" color="#dcdcdc"><a><i class="fa fa-paper-plane" aria-hidden="true"></i> E-mail: </a></font></span>
               <span class="input100">
               <input style="width: 50%;" type="email" name="email" class="form-control"  value="<?php echo $row["student_email"];?>">
               </span>
               </tr>
               <br></br>

               <tr>
               <span class="input100"><font size="5" color="#dcdcdc"><a><i class="fa fa-home" aria-hidden="true"></i> Address: </a></font></span>
               <span class="input100">
               <div class="controls">
                 <textarea style="width: 50%;" class="form-control" rows="3" name="address"  required><?php echo $row["student_address"];?></textarea>
               </div>
               </span>
              </tr>
              <br></br>
              <br></br>
              <div class="container-login100-form-btn">
                <div style="width:50%" class="wrap-login100-form-btn">
                  <div class="login100-form-bgbtn"></div>
                  <button class="login100-form-btn" input type="submit" class="btn btn-success" name="updatebtn">Save Changes</button>
                </div>
              </div>

             </form>
              </div>
          <!-- End of Details -->
          </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php
if (isset($_POST["updatebtn"]))
{
	$scontact = $_POST["contact"];
	$semail = $_POST["email"];
	$saddress = $_POST["address"];

	mysqli_query($conn,"UPDATE student SET student_contactno='$scontact', student_email='$semail', student_address='$saddress'
	WHERE student_id=$sid");
    header("location: profile.php");

}
}
?>
