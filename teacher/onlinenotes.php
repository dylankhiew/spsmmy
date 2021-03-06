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

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Notes</title>

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
               
<script>
function confirmation()
{
	answer = confirm("Are you sure you want to delete this?");
	return answer;
}
</script>
    <div class="container">

      <div class="jumbotron" style="background: rgba(0, 0, 0, 0.7);border-radius:25px">
        <form class="login100-form validate-form" method="post">
          <div class="container">
            <div class="row">
              <div class="col-sm-8">
                <span style="text-align: left" class="login100-form-title p-b-48">
                  <a><font size="7" color="white">Online Notes</font></a><br>
                </span>
              </div>

              <div class="col-sm-4">
                <center><a href="addnotes.php" class="btn btn-success" style="border-radius:25px" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Upload Notes</a></center>
              </div>
            </div>
          </div>
          <br></br>
          <?php
          $result=mysqli_query($conn,"SELECT * FROM notes ORDER BY note_id DESC");

          if($result->num_rows>0)
          {
          while($row = mysqli_fetch_assoc($result))
          {
            ?>
            <span style="text-align: left">
              <a><font color="white" size="6"><?php echo $row["subject_name"];?></font></a>
            </span>
            <span class="input100">
            <font color="grey">uploaded on <?php echo $row['upload_date'];?></font>
          </span>
            <span style="text-align: left" class="input100">
                <font size="3" color="white"><?php echo $row["note_remark"];?></font>
            </span>
            <br></br>
            <span class="input100">
            <font color="grey">File Name: <?php echo $row['note_name'];?></font>
            <div class="container-login100-form-btn">
              <div class="wrap-login100-form-btn">
                  <a href="download.php?nid=<?php echo $row['note_id'];?>" class="btn btn-info btn-md"><i class="fa fa-download" aria-hidden="true"></i> Download</a>
                  <td><a href = "<?php echo $_SERVER['PHP_SELF'];?>?nid=<?php echo $row['note_id']; ?>" class="btn btn-danger" onclick="return confirmation();"><i class="fa fa-trash-o fa-lg"></i></a></td>
              </div>
            </div>
            </span>
            <br></br>
            <hr style="background:white" class="featurette-divider">
              <?php
          }
          }
          else
          {
            ?>
            <span class="input100">
            No files uploaded
          </span>

            <?php
          }
             ?>
          </div>
        </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php
if (isset($_REQUEST["nid"]))
{
	$nid= $_REQUEST["nid"];

	mysqli_query($conn,"delete from notes where note_id = '$nid'");
?>
  <script type = "text/javascript">
    alert("Note deleted.");
  </script>
  <?php
}
}
