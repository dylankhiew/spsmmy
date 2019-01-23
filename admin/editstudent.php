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
if(isset($_GET["sid"])){
$query = mysqli_query($conn,"select * from admin where admin_id = $aid")or die(mysqli_error($conn));
$arow = mysqli_fetch_assoc($query);
$sid = $_GET["sid"];
$query = mysqli_query($conn,"select * from student where student_id = '$sid'");
$row = mysqli_fetch_assoc($query);
$suname = $row["student_username"];
 if ($row["student_gender"]==="Male")
		 {$gender="Female";}
	      else $gender="Male";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Student</title>

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
            <span class="login100-form-title p-b-48">
              Edit Student
            </span>
            <div class="limiter">
              <form class="login100-form validate-form" method="POST">

              <span class="input100">
              Username
              <div class="controls">
                <input type="text" name="username" value="<?php echo $row["student_username"];?>" class="form-control" required>
                <p><font size="3">Username can contain any letters or numbers without spaces</font></p>
              </div>
            </span>
            <br></br>
            <br></br>

            <span class="input100">
            Password
            <div class="controls">
              <input type="password" name="password" value="<?php echo $row["student_password"];?>" class="form-control" required>
              <p><font size="3">Password with six or more characters are more secure.</font></p>
            </div>
          </span>
          <br></br>
          <br></br>

          <span class="input100">
          Full Name
          <div class="controls">
            <input type="text" name="name" value="<?php echo $row["student_name"];?>" class="form-control" required>
            <p><font size="3">Please provide student's name as per IC.</font></p>
          </div>
          </span>
          <br></br>
          <br></br>

          <span class="input100">
          Gender
          <div class="controls">
           <select name="gender">
             <option value="Male">Male</option>
             <option value="Female">Female</option>
           </select>
            <p><font size="3">Please select the gender of student.</font></p>
          </div>
          </span>
          <br></br>
          <br></br>

          <span class="input100">
          IC Number
          <div class="controls">
            <input type="text" name="icno" value="<?php echo $row["student_ic"];?>" class="form-control" required>
            <p><font size="3">Please provide student's Identity Card number.</font></p>
          </div>
          </span>
          <br></br>
          <br></br>

          <span class="input100">
          E-mail
          <div class="controls">
            <input type="text" name="email" value="<?php echo $row["student_email"];?>" class="form-control" required>
            <p><font size="3">Please provide student's e-mail address.</font></p>
          </div>
          </span>
          <br></br>
          <br></br>

          <span class="input100">
          Contact Number
          <div class="controls">
            <input type="text" name="tel" value="<?php echo $row["student_contactno"];?>" class="form-control" required>
            <p><font size="3">Please provide student's contact number.</font></p>
          </div>
          </span>
          <br></br>
          <br></br>

          <span class="input100">
          Date of Birth
          <div class="controls">
            <input type="date" name="dateofbirth" value="<?php echo $row["student_birthdate"];?>" class="form-control" required>
            <p><font size="3">Student's date of birth.</font></p>
          </div>
          </span>
          <br></br>
          <br></br>

          <span class="input100">
          Address
          <div class="controls">
            <textarea class="form-control" rows="3" name="add" required><?php echo $row["student_address"];?></textarea>
            <p><font size="3">Please provide student's address.</font></p>
          </div>
          </span>
          <br></br>
          <br></br>
          <br></br>

          <span class="input100">
          Class
          <div class="controls">
            <input type="text" name="class" value="<?php echo $row["student_class"];?>" class="form-control" required>
            <p><font size="3">Please insert class of student based on the code below:<br>
            5S1: 1<br>
            5S2: 2<br>
            5S3: 3
            </font></p>

          </div>
          </span>
          <br></br>
          <br></br>
          <br></br>
          <br></br>
          <br></br>

          <div class="container-login100-form-btn">
            <div style="width:70%" class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" input type="submit" class="btn btn-success" name="sendbtn">Update</button>
            </div>
          </div>

          <div class="container-login100-form-btn">
            <div style="width:70%" class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="login100-form-btn" input type="submit" class="btn btn-success" name="deletebtn">Delete</button>
            </div>
          </div>


        </table>
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

<?php
if (isset($_POST["sendbtn"]))
{
	$suname = $_POST["username"];
	$spass = $_POST["password"];
	$sname = $_POST["name"];
	$sic = $_POST["icno"];
	$sdate = $_POST["dateofbirth"];
	$sgender = $_POST["gender"];
	$scontact = $_POST["tel"];
	$semail = $_POST["email"];
	$saddress = $_POST["add"];

	mysqli_query($conn,"UPDATE student SET student_username='$suname', student_password='$spass', student_name='$sname', student_ic='$sic',student_birthdate='$sdate',student_gender='$sgender', student_contactno='$scontact', student_email='$semail', student_address='$saddress'
	WHERE student_id=$sid");

    header("location: editstudent.php?sid=$sid");
}

if (isset($_POST["deletebtn"]))
{
	mysqli_query($conn,"DELETE FROM student WHERE student_id=$sid");
    header("location: studentlist.php");
}
}
}
?>
