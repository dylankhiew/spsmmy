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
$trow = mysqli_fetch_assoc($query);

if(isset($_GET["sid"]))
{
$sid = $_GET["sid"];
$query = mysqli_query($conn,"select * from student where student_id = '$sid'");
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

    <title>Student Info</title>

    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="../navbar-fixed-top.css" rel="stylesheet">
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


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

    <div class="container">
      <div class="jumbotron" style="background: rgba(0, 0, 0, 0.7); opacity:0.8">
        <span style="text-align: left" class="login100-form-title p-b-48">
          <a><font size="6" color="white"><?php echo $row["student_name"];?></font></a>
        </span>

        <div class="container">

          <div class="panel-group" id="accordion">

            <div class="panel panel-default" style="border-radius:15px">
              <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapse1" style="border-radius:15px">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><font size="4"><i class="fa fa-user" aria-hidden="true"></i> View Student Details</font></a>
                </h4>
              </div>

              <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body" >
                  <div class="limiter">
                    <form class="login100-form validate-form" method="post">
                      <table class="table">
                      <tr>
                  		 <td><span class="input100"><font size="5"><a><i class="fa fa-user" aria-hidden="true"></i> Full Name: </a></font></span></td>
                  		 <td><span class="input100"><font><?php echo $row["student_name"];?></font></span></td>
                      </tr>

                      <tr>
                  		 <td><span class="input100"><font size="5"><a><i class="fa fa-id-card" aria-hidden="true"></i> IC Number: </a></font></span></td>
                  		 <td><span class="input100"><font><?php echo $row["student_ic"];?></font></span></td>
                      </tr>

                      <tr>
                  		 <td><span class="input100"><font size="5"><a><i class="fa fa-birthday-cake" aria-hidden="true"></i> Date of Birth </a></font></span></td>
                  		 <td><span class="input100"><font><?php echo $row["student_birthdate"];?></font></span></td>
                      </tr>

                      <tr>
                  		 <td><span class="input100"><font size="5"><a><i class="fa fa-male" aria-hidden="true"></i><i class="fa fa-female" aria-hidden="true"></i> Gender: </a></font></span></td>
                  		 <td><span class="input100"><font><?php echo $row["student_gender"];?></font></span></td>
                      </tr>

                  	   <tr>
                  	    <td><span class="input100"><font size="5"><a><i class="fa fa-phone" aria-hidden="true"></i> Contact: </a></font></span></td>
                        <td><span class="input100"><font><?php echo $row["student_contactno"];?></font></span></td>
                  	   </tr>

                       <tr>
                  	    <td><span class="input100"><font size="5"><a><i class="fa fa-paper-plane" aria-hidden="true"></i> E-mail: </a></font></span></td>
                        <td><span class="input100"><font><?php echo $row["student_email"];?></font></span></td>
                  	   </tr>

                       <tr>
                  	    <td><span class="input100"><font size="5"><a><i class="fa fa-home" aria-hidden="true"></i> Address: </a></font></span></td>
                        <td><span class="input100"><font><?php echo $row["student_address"];?></font></span></td>
                       </tr>
                     </table>
                     </form>
                      </div>
                    </div>
                  </div>
              </div>

              <div class="panel panel-default" style="border-radius:15px">
                <div class="panel-heading" style="border-radius:15px" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><font size="4"><i class="fa fa-line-chart" aria-hidden="true"></i> View Attendance Record</font></a>
                  </h4>
                </div>

                <div id="collapse2" class="panel-collapse collapse">
                  <div class="panel-body">
                    <div class="limiter">
                      <table class="table">
                      <?php
                      $sql = "SELECT * FROM student, attendance where attendance.student_id = '$sid' and student.student_id = '$sid' ORDER BY attendance.attend_date DESC";
                      $result = mysqli_query($conn,$sql);

                      if($result->num_rows>0)
                          {
                            ?>
                           <tr>
                            <th scope="col"><a><font size="4">Date</font></a></th>
                            <th scope="col"><a><font size="4">Status</font></th>
                            <th scope="col"><a><font size="4">Remarks</font></th>
                            </tr>
                          <?php


                          while($row = mysqli_fetch_assoc($result))
                          {
                            if($row["attend_status"]=='Absent')
                            {
                              ?>
                              <tr class="alttr1">
                              <td><span class="input100"><?php echo $row["attend_date"]; ?></span></td>
                              <td><span class="input100" style="color:red"><?php echo $row["attend_status"]; ?></span></td>
                              <td><span class="input100"><?php echo $row["attend_remark"]; ?></span></td>
                              </tr>
                              <?php
                            }else
                            {
                              ?>
                              <tr class="alttr1">
                              <td><span class="input100"><?php echo $row["attend_date"]; ?></span></td>
                              <td><span class="input100" style="color:green"><?php echo $row["attend_status"]; ?></span></td>
                              <td><span class="input100"><?php echo $row["attend_remark"]; ?></span></td>
                              </tr>
                            <?php
                            }
                          }
                          }
                          else
                          {echo "No Attendance.";}
                          ?>
                    </table>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="panel panel-default" style="border-radius:15px">
                  <div class="panel-heading" style="border-radius:15px" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><font size="4"><i class="fa fa-check-square-o" aria-hidden="true"></i> View Result Slip</font></a>
                    </h4>
                  </div>

                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">
                      <div class="limiter">
                        <table class="table">
                        <?php
                        $sql = "SELECT * FROM marks WHERE marks.student_id='$sid'";
                        $result = mysqli_query($conn,$sql);

                        if($result->num_rows>0)
                            {
                              ?>
                             <tr>
                              <th scope="col"><a><font size="4" color="black">Subject</font></a></th>
                              <th scope="col"><a><font size="4" color="black">Marks</font></th>
                              </tr>

                              <?php
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
                      </div>
                  </div>

          </div>


          </div>
	  </div>
    </div> <!-- /container -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

	<?php

}
}
?>
