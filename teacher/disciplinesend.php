<?php
include("../connect.php");
ob_start();

$tid = $_SESSION["tid"];

if(!isset($tid))
{
header("Location: ../teacherlogin.php");
}
else
{
$query = mysqli_query($conn,"select * from teacher where teacher_id = $tid");
$row = mysqli_fetch_assoc($query);

if(isset($_GET["pid"]))
{
$pid = $_GET["pid"];
$query = mysqli_query($conn,"select * from parent where parent_name = '$pid'");
$row = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Send Disciplinary Report</title>

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
                           <center><a href="attendance.php"><font size= "3"><i class="fa fa-users" aria-hidden="true"></i> Classes</font></a></center>
                         </div>
                         <div class="col-md">
                           <center><a href="announcementlist.php"><font size= "3"><i class="fa fa-bell" aria-hidden="true"></i> Announcement</font></a></center>
                         </div>
                         <div class="col-md">
                           <center><a href="discipline.php"><font size= "3"><i class="fa fa-ban" aria-hidden="true"></i> Disciplinary</font></a></center>
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

    <div class="container" style="opacity: 0.9;">

    <div class="panel-group" id="accordion">

      <div class="panel panel-default" style="border-radius:25px">
        <div class="panel-heading" style="border-radius:25px">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><font size="4" ><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Disciplinary Report</font></a>
          </h4>
        </div>

        <div id="collapse1" class="panel-collapse collapse in">
          <div class="panel-body">
            <div class="limiter">
                  <form class="login100-form validate-form" method="post">

                    <span class="input100">
                    Send to Mr/Mrs: <br>
                    <a><font size="5"><?php echo $pid; ?></font></a> <br> regarding <?php echo $row["student_name"]; ?>
                    </span>
                    <br></br>
                    <br></br>

                    <span class="input100">
                    <a style="border-radius: 20px"><font size="4">Title:</font></a>
                      <input style="border-radius: 20px" type="text" name="report_title" class="form-control"  placeholder="Child Behaving Unusual" required>
                    </span>
                    <br></br>

                    <span class="input100">
                      <a style="border-radius: 20px"><font size="4">Content:</font></a>

                    <textarea style="border-radius: 20px" class="form-control" name="report_content" rows="5" required>Dear Sir/Madam, </textarea>
                    </span>
                    <br></br>
                    <br></br>
                    <br></br>
                    <div class="container-login100-form-btn">
                      <div style="width:50%" class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" input type="submit" class="btn btn-success" name="sendbtn">Send Report</button>
                      </div>
                    </div>

                  </form>
                </div>
              </div>
            </div>
        </div>
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php
}
if (isset($_POST["sendbtn"]))
{
	$reporttitle = $_POST["report_title"];
	$reportcontent= $_POST["report_content"];
  $date = date('d M Y g:iA');

	mysqli_query($conn,"UPDATE parent SET report_title='$reporttitle', report_content='$reportcontent', report_date='$date', report_reply='' where parent_name = '$pid'");
  ?>
  <script type = "text/javascript">
    alert("Report sent.");
  </script>
  <?php
}
}
?>