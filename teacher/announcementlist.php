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

    <title>Announcements</title>

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
                  <a><font color="white">Announcements</font></a><br>
                </span>
              </div>

              <div class="col-sm-4">
                <center><a href="announcementadd.php" class="btn btn-success" style="border-radius:25px" ><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Announcement</a></center>
              </div>
            </div>
          </div>
          <br></br>
      <?php
      $result=mysqli_query($conn,"SELECT * FROM announcement,teacher where announcement.teacher_id = $tid and announcement.teacher_id = teacher.teacher_id order by announce_date DESC");

         if($result->num_rows>0)
         {
         while($row = mysqli_fetch_assoc($result))
         {
           ?>
           <span style="text-align: left">
             <a><font color="white" size="6"><?php echo $row["announce_title"];?></font></a>
             <span class="input100"><font size="3" style="color:#DCDCDC">posted by <i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $row["teacher_name"] ?> on <?php echo $row["announce_date"]; ?></font></span>
           </span>

             <p><font size="4" color="#DCDCDC"><?php echo $row["announce_content"];?></font></p>
             <td><a href="announcementedit.php?acid=<?php echo $row["announce_id"];?>" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></td>
       		   <td><a href = "<?php echo $_SERVER['PHP_SELF'];?>?acid=<?php echo $row['announce_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirmation();"><i class="fa fa-trash-o fa-lg"></i> Delete</a></td>
             <hr style="background:white" class="featurette-divider">

             <?php
         }
         }
         else
         {
           ?>
           <h2 class="text-muted">No announcements. Check back later!</h2>
           <?php
         }
            ?>
     	   </form>
     	  </div>

         </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php
	if(isset($_POST["addbtn"]))
	{
	     $title = $_POST["title"];
		 $content = $_POST["content"];
		 $date = date('Y-m-d');

	mysqli_query($conn,"INSERT INTO announcement
				(teacher_id,announce_title,announce_content,announce_date)
				values ('$tid', '$title','$content','$date')");
?>
      <script type = "text/javascript">
				alert("Announcment posted.");
			</script>

	<?php
	}

  if (isset($_REQUEST["acid"]))
  {
  	$acid= $_REQUEST["acid"];

  	mysqli_query($conn,"delete from announcement where announce_id = '$acid'");
  	header("Location: announcementlist.php");

  }
}
	?>
