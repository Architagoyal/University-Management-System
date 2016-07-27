<!DOCTYPE html>
<center>
<?php
//include 'session_check.php';
session_start();
if($_SESSION['login_lev']!='3')
	{
	header('Location:home.php');
	}
//	echo $_SESSION['login_lev'];
?>
<html>
<head>
  <title>Admin</title>
</head>
<style>
a:visited {
    color: white;
}
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
</style>
<body link="EEEEEE">
<div id="background">
    <img src="Images/bkgrnd.jpg" class="stretch" alt="" />
</div>
<font color="white">  
<h1>Welcome Administrator</h1>
  <p>What would you like to do?</p>
<table>
<tr>
	<td>
	<a title="Add Student"> <img class="img-circle" src="Images/admin-icon.png" width="150" height="120"/></a><br/>
	</td>

	<td>
	<a title="Add Department"> <img class="img-circle" src="Images/admin-icon.png" width="150" height="120"/></a><br/>
	</td>
</tr>
<tr>
	<td>
	<a href="add_student.php">Add Student</a>
	</td>
	<td>
	<a href="add_department.php">Add Department</a>
	</td>
</tr>
<tr>
	<td>
	<a title="Add Teacher"> <img class="img-circle" src="Images/admin-icon.png" width="150" height="120"/></a><br/>
	</td>

	<td>
	<a title="Add Course"> <img class="img-circle" src="Images/admin-icon.png" width="150" height="120"/></a><br/>
	</td>
</tr>
<tr>
	<td>
	<a href="add_teacher.php">Add Teacher</a>
	</td>
	<td>
	<a href="add_course.php">Add Course</a>
	</td>
</tr>
<tr>
	<td>
	<a title="Remove Teacher"> <img class="img-circle" src="Images/admin-icon.png" width="150" height="120"/></a><br/>
	</td>

	<td>
	<a title="Remove Student"> <img class="img-circle" src="Images/admin-icon.png" width="150" height="120"/></a><br/>
	</td>
</tr>
<tr>
	<td>
	<a href="terminate_teacher.php">Remove Teacher</a>
	</td>
	<td>
	<a href="terminate_student.php">Remove Student</a>
	</td>
</tr>

</table>

<br><br><a href="logout.php">Logout</a><br><br>

</body>
</center>
