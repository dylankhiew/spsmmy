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

    <title>Add Notes</title>

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

    <div class="container">
      <div class="jumbotron" style="background: rgba(0, 0, 0, 0.7);">

        <a><font size="6" color="white">Upload Notes</font></a>

	  <form enctype="multipart/form-data" method="post">
      <div style="margin:25px; font-size:25px;">
          <p><font size="4" color="white">Subject:</font>
          <input style="border-radius:15px" type="text" name="subject" class="form-control" placeholder="e.g. Bahasa Malaysia" required></input>
          <br><font size="4" color="white">Remarks:</font> <input class="form-control" style="border-radius:15px" type="text" name="remark" placeholder="Please complete this homework by tomorrow. Thank you."></input></p><br>
          <p><font size="4" color="white">Select your file below (maximum 15MB)</font></p>
          <p><input type="hidden" name="MAX_FILE_SIZE" value="2000000">
            <div class="container" style="position: relative;overflow: hidden;display: inline-block;">
              <button class="btn" style=" border: 2px solid gray;color: gray;background-color: black;padding: 8px 20px;border-radius: 15px;font-size: 20px;font-weight: bold;"><a>Select file</a></button>
              <input style="font-size: 100px;position: absolute;left: 0;top: 0;opacity: 0;"type="file" name="file" />
            </div>
            <br></br>
          <center><button input type="submit" style="border-radius:25px" class="btn btn-success" name="uploadbtn"><i class="fa fa-upload" aria-hidden="true"></i> <a>UPLOAD</a></button></center>
	     </div>
      </form>
      </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php
if(isset($_POST['uploadbtn']) && $_FILES['file']['size'] > 0)
{
  $name = $_FILES['file']['name'];
	$tmpname = $_FILES['file']['tmp_name'];
	$size = $_FILES['file']['size'];
	$type = $_FILES['file']['type'];
	$subject = $_POST["subject"];
	$remark=$_POST["remark"];
  $date = date('d M Y');

  $fp      = fopen($tmpname, 'r');
  $content = fread($fp, filesize($tmpname));
  $content = addslashes($content);
  fclose($fp);

  if(!get_magic_quotes_gpc())
    {
    $name = addslashes($name);
    }


    $query = "INSERT INTO notes (subject_name, note_name, note_remark, note_size, note_type, note_file,upload_date ) ".
    "VALUES ('$subject','$name','$remark', '$size', '$type', '$content','$date')";

    mysqli_query($conn,$query) or die('Error, query failed');

    ?>
    <script type = "text/javascript">
      alert("File uploaded successfully.");
    </script>
    <?php
}
}
?>
