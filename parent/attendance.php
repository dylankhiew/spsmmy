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

    <title>Parent</title>

    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="../navbar-fixed-top.css" rel="stylesheet">
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

  //Google Charts
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawBarChart);
  google.charts.setOnLoadCallback(drawLineChart);

  function drawBarChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Status');
        data.addColumn('number', 'Days');
        data.addRows([
          <?php
          $sql = "SELECT * FROM student where student.student_id = '$pid'";
          $result = mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_assoc($result))
          {
            echo "['Days Present: ".$row['attend']."', ".$row['attend']."],";
            echo "['Days Absent: ".$row['absent']."', ".$row['absent']."],";
          }
          ?>
        ]);

        var options = {title:'',
                       width:700,
                       height:500,
                       is3D:true,
                       slices: {  1: {offset: 0.2, color: "#800020"},
                                  2: {offset: 0.3, color: "#002366"},
                                },
                       fontName: 'Helvetica',
                       fontSize: 17,
                       backgroundColor:'transparent'};

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
      //Test Line Chart
      function drawLineChart() {

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('string', 'Absent');
        data.addColumn('number', 'Present');
        data.addRows([
          <?php
          $sql = "SELECT * FROM student, attendance where attendance.student_id = '$pid' and student.student_id = '$pid'";
          $result = mysqli_query($conn,$sql);
          while ($row = mysqli_fetch_assoc($result))
          {
            echo "['Date: ".$row['attend_status']."', ".$row['attend_date'].",".$row['attend']."],";
          }
          ?>
        ]);

        var options = {
          width:1000,
          height:500,
          title: 'Attendance',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('Anthony_chart_div'));
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
                   <div class="jumbotron" style="opacity: 0.8;border-radius:25px">
                     <div class="container">
                       <div class="row">
                         <div class="col-sm">
                           <?php
                           $sql = "SELECT * FROM student where student.student_id = '$pid'";
                           $result = mysqli_query($conn,$sql);
                           while ($row = mysqli_fetch_assoc($result)) {
                           ?>
                           <center><div class="jumbotron">
                             <span class="input100">
                               <font size="5">
                                 <a>Days Absent:</a>
                                 <a><font size="7"><?php echo$row["absent"];?></font></a>
                               </font>
                             </span>
                           </div></center>
                         </div>
                         <div class="col-sm">
                           <center><div class="jumbotron">
                             <span class="input100">
                               <font size="5">
                                 <a>Days Present:</a>
                                 <a><font size="7"><?php echo$row["attend"];?></font></a>
                               </font>
                             </span>
                           </div></center>
                         </div>
                         <div class="col-sm">
                           <center><div class="jumbotron">
                             <span class="input100">
                               <font size="5">
                                 <a><font size="4">Percentage:</font></a>
                                 <a><font size="7">
                                 <?php
                                 $attendance_percentage = $row["attend"] / ($row["attend"]+$row["absent"]) * 100;
                                 if($attendance_percentage > 85)
                                 {
                                   ?>
                                     <font color="green"><?php echo round ($attendance_percentage);?>%</font>
                                   <?php
                                 }
                                 else if($attendance_percentage >= 80)
                                 {
                                   ?>
                                   <font color="orange"><?php echo round ($attendance_percentage);?>%</font>
                                   <?php
                                 }
                                 else{
                                   ?>
                                   <font color="red"><?php echo round ($attendance_percentage);?>%</font>
                                   <?php
                                 }
                                 ?>
                               </a></font>
                             </span>
                           </div></center>
                         </div>
                       </div>

                       <br></br>
                       <div class="container">
                       <div class="row">
                         <div class="col-sm">
                               <font size="4">
                         					Remarks:<br></br>
                                   <?php
                                   if($attendance_percentage > 85)
                                   {
                                     ?>
                                       <a><font color="green">Your attendance is good. Keep up the good work!
                                         <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                       </font></a>
                                     <?php
                                   }
                                   else if($attendance_percentage >= 80)
                                   {
                                     ?>
                                       <a><font color="orange">
                                         <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                         Your attendance is still sufficient but is almost at threshold. Please be advised to continue attending school or provide Medical Certificate if any problem arises.
                                       </font></a>
                                     <?php
                                   }
                                   else{
                                     ?>
                                     <a><font color="red">
                                       <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                       Your attendance is at a critical level. Please do make sure they attend classes often or consult the teacher for more information.
                                     </font></a>
                                     <?php
                                   }
                                   ?>
                                 </font>
                         </div>
                       </div>
                     </div>
                   </div>
                   </div>

                   <div class="container" style="opacity:0.9">
                       <div class="panel-group" id="accordion">
                         <div class="panel panel-default" style="border-radius:15px" style="opacity: 0.8">
                           <div class="panel-heading" style="border-radius:15px" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                             <h4 class="panel-title">
                               <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><font size="4" >
                                 <i class="fa fa-pie-chart" aria-hidden="true"></i> View Pie Chart</font><br>
                               </a>
                             </h4>
                           </div>

                           <div id="collapse1" class="panel-collapse collapse">
                             <div class="panel-body">
                               <div class="limiter" style="width:100%">
                                     <center><div id="piechart"></div></center>
                                   </div>
                                 </div>
                               </div>
                           </div>

                         <div class="panel panel-default" style="border-radius:15px">
                           <div class="panel-heading" style="border-radius:15px" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                             <h4 class="panel-title">
                               <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><font size="4" >
                                 <i class="fa fa-table" aria-hidden="true"></i> View Attendance History</font><br>
                               </a>
                             </h4>
                           </div>

                           <div id="collapse2" class="panel-collapse collapse">
                             <div class="panel-body">
                               <div class="table-responsive">
                                 <table class="table">
                                 <?php
                                 $sql = "SELECT * FROM student, attendance where attendance.student_id = '$pid' and student.student_id = '$pid' ORDER BY attendance.attend_date DESC";
                                 $result = mysqli_query($conn,$sql);

                                 if($result->num_rows>0)
                                     {
                                       ?>
                                       <thead class="thead-dark">
                                         <tr>
                                             <th><a><font size="4">Date</font></a></td>
                                             <th><a><font size="4">Status</font></a></td>
                                             <th><a><font size="4">Remarks</font></a></td>
                                         </tr>
                                       </thead>

                                       <tbody>
                                       <?php

                                       while($row = mysqli_fetch_assoc($result))
                                       {
                                         if($row["attend_status"]=='Absent')
                                         {
                                           ?>

                                           <tr class="bg-danger">
                                             <td><a style="color:white"><font size="3"><?php echo $row["attend_date"]; ?></font></a></td>
                                             <td><a style="color:white"><font size="3"><?php echo $row["attend_status"]; ?></font></a></td>
                                             <td><a style="color:white"><font size="3"><?php echo $row["attend_remark"]; ?></font></a></td>
                                           </tr>
                                           <?php
                                         }else
                                         {
                                           ?>
                                           <tr class="alttr1">
                                             <td><a><font size="3"><?php echo $row["attend_date"]; ?></font></a></td>
                                             <td><a style="color:green"><font size="3"><?php echo $row["attend_status"]; ?></font></a></td>
                                             <td><a><font size="3"><?php echo $row["attend_remark"]; ?></font></a></td>
                                           </tr>
                                         <?php
                                         }
                                       }
                                       }
                                       else
                                     {echo "No Attendance.";}
                                     ?>
                                   </tbody>
                                 </table>
                               </div>
                             </div>
                         </div>
                       </div>
                       </div>
                   </div>
                 </div>
                <?php
}
                ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php } ?>
