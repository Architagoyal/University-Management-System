<html>
<center>
<html>
<?php
include "db_connect.php";
	   $link = connect();
session_start();


?>

<head>

<title>View Students</title>

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
  <h2 id="h2">Students You Are Currently Teaching </h2>
</div>

</body>
</html>

<?php
$query = mysqli_query($link,"select c_id,s_name,c_name,c_sem From stud_info natural join enrolled natural join course where s_id = std_id and c_id = course_id and c_id in
(select course_id From course where c_teach = '".$_SESSION['user_id']."') ");
$row_cnt = mysqli_num_rows($query);
if($row_cnt!=0)
{
echo "
<style>
table{

  color:white;
}
</style>
<table border='1'>
<tr>
<th>Student Name</th>
<th>Course Sem</th>
<th>Course Title</th>
</tr>";
while($res = mysqli_fetch_array($query)){
	echo "<tr>";
  //echo "<td>" . $res['c_id'] . "</td>";
  echo "<td>" . $res['s_name'] . "</td>";
echo "<td>" . $res['c_sem'] . "</td>";
    echo "<td>" . $res['c_name'] . "</td>";
  echo "</tr>";
	}
echo "</table>";
}
else
{
	echo "No Enrolled Students";
}
?>
</font>
</center>
