<!DOCTYPE html>
<html>
<center>
<head>
  <title>Teacher</title>
</head>
<?php

session_start();
if($_SESSION['login_lev']!=2)
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
  <p>What would you like to do?</p>

<a href="teacher_stud.php">View all students under you</a><br><br>
<a href="teacher_courses.php">View Teaching Courses</a><br><br>
<a href="grade_stud.php">Grade Student</a><br><br>

<a href="logout.php">Logout</a><br><br>

</body>
</center>
