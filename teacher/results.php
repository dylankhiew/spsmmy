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

    <title>Examination</title>

    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <link href="../navbar-fixed-top.css" rel="stylesheet">
    <style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Style the buttons */
.btn{
  border: none;
  outline: none;
  padding: 12px 16px;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: black;
  color: white;
}
</style>
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
      <div class="jumbotron" style="border-radius:25px">
        <span style="text-align:left" class="login100-form-title p-b-48">
          <a><font size="6">SPM Trial Marks for <?php echo $row["class_venue"]; ?></font></a><br>
        </span>
        <!-- Search -->

        <div class="row">
          <div class="column" style="width:100%;background-color:#aaa;">
            <a href="bahasamalaysia.php?cid=<?php echo $cid; ?>"><font size="4" color="black"><i class="fa fa-book" aria-hidden="true"></i> Bahasa Malaysia</font></a></br>
          </div>
          <div class="column" style="width:100%;background-color:#aaa;">
            <a href="english.php?cid=<?php echo $cid; ?>"><font size="4" color="black"><i class="fa fa-book" aria-hidden="true"></i> English</font></a>
          </div>
        </div>

        <div class="row">
          <div class="column" style="width:100%;background-color:#bbb;">
            <a href="sejarah.php?cid=<?php echo $cid; ?>"><font size="4" color="black"><i class="fa fa-book" aria-hidden="true"></i> Sejarah</font></a>
          </div>
          <div class="column" style="width:100%;background-color:#bbb;">
            <a href="mathematics.php?cid=<?php echo $cid; ?>"><font size="4" color="black"><i class="fa fa-book" aria-hidden="true"></i> Mathematics</font></a>
          </div>
        </div>

        <div class="row">
          <div class="column" style="width:100%;background-color:#ccc;">
            <a href="addmaths.php?cid=<?php echo $cid; ?>"><font size="4" color="black"><i class="fa fa-book" aria-hidden="true"></i> Additional Mathematics</font></a>
          </div>
          <div class="column" style="width:100%;background-color:#ccc;">
            <a href="pendislam.php?cid=<?php echo $cid; ?>"><font size="4" color="black"><i class="fa fa-book" aria-hidden="true"></i> Pendidikan Islam</font></a>
          </div>
        </div>

        <div class="row">
          <div class="column" style="width:100%;background-color:#ddd;">
            <a href="pendmoral.php?cid=<?php echo $cid; ?>"><font size="4" color="black"><i class="fa fa-book" aria-hidden="true"></i> Pendidikan Moral</font></a>
          </div>
        </div>




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
}
}
?>
