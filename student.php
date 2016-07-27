<!DOCTYPE html>
<html>
<center>
<head>
  <title>Student</title>
</head>

<?php
//include 'session_check.php';
session_start();
if($_SESSION['login_lev']!=1)
	{
	header('Location:home.php');
	}
?>
<style>
.img-circle
{
        border-radius: 50%;
}
#background {
    width: 100%; 
    height: 100%; 
    position: fixed; 
    left: 0px; 
    top: 0px; 
    z-index: -1;
}

.stretch {
    width:100%;
    height:100%;
}
a:visited {
    color: white;
}
</style>
<body link="white">
<div id="background">
    <img src="Images/bg2.jpg" class="stretch" alt="" />
</div>
<font color="white">    
<h1>Welcome </h1>
  <p><?php echo $_SESSION['user_name']; ?></p>
  <p>You have successfully completed <?php echo $_SESSION['s_cred']; ?> credits</p>
  <p> You are currently in <?php echo $_SESSION['s_sem']; ?> semester </p> 
  <p>What would you like to do?</p>

<a href="enroll_course.php">Enroll Course</a><br><br>
<a href="view_all_course.php">View All Courses</a><br><br>
<a href="view_enrolled_course.php">View Enrolled Courses</a><br><br>
<a href="view_completed_course.php">View Completed Courses</a><br><br>
<a href="student_quit.php">Quit University (75 credits required to PASS)</a><br><br>
<a href="logout.php">Logout</a><br><br>
</font>
</body>
</center>
