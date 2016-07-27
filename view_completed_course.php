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
<font color="white"> <div id="header">
  <h2 id="h2">You Have Completed The Following Courses</h2>
</div>

</body>
</html>

<?php
$query = mysqli_query($link,"select course_id,c_name,c_sem,c_cred,t_marks from course natural join finished where course_id = t_c_id and t_std_id = '".$_SESSION['user_id']."'");
$row_cnt = mysqli_num_rows($query);
		    if($row_cnt!=0)
		    {
echo"
<style>
table{

	color:white;
}
</style>
<table border='1'>
<tr>

<th>Course Title</th>
<th>Course Sem</th>
<th>Course Credits</th>
<th>Marks Obtained</th>
</tr>";
while($res = mysqli_fetch_array($query)){
	echo "<tr>";
  //echo "<td>" . $res['course_id'] . "</td>";
  echo "<td>" . $res['c_name'] . "</td>";
  echo "<td>" . $res['c_sem'] . "</td>";
  echo "<td>" . $res['c_cred'] . "</td>";
  echo "<td>" . $res['t_marks'] . "</td>";
  echo "</tr>";
	}
echo "</table>";
}else{echo "No Completed Course";}
?>
</font>
</center>
