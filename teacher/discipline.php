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

    <title>Disciplinary</title>

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
        	answer = confirm("Mark as solved?");
        	return answer;
        }

        function deleteconfirmation()
        {
          answer = confirm("Archive all previous reports?");
          return answer;
        }

        </script>

    <div class="container" style="opacity:0.9">
    <div class="panel-group" id="accordion">
      <div class="panel panel-default" style="border-radius:10px">

        <div class="panel-heading" style="border-radius:10px" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><font size="4" >
              <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Disciplinary Report</font><br>
            </a>
          </h4>
        </div>

        <div id="collapse1" class="panel-collapse collapse">
          <div class="panel-body">
            <div class="limiter">
                  <form class="login100-form validate-form" method="post">

                    <span class="input100">
                    <a><font size="4">Select Student:</font></a> &nbsp
                      <select name="parent"> <?php
                      $sql = "SELECT * FROM parent WHERE student_name !=''";
                      $result = mysqli_query($conn,$sql);
                      while ($row = mysqli_fetch_assoc($result)) {  ?>
                        <option value="<?php echo $row["parent_name"]; ?>"><?php echo $row["student_name"]; }?></option>
                      </select>
                    </span>
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

      <div class="panel panel-default" style="border-radius:10px 10px 10px 10px">
        <div class="panel-heading" style="border-radius:10px 10px 10px 10px" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><font size="4"><i class="fa fa-bars" aria-hidden="true"></i> View Active Disciplinary Reports</font></a>
          </h4>
        </div>

        <div id="collapse2" class="panel-collapse collapse">
          <div class="panel-body">
            <form class="login100-form validate-form" method="post">
              <?php
              $result=mysqli_query($conn,"SELECT * from parent where report_title !='' ORDER BY report_date DESC");

              if($result->num_rows>0)
              {
              while($row = mysqli_fetch_assoc($result))
              {
                ?>
                <span style="text-align: left">
                  <a><font color="black" size="5"><?php echo $row["report_title"];?></font></a>
                </span>
                <span class="input100"> regarding <?php echo $row["student_name"];?>, posted on <?php echo $row["report_date"];?></span>
                  <p><font size="3.5" color="black"><?php echo $row["report_content"];?></font></p>
                  <br></br>
                  <div class="container" style="outline-style:solid">
                    <?php
                      if ($row["report_reply"] == ''){
                        ?>
                        <p><font size="3.5">No reply yet.</font></p>
                        <?php
                      }else{
                     ?>
                    <p><font size="3.5">Reply from <i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $row["parent_name"];?>: <br></br><?php echo $row["report_reply"] ?></font></p>
                  <?php } ?>
                  </div>
                  <hr class="featurette-divider">
                  <form>

                  <div class="wrap-login100-form-btn">
                      <td><a href = "<?php echo $_SERVER['PHP_SELF'];?>?pid=<?php echo $row['parent_id']; ?>" class="btn btn-success" onclick="return confirmation();"><i class="fa fa-check"></i> Mark as Solved</a></td>
                  </div>
                </form>
              <hr class="featurette-divider">
                  <?php
              }
              }
              else
              {
                ?>
                <a class="text-muted"><font size="5">No reports available.</font></a>
                <?php
              }
                 ?>
            </form>
            </div>
          </div>
      </div>

      <div class="panel panel-default" style="border-radius:10px 10px 10px 10px">
        <div class="panel-heading" style="border-radius:10px 10px 10px 10px" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><font size="4" ><i class="fa fa-archive" aria-hidden="true"></i> Archive</font></a>
          </h4>
        </div>

        <div id="collapse3" class="panel-collapse collapse">
          <div class="panel-body">
            <div class="limiter">
              <form class="login100-form validate-form" method="post">
                <?php
                $result=mysqli_query($conn,"SELECT * from discipline");

                if($result->num_rows>0)
                {
                while($row = mysqli_fetch_assoc($result))
                {
                  ?>
                  <span style="text-align: left">
                    <a><font color="black" size="5"><?php echo $row["report_title"];?></font></a>
                  </span>
                  <span class="input100"> regarding <?php echo $row["student_name"];?>, posted on <?php echo $row["report_date"];?></span>
                    <p><font size="3.5" color="black"><?php echo $row["report_content"];?></font></p>
                    <br></br>
                    <div class="container" style="outline-style:solid">
                      <?php
                        if ($row["report_reply"] == ''){
                          ?>
                          <p><font size="3.5">No reply.</font></p>
                          <?php
                        }else{
                       ?>
                      <p><font size="3.5">Reply from <i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $row["parent_name"];?>: <br></br><?php echo $row["report_reply"] ?></font></p>
                      <?php } ?>                    </div>
                    <br>
                <hr class="featurette-divider">
                    <?php
                }
                }
                else
                {
                  ?>
                  <a class="text-muted"><font size="5">No archive available.</font></a>
                  <?php
                }
                   ?>
              </form>
                </div>
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


if (isset($_POST["sendbtn"]))
{
  $pid=$_POST["parent"];
	header("location: disciplinesend.php?pid=$pid");
}

if (isset($_REQUEST["pid"]))
{
	$pid= $_REQUEST["pid"];
  $actiontake = $_POST["action_taken"];

  mysqli_query($conn,"INSERT INTO discipline (report_title, report_content, report_reply, student_name, parent_name, report_date, parent_id)
                      SELECT report_title, report_content, report_reply, student_name, parent_name, report_date, parent_id
                      FROM parent
                      WHERE parent_id = '$pid'");

	mysqli_query($conn,"UPDATE parent SET report_title='', report_content='',report_reply='' WHERE parent_id = '$pid' ");
	header("Location: discipline.php");
}
}
?>
