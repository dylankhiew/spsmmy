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
$query = mysqli_query($conn,"select * from admin where admin_id = $aid")or die(mysqli_error($conn));
$arow = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Teacher</title>

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
          Add Teacher
        </span>

        <div class="limiter">
        <table style="margin-bottom:15px;font-size:21px;font-weight:200; width:70%;">
          <form class="login100-form validate-form" method="POST">

          <span class="input100">
          Username
          <div class="controls">
            <input type="text" name="username" placeholder="e.g. kennywong95" class="form-control" required>
            <p><font size="3">Username can contain any letters or numbers without spaces</font></p>
          </div>
        </span>
        <br></br>
        <br></br>

        <span class="input100">
        Password
        <div class="controls">
          <input type="password" name="password" placeholder="Hardpassword89" class="form-control" required>
          <p><font size="3">Password with at least more than six characters are more secure.</font></p>
        </div>
      </span>
      <br></br>
      <br></br>

      <span class="input100">
      Full Name
      <div class="controls">
        <input type="text" name="name" placeholder="e.g. Kenny Wong Xia Sheng" class="form-control" required>
        <p><font size="3">Please provide teacher's name as per IC.</font></p>
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
        <p><font size="3">Please select the gender of the teacher.</font></p>
      </div>
      </span>
      <br></br>
      <br></br>

      <span class="input100">
      IC Number
      <div class="controls">
        <input type="text" name="icno" placeholder="e.g. 951116-08-5813" class="form-control" required>
        <p><font size="3">Please provide teacher's Identity Card number.</font></p>
      </div>
      </span>
      <br></br>
      <br></br>

      <span class="input100">
      E-mail
      <div class="controls">
        <input type="text" name="email" placeholder="e.g. kennywong@gmail.com" class="form-control" required>
        <p><font size="3">Please provide teacher's e-mail address.</font></p>
      </div>
      </span>
      <br></br>
      <br></br>

      <span class="input100">
      Contact Number
      <div class="controls">
        <input type="text" name="tel" placeholder="e.g. 011-16759150" class="form-control" required>
        <p><font size="3">Please provide teacher's contact number.</font></p>
      </div>
      </span>
      <br></br>
      <br></br>

      <span class="input100">
      Date of Birth
      <div class="controls">
        <input type="date" name="dateofbirth" placeholder="e.g. 11/16/1995" class="form-control" required>
        <p><font size="3">Teacher's date of birth.</font></p>
      </div>
      </span>
      <br></br>
      <br></br>

      <span class="input100">
      Address
      <div class="controls">
        <textarea class="form-control" rows="3" name="add" placeholder="e.g. 3, Taman Tasek Gombak, Taman Pisang, Selangor." required></textarea>
        <p><font size="3">Please provide teacher's address.</font></p>
      </div>
      </span>
      <br></br>
      <br></br>
      <br></br>

      <div class="container-login100-form-btn">
        <div class="wrap-login100-form-btn" style="width:40%">
          <div class="login100-form-bgbtn"></div>
          <button class="login100-form-btn" input type="submit" class="btn btn-success" name="sendbtn">Create</button>
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


 if(isset($_POST["sendbtn"]))
 {
 $tuname = $_POST["username"];
   $tname = $_POST["name"];
 $tpass = $_POST["password"];
 $tgender = $_POST["gender"];
 $tic = $_POST["icno"];
 $tbirthdate = $_POST["dateofbirth"];
 $temail = $_POST["email"];
 $tcontact = $_POST["tel"];
 $taddress = $_POST["add"];

 $check = mysqli_query($conn,"select * from teacher where teacher_username= '$tuname' ");

 if (mysqli_num_rows($check) > 0)
{
   ?>
        <script type = "text/javascript">
       alert("Username already exist!  ");
     </script>
 <?php
}

else
{
       mysqli_query($conn,"INSERT INTO teacher
       (teacher_username,teacher_name,teacher_password,teacher_gender,teacher_ic,teacher_birthdate,teacher_email,teacher_contactno,teacher_address)
       values ('$tuname', '$tname','$tpass','$tgender','$tic','$tbirthdate','$temail','$tcontact','$taddress')");
       ?>
           <script type = "text/javascript">
            alert("Successfuly Created!");
           </script>

 <?php
 }
 }
}
?>
