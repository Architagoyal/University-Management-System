
<html>
<html>
<center>
<?php
include "db_connect.php";
	   $link = connect();
?>
<head>

<title>Add Course</title>

</head>
<style>
a:visited {
    color: white;
}
label{
display:inline-block;
width:200px;
margin-right:30px;
text-align:right;
}

input{

}

fieldset{
border:none;
width:500px;
margin:0px auto;
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
    <img src="Images/bg1.jpg" class="stretch" alt="" />
</div>
<font color="white">
<a title="Add Course"><img src="Images/course.png" width="220" height="180"/></a><br/>	

<div id="header">
  <h2 id="h2">Add Course</h2>
</div>
<fieldset>
<form name="new_course" id="cform" method="POST" action="">
<div id="formdiv" >
	<div id="inputbox">
		<label for="cname">Course Title</label>
     <input type="text" id="cname" name="cname" class="box"  required>
     </div></br>
     <div id="inputbox">
		<label for="csem">Course Semester</label>
     <input type="text" id="csem" name="csem" class="box"  required>
     </div></br>

     <div id="inputbox">
		<label for="ccred">Course Credits</label>
     <input type="text" id="ccred" name="ccred" class="box"  required>
     </div></br>
	 
	 <div id="inputbox">
		<label for="cteach">Course Teacher</label>
	 <select name="cteach" id="cteach">

	<?php
  	$query = mysqli_query($link,"select teacher_id,t_name,dept_name from teacher inner join dept on t_dep = dept_id");
  	while($res = mysqli_fetch_array($query)){
	?>

	 	<option value="<?php echo $res['teacher_id'];?>"><?php echo $res['t_name'],":", $res['dept_name'];?></option>
	 	
	 <?php 
	} 
	 ?>
	 	</select>
	 </div></br>
	 

      <div id="inputbox">
	<label for="cdep">Course Departments</label><br><br>
     
<?php
  $query = mysqli_query($link,"select dept_id,dept_name from dept");
  while($res = mysqli_fetch_array($query)){
								   
?>
<input type="checkbox" name="check_list[]" value="<?php echo $res['dept_id'];?>" ><label><?php echo $res['dept_name'];?></label><br><br>
 <?php 
}
?> 
     </div> </br>
	 <div id = "inputbox">
	 <input type="submit" name="submit" class="button" value ="ADD">
	</div>
   </form>
   </div> </br>
</fieldset>
	<a href="admin.php">Go Back</a></br>
</body>
</html>

<?php

 if(isset($_POST['submit']))
 { $cname = $_POST['cname'];
	$csem = $_POST['csem'];
	$ccred = $_POST['ccred'];
	$cteach = $_POST['cteach'];

    if(preg_match("/^[0-9]+$/",$cname))
    {
		$msg = "Invalid Title"; 
	}
	else if(!preg_match("/^[0-9 ]+$/",$csem))
	{
		$msg = "Invalid Sem"; 
	}
	else if(!preg_match("/^[0-9 ]+$/",$ccred))
	{
		$msg = "Invalid Cred"; 
	}	
   else
   {
	   

	   if($link)
	   {   
		   $query1 = mysqli_query($link,"insert into course (c_name,c_cred,c_sem,c_teach) values('".$cname."','".$ccred."','".$csem."','".$cteach."')");
		   
		   if($query1)
			{
				$msg = "Course Added Succesfully";
				$q2 = mysqli_query($link,"select course_id from course where c_name = '".$cname."' ");
		   		$r = mysqli_fetch_array($q2);
		   		$cid = $r['course_id'];
		   		foreach($_POST['check_list'] as $selected) {
				$q = mysqli_query($link,"insert into course_dep (c_id,dep_id) values('".$cid."','".$selected."')");
				$q2 = mysqli_query($link,"update teacher set salary = salary + ('".$ccred."' * 1000) where teacher_id = '".$cteach."'");
				}
				//header('refresh:2;url=admin.php');
				
				
			}
			else
		   {   echo $link->error;
			 //  $msg = "Query1 did not execute";
		   		$msg = "Unable to add course. Please re-check the particulars!";
		   } 
		}
	   
   }
   if(isset($msg))
   {
	   echo '<div id="msgdiv"><h3>'.$msg.'</h3></div>';
   }
 }

?>
</center>
