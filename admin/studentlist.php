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
$query = mysqli_query($conn,"select * from admin where admin_id = $aid")or die(mysqli_error($conn));
$arow = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student List</title>

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
        <span style="text-align: left; float: left;" class="login100-form-title p-b-48">
          Student List
        </span>
        <div class="limiter">
          <a href="addstudent.php" class="btn btn-success" style="float: right;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Student</a>
          <br></br>
          <form method="post" action="">
          <table class="table table-striped">
          <?php
          $result=mysqli_query($conn,"SELECT * from student order by student.student_name");
          if($result->num_rows>0)
          {
          while($row = mysqli_fetch_assoc($result))
          {
            ?>
          <tr>
        <td>
          <span class="input100">
            <font size="4">
            <?php echo $row["student_name"]; ?>
            </font>
            <br>
            <?php echo $row["student_contactno"]; ?>
            </br>
          </span>
        </td>
        <td style="float: right"><?php echo '<a href="editstudent.php?sid='.$row['student_id'].'" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>EDIT</a>'; ?></td>
        </tr>
      <?php
      }
          }
          else
          {echo "No student created.";}
            ?>
            </table>
           </form>
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

<?php } ?>
