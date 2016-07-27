
<html>
<center>
<html>
<?php
include "db_connect.php";
	   $link = connect();
session_start();
 
  $query = mysqli_query($link,"select distinct(course_id),c_name from course natural join course_dep where c_sem = '".$_SESSION['user_sem']."' and dep_id = '".$_SESSION['user_dep']."' and course_id not in (select c_id from enrolled where std_id = '".$_SESSION['user_id']."' )");
  $row_cnt = mysqli_num_rows($query);
	if(!$row_cnt!=0)
		{
		echo "No available courses .. redirecting ...";
		header('refresh:1;url=student.php');
		}

?>

<head>

<title>Enroll Course</title>

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
<body link="white">
<div id="background">
    <img src="Images/bg2.jpg" class="stretch" alt="" />
</div>
<font color="white">    
<div id="header">
  <h2 id="h2"> Courses to Enroll Into </h2>
</div>
<form name="new_course" id="cform" method="POST" action="">
<div id="formdiv">
	<div id="inputbox">
		<label for="cname">Course Title</label>
     <select name="cname" id="cname">

		<?php
  $query = mysqli_query($link,"select distinct(course_id),c_name from course natural join course_dep where c_sem = '".$_SESSION['user_sem']."' and dep_id = '".$_SESSION['user_dep']."' and course_id not in (select c_id from enrolled where std_id = '".$_SESSION['user_id']."' )");
  $row_cnt = mysqli_num_rows($query);
	if(!$row_cnt!=0)
		{
		echo "No available courses .. redirecting ...";
		}
		else{
  while($res = mysqli_fetch_array($query)){
								   
?>
<option value="<?php echo $res['course_id'];?>"><?php echo $res['c_name'];?></option>


<?php 
} 
?>
</select>
     </div><br>
<div id = "inputbox">
	 <input type="submit" name="submit" class="button" value ="Enroll">
	</div><br>
	<?php 
} 
?>
   </form>
   </div>
</body>
</html>

<?php

 if(isset($_POST['submit']))
 { $cname = $_POST['cname'];

    
	   
	   if($link)
	   {  
		   $query1 = mysqli_query($link,"insert into enrolled (std_id,c_id) values('".$_SESSION['user_id']."','".$cname."')");
		   
		   if($query1)
			{
				$msg = "Course Added Succesfully";
				header('refresh:2;url=student.php');
				
			}
			else
		   {   echo $link->error;
			   $msg = "Query1 did not execute";
		   } 
	   
   
	   
   }
   if(isset($msg))
   {
	   echo '<div id="msgdiv"><h3>'.$msg.'</h3></div>';
   }
 }

?>
</font>
</center>
