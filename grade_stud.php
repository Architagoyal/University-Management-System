<html>
<center>
<?php
include "db_connect.php";
	   $link = connect();
	   session_start();
$query1 = mysqli_query($link,"select c_id,s_name,c_name,c_sem From stud_info natural join enrolled natural join course where s_id = std_id and c_id = course_id and c_id in
(select course_id From course where c_teach = '".$_SESSION['user_id']."') ");
$row_cnt1 = mysqli_num_rows($query1);
if($row_cnt1!=0)
{
	   //echo $_SESSION['user_id'];
?>
<head>
<title>Add Teacher</title>

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
  <h2 id="h2">grade student</h2>
</div>
<form name="grade_stud" id="gform" method="POST" action="">
<div id="formdiv">

 <div id="inputbox">
		<label for="crs">Course</label>
	 <select name="crs" id="crs">

	<?php

  	$query = mysqli_query($link,"select course_id,c_name From course where c_teach = '".$_SESSION['user_id']."' ");
  	while($res = mysqli_fetch_array($query)){
	?>

	 	<option value="<?php echo $res['course_id'];?>"><?php echo $res['c_name'];?></option>
	 	
	 <?php 
	} 
	 ?>
	 	</select>
	 </div>

<div id = "inputbox">
	 <input type="submit" name="submit" class="button" value ="submit">
	</div>
   </form>
   </div>
</body>
</html>


<?php

 if(isset($_POST['submit']))
 { 
 	$cid = $_POST['crs'];
 	$_SESSION['cid'] = $cid;
 	?>

<form name="grade_stud" id="gform" method="POST" action="">
<div id="formdiv">

	<div id="inputbox">
		<label for="stud">Student</label>
	 <select name="stud" id="stud">

	<?php
  	$query2 = mysqli_query($link,"select c_id,s_id,s_name,c_name From stud_info natural join enrolled natural join course where s_id = std_id and c_id = course_id and c_id  = '".$cid."' ");
  	while($res2 = mysqli_fetch_array($query2)){
	?>

	 	<option value="<?php echo $res2['s_id'];?>"><?php echo $res2['s_name'];?></option>
	 	
	 <?php 
	} 
	 ?>
	 	</select>
	 </div>

	 
	

	<div id="inputbox">
		<label for="marks">Marks</label>
     <input type="text" id="marks" name="marks" class="box"  required>
     </div>

<div id = "inputbox">
	 <input type="submit" name="submit2" class="button" value ="Grade">
	</div>
   </form>
   </div>
</body>
</html>


 	<?php
}

if(isset($_POST['submit2']))
 {

 	$marks = $_POST['marks'];
	$sid = $_POST['stud'];
	$cid = $_SESSION['cid'];
	//echo $cid;
    if($marks>100||$marks<0)
    {
		$msg = "Invalid marks"; 
	}
  
   else
   {
	   
	   
	   if($link)
	   {   
		   $query3 = mysqli_query($link,"delete from enrolled where std_id = '".$sid."' and c_id = '".$cid."'");
	   		$query4 = mysqli_query($link,"insert into finished (t_std_id,t_c_id,t_marks) values('".$sid."','".$cid."','".$marks."')");
	   		if($marks>40){

	   			$query5 = mysqli_query($link,"select c_cred from course where course_id = '".$cid."'");
	   			$res5=mysqli_fetch_array($query5);
	   			//echo $res5['c_cred'];
	   			$query6 = mysqli_query($link,"update stud_info set s_cred = s_cred + '".$res5['c_cred']."' where s_id = '".$sid."'");
	   			$query7 = mysqli_query($link,"update stud_info set s_sem = floor(s_cred/20)+1 where s_id = '".$sid."'");
	   			//echo $s_sem;
	   			header('Location:teacher.php');
	   		}
   		}
	   
   }
   if(isset($msg))
   {
	   echo '<div id="msgdiv"><h3>'.$msg.'</h3></div>';
   }
 }
}else{ echo "No Enrolled Students";}


?>
</font>
</center>

