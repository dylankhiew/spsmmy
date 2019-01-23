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

  if(isset($_GET["cid"]))
  {
  $cid = $_GET["cid"];
  $query = mysqli_query($conn,"select * from marks where class_id = '$cid'");
  $row = mysqli_fetch_assoc($query);
  $dates = date('Y-m-d');
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bahasa Malaysia</title>

    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="../navbar-fixed-top.css" rel="stylesheet">
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Student','Marks', 'Passing Mark'],
          <?php
          $sql = "SELECT * FROM marks,teacher WHERE marks.class_id = '$cid' ORDER BY bahasa_malaysia";
          $result = mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_assoc($result)) {
            echo "[".$row['bahasa_malaysia'].",".$row['bahasa_malaysia'].", 40],";

          }
          ?>
        ]);

        var options = {
          title: 'Student Performance',
          hAxis: {minValue: 0,maxValue:100, title: 'Bahasa Malaysia',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
          width:950,
          height:500,
          crosshair: { trigger: 'both' },
          fontName: 'Roboto',
          selectionMode:'multiple',
          theme: 'maximized'
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

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
      <div class="jumbotron" style="opacity: 0.95;border-radius:25px">
        <span style="text-align: left" class="login100-form-title p-b-48">
          <a><font size="6">Bahasa Malaysia</font></a><br>
        </span>
        <!-- Search -->

        <div class="limiter">
        <!-- Student Results Table-->
                <div class="limiter">
                      <form class="login100-form validate-form" method="post">
                        <table class="table table-bordered">
                          <thead class="thead-dark">
                            <tr>
                              <td><a><font size="4"></font></a></td>
                              <td><a><font size="4">Student Name</font></a></td>
                              <td><a><font size="4">Marks</font></a></td>
                              <td><a><font size="4">Grade</font></a></td>
                            </tr>
                          </thead>
                         <?php
                         $i=0;
                         $result=mysqli_query($conn,"SELECT * from marks where marks.class_id = $cid ORDER BY marks.student_name");

                         if($result->num_rows>0)
                         {
                           while($row = mysqli_fetch_assoc($result))
                           {
                             $i++;
                             if($row["bahasa_malaysia"]>=90)
                             {
                               ?>
                               <tr class="alttr1">
                                 <td><a><font size="4"><?php echo $i;?></font></a></td>
                                 <td><a><font size="4" color="black"><?php echo $row["student_name"]; ?><input type="hidden" name="sid[]" value="<?php echo $row["student_id"]; ?>"></font></a></td>
                                 <td><font size="4"><input class="input100" type="text" name="mark[]" class="form-control"  value="<?php echo $row["bahasa_malaysia"]; ?>" placeholder="No marks"></font></td>
                                 <td><font size="4"><input class="input100" type="text"  class="form-control"  value="A+" readonly></font></td>
                                </tr>
                               <?php
                             }else if($row["bahasa_malaysia"]>=80){
                               ?>
                               <tr class="alttr1">
                                 <td><a><font size="4"><?php echo $i;?></font></a></td>
                                 <td><a><font size="4" color="black"><?php echo $row["student_name"]; ?><input type="hidden" name="sid[]" value="<?php echo $row["student_id"]; ?>"></font></a></td>
                                 <td><font size="4"><input class="input100" type="text" name="mark[]" class="form-control"  value="<?php echo $row["bahasa_malaysia"]; ?>" placeholder="No marks"></font></td>
                                 <td><font size="4"><input class="input100" type="text"  class="form-control"  value="A" readonly></font></td>
                                </tr>
                                <?php
                             }else if($row["bahasa_malaysia"]>=70){
                               ?>
                               <tr class="alttr1">
                                 <td><a><font size="4"><?php echo $i;?></font></a></td>
                                 <td><a><font size="4" color="black"><?php echo $row["student_name"]; ?><input type="hidden" name="sid[]" value="<?php echo $row["student_id"]; ?>"></font></a></td>
                                 <td><font size="4"><input class="input100" type="text" name="mark[]" class="form-control"  value="<?php echo $row["bahasa_malaysia"]; ?>" placeholder="No marks"></font></td>
                                 <td><font size="4"><input class="input100" type="text"  class="form-control"  value="A-" readonly></font></td>
                                </tr>
                                <?php
                             }else if($row["bahasa_malaysia"]>=65){
                               ?>
                               <tr class="alttr1">
                                 <td><a><font size="4"><?php echo $i;?></font></a></td>
                                 <td><a><font size="4" color="black"><?php echo $row["student_name"]; ?><input type="hidden" name="sid[]" value="<?php echo $row["student_id"]; ?>"></font></a></td>
                                 <td><font size="4"><input class="input100" type="text" name="mark[]" class="form-control"  value="<?php echo $row["bahasa_malaysia"]; ?>" placeholder="No marks"></font></td>
                                 <td><font size="4"><input class="input100" type="text"  class="form-control"  value="B+" readonly></font></td>
                                </tr>
                                <?php
                              }else if($row["bahasa_malaysia"]>=60){
                                ?>
                                <tr class="alttr1">
                                  <td><a><font size="4"><?php echo $i;?></font></a></td>
                                  <td><a><font size="4" color="black"><?php echo $row["student_name"]; ?><input type="hidden" name="sid[]" value="<?php echo $row["student_id"]; ?>"></font></a></td>
                                  <td><font size="4"><input class="input100" type="text" name="mark[]" class="form-control"  value="<?php echo $row["bahasa_malaysia"]; ?>" placeholder="No marks"></font></td>
                                  <td><font size="4"><input class="input100" type="text"  class="form-control"  value="B" readonly></font></td>
                                 </tr>
                                 <?php
                               }else if($row["bahasa_malaysia"]>=55){
                                 ?>
                                 <tr class="alttr1">
                                   <td><a><font size="4"><?php echo $i;?></font></a></td>
                                   <td><a><font size="4" color="black"><?php echo $row["student_name"]; ?><input type="hidden" name="sid[]" value="<?php echo $row["student_id"]; ?>"></font></a></td>
                                   <td><font size="4"><input class="input100" type="text" name="mark[]" class="form-control"  value="<?php echo $row["bahasa_malaysia"]; ?>" placeholder="No marks"></font></td>
                                   <td><font size="4"><input class="input100" type="text"  class="form-control"  value="C+" readonly></font></td>
                                  </tr>
                                  <?php
                                }else if($row["bahasa_malaysia"]>=50){
                                  ?>
                                  <tr class="alttr1">
                                    <td><a><font size="4"><?php echo $i;?></font></a></td>
                                    <td><a><font size="4" color="black"><?php echo $row["student_name"]; ?><input type="hidden" name="sid[]" value="<?php echo $row["student_id"]; ?>"></font></a></td>
                                    <td><font size="4"><input class="input100" type="text" name="mark[]" class="form-control"  value="<?php echo $row["bahasa_malaysia"]; ?>" placeholder="No marks"></font></td>
                                    <td><font size="4"><input class="input100" type="text"  class="form-control"  value="C" readonly></font></td>
                                   </tr>
                                   <?php
                                 }else if($row["bahasa_malaysia"]>=45){
                                   ?>
                                   <tr class="alttr1">
                                     <td><a><font size="4"><?php echo $i;?></font></a></td>
                                     <td><a><font size="4" color="black"><?php echo $row["student_name"]; ?><input type="hidden" name="sid[]" value="<?php echo $row["student_id"]; ?>"></font></a></td>
                                     <td><font size="4"><input class="input100" type="text" name="mark[]" class="form-control"  value="<?php echo $row["bahasa_malaysia"]; ?>" placeholder="No marks"></font></td>
                                     <td><font size="4"><input class="input100" type="text"  class="form-control"  value="D" readonly></font></td>
                                    </tr>
                                    <?php
                                  }else if($row["bahasa_malaysia"]>=40){
                                    ?>
                                    <tr class="alttr1">
                                      <td><a><font size="4"><?php echo $i;?></font></a></td>
                                      <td><a><font size="4" color="black"><?php echo $row["student_name"]; ?><input type="hidden" name="sid[]" value="<?php echo $row["student_id"]; ?>"></font></a></td>
                                      <td><font size="4"><input class="input100" type="text" name="mark[]" class="form-control"  value="<?php echo $row["bahasa_malaysia"]; ?>" placeholder="No marks"></font></td>
                                      <td><font size="4"><input class="input100" type="text"  class="form-control"  value="E" readonly></font></td>
                                     </tr>
                                     <?php
                                   }else{
                                     ?>
                                     <tr class="table-danger">
                                       <td><a><font size="4"><?php echo $i;?></font></a></td>
                                       <td><a><font size="4" color="black"><?php echo $row["student_name"]; ?><input type="hidden" name="sid[]" value="<?php echo $row["student_id"]; ?>"></font></a></td>
                                       <td><font size="4"><input class="input100" type="text" name="mark[]" class="form-control"  value="<?php echo $row["bahasa_malaysia"]; ?>" placeholder="No marks"></font></td>
                                       <td><font size="4"><input class="input100" type="text"  class="form-control"  value="G" readonly></font></td>
                                      </tr>
                                      <?php
                                    }
                                  }
                 }
               		?>

                 </table>
                 <div class="container-login100-form-btn">
                   <div style="width:50%" class="wrap-login100-form-btn">
                     <div class="login100-form-bgbtn"></div>
                     <button class="login100-form-btn" input type="submit" class="btn btn-success" name="update">Save Changes</button>
                   </div>
                     <button class="btn btn-dark" style="border-radius: 25px" onclick="myFunction()"><i class="fa fa-print" aria-hidden="true"> <a>PRINT</a></i></button>
                 </div>
                 <br></br>
                 <br></br>
                 <br></br>

                 <div class="limiter">

                   <div class="panel-group" id="accordion">
                     <div class="panel panel-default"style="border-radius:25px;width:100%">
                       <div class="panel-heading"style="border-radius:25px" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                         <h4 class="panel-title">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><font size="3"><i class="fa fa-line-chart" aria-hidden="true"></i> View Chart for this Subject</font></a>
                         </h4>
                       </div>

                       <div id="collapse1" class="panel-collapse collapse">
                         <div class="panel-body">
                           <div class="limiter">
                               <div id="chart_div"></div>
                               </div>
                             </div>
                           </div>

                       </div>
                     </div>
                   </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>

        </div>
        </div>
        <!---->
    <br></br>

	  </div>

    </div> <!-- /container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script>
      function myFunction() {
        window.print();
      }
    </script>

</html>
<?php


//RESULTS
if(isset($_POST["update"]))
{
	$sids =$_POST["sid"];
	$marks =$_POST["mark"];
	foreach($sids as $i => $sid)
  {
  $sid = mysqli_real_escape_string($conn,$sid);
  $mark = mysqli_real_escape_string($conn,$marks[$i]);

  mysqli_query($conn,"UPDATE marks SET bahasa_malaysia = '$mark' WHERE student_id = '$sid'");
    }
	?>
      <script type = "text/javascript">
				alert("Successful updated marks for Bahasa Malaysia.");
			</script>
	<?php
}

}
}



?>
