<html>
<center>
<html>
<?php
include "db_connect.php";
	   $link = connect();
session_start();


?>

<head>

<title>View Course</title>
 <style>
a:visited
{

color:white;
  }
  </style>

</head>

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
</style>
<body link="white">
<div id="background">
    <img src="Images/bg2.jpg" class="stretch" alt="" />
</div>
<font color="white"> 
<div id="header">
  <h2 id="h2">All Courses for Your Department </h2>
</div>

</body>
</html>

<?php
$query = mysqli_query($link,"select distinct(c_name),c_sem,c_cred from course natural join course_dep where dep_id = '".$_SESSION['user_dep']."' order by c_sem");

echo "
<style>
table{

	color:white;
}
</style>

<table border='1'>
<tr>
<th>Course Name</th>
<th>Course Sem</th>

<th>Course Credits</th>

</tr>";
while($res = mysqli_fetch_array($query)){
	echo "<tr>";

 // echo "<td>" . $res['course_id'] . "</td>";
  
  echo "<td>" . $res['c_name'] . "</td>";
  echo "<td>" . $res['c_sem'] . "</td>";
  echo "<td>" . $res['c_cred'] . "</td>";
  echo "</tr>";
	}
echo "</table>";
?>
</font>
</center>
