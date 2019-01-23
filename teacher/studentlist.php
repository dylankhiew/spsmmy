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
$query = mysqli_query($conn,"select * from class where class_id = '$cid'");
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

    <title>Attendance Add</title>

    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="../navbar-fixed-top.css" rel="stylesheet">
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      //Google Charts
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawMultSeries);

      function drawMultSeries() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Date');
      data.addColumn('number', 'Present');
      data.addColumn('number', 'Absent');

      data.addRows([
        ['Sun', 0, 0],
        ['Mon', 12, 5],
        ['Tue', 17, 1],
        ['Wed', 18, 0],
        ['Thu', 11, 7],
        ['Fri', 7, 11],
        ['Sat', 0, 0],
      ]);

      var options = {
        width:900,
        height: 700,
        title: 'Attendance of Students for the Week',
        vAxis: {
          title: 'Number of Students'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));
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
      <div class="jumbotron" style="opacity: 0.8;border-radius:25px">
        <span style="text-align: left" class="login100-form-title p-b-48">
          <a><font size="3">Class</font></a><br>
          <a><font size="8"><?php echo $row["class_venue"]; ?></font></a><br>
        </span>
        <!-- Line Chart
        <div class="container">

          <div class="panel-group" id="accordion">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><font size="3" ><i class="fa fa-line-chart" aria-hidden="true"></i> View Chart for this class</font></a>
                </h4>
              </div>

              <div id="collapse1" class="panel-collapse collapse">
                <div class="panel-body">
                  <div class="limiter">
                    <?php
                    $result=mysqli_query($conn,"SELECT count(*) from student,attendance where  attendance.attend_status='Attend'");

                    if($result->num_rows>0)
                    {
                    while($row = mysqli_fetch_assoc($result))
                    {
                      ?>
                      <div id="chart_div"></div>
                      <?php
                    }
                  }
                    ?>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          </div>
        -->
        <!-- Student Attendance Table-->
    <br></br>
	  <form method="post">
    <!--Search -->
    <span class="input100">
      <a><input style="
      width:100%;
      font-size:18px;
      padding: 12px 20px 12px 40px;
      border: 2px solid #ddd;
      border-radius: 25px;
      margin-bottom: 12px;"
      type="text" id="myInput"
      onkeyup="myFunction()"
      placeholder="Search"
      title="Type in a name"></a>
    </span>

    <br></br>
	  <table class="table" id="myTable">
    <?php
		$result=mysqli_query($conn,"SELECT * from student where  student.student_class = $cid ORDER BY student_name");

		if($result->num_rows>0)
		{
		while($row = mysqli_fetch_assoc($result))
		{
		?>
         <tr class="alttr1">
		      <td style="color:black;"><a href="studentinfo.php?sid=<?php echo $row["student_id"];?>" class="input100"><font size="4"><?php echo $row["student_name"]; ?></font></a><input type="hidden" name="sid[]" value="<?php echo $row["student_id"]; ?>"></td>
        </tr>
        <?php
		}
				}
		else
    {
    ?>
    <span class="input100">
      No student in this class.
    </span>
    <?php
    }
		?>
</table>
</form>
	  </div>

    </div> <!-- /container -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script>
    function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
  </body>
</html>
<?php
}
if(isset($_POST["confirm"]))
{
	$sids =$_POST["sid"];
	$attends =$_POST["attendance"];
  $remarks =$_POST["remark"];
	foreach($sids as $i => $sid)
  {
  $sid = mysqli_real_escape_string($conn,$sid);
  $attend = mysqli_real_escape_string($conn,$attends[$i]);
  $date= mysqli_real_escape_string($conn,$dates);
  $sremark = mysqli_real_escape_string($conn,$remarks[$i]);


  mysqli_query($conn,"INSERT INTO attendance
  (class_id,student_id,attend_status,attend_date,attend_remark)
  values ('$cid', '$sid','$attend','$date','$sremark')");

      $sid = mysqli_real_escape_string($conn,$sid);
      if($attends[$i] == 'Attend'){
          mysqli_query($conn,"UPDATE student SET attend = attend + 1 WHERE student.student_id = '$sid'");
          }
          else{
            mysqli_query($conn,"UPDATE student SET absent = absent + 1 WHERE student.student_id = '$sid'")or die(mysqli_error($conn));
          }
    }
	?>
      <script type = "text/javascript">
				alert("Successful adding Attendance  ");
			</script>
	<?php

}

if(isset($_POST["addbtn"]))
{
	$cid=$_POST["class"];
	header("location: attendancecheck.php?cid=$cid");
}

if(isset($_POST["subbtn"]))
{
	$cid=$_POST["class"];
	header("location: results.php?cid=$cid");
}
}
?>
