<?php
include("../connect.php");
ob_start();

$query = mysqli_query($conn,"SELECT * from parent");
$row = mysqli_fetch_assoc($query);
$pid = $_SESSION["pid"];
if(!isset($pid))
{
  header("Location: ../parentlogin.php");
}
else
{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Results</title>

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
                           <center><a href="discipline.php"><font size= "3"><i class="fa fa-ban" aria-hidden="true"></i> Disciplinary</font></a></center>
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
            <div class="jumbotron" style="border-radius:25px">
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <td><a><font size="4">Subject</font></a></td>
                    <td><a><font size="4">Marks</font></a></td>
                  </tr>
                </thead>
              <?php
              $sql = "SELECT * FROM marks WHERE marks.student_id='$pid'";
              $result = mysqli_query($conn,$sql);

              if($result->num_rows>0)
                  {

                    while($row = mysqli_fetch_assoc($result))
                    {
                      ?>
                      <tr class="alttr1">
                      <td><a><font size="4">Bahasa Malaysia</font></a></td>
                      <td><span class="input100"><?php echo $row["bahasa_malaysia"]; ?></span></td>
                      </tr>
                      <tr class="alttr1">
                        <td><a><font size="4">English</font></a></td>
                      <td><span class="input100"><?php echo $row["english"]; ?></span></td>
                      </tr>
                      <tr class="alttr1">
                        <td><a><font size="4">Sejarah</font></a></td>
                      <td><span class="input100"><?php echo $row["sejarah"]; ?></span></td>
                      </tr>
                      <tr class="alttr1">
                        <td><a><font size="4">Additional Mathematics</font></a></td>
                      <td><span class="input100"><?php echo $row["add_maths"]; ?></span></td>
                      </tr>
                      <tr class="alttr1">
                        <?php
                        if ($row["pend_moral"] !== 'NULL'){
                         ?>
                         <td><a><font size="4">Pendidikan Moral</font></a></td>
                      <td><span class="input100"><?php echo $row["pend_moral"]; ?></span></td>
                      </tr>
                      <?php
                    }else{
                      ?>
                      <td><a><font size="4">Pendidikan Islam</font></a></td>
                      <td><span class="input100"><?php echo $row["pend_islam"]; ?></span></td>
                      <?php
                    }
                    }
                  }else
                  {echo "No Results.";}
                  ?>
            </table>
                </div>
      					</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<?php } ?>
