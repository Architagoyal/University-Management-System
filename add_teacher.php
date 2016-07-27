<html>
<center>
<?php
include "db_connect.php";
	   $link = connect();
?>
<head>
<title>Add Teacher</title>

</head>
<style>
label{
display:inline-block;
width:200px;
margin-right:70px;
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
a:visited {
    color: white;
}
</style>
<body link="EEEEEE">
<div id="background">
    <img src="Images/bg1.jpg" class="stretch" alt="" />
</div>
<font color="white">
<a title="Add Teacher"><img src="Images/add_stud.png" width="250" height="200"/></a><br/>
<div id="header">
  <h2 id="h2">Add Teacher</h2>
</div>
<form name="new_teacher" id="tform" method="POST" action="">
<div id="formdiv">
	<div id="inputbox">
		<label for="name">Name</label>
     <input type="text" id="name" name="name" class="box"  required>
     </div><br>
	 <div id="inputbox">
		<label for="dob">Date Of Birth (yyyy-mm-dd)</label>
	 <input type="text"  id="dob" name="dob" class="box"  required>
	 </div><br>
	 
	 <div id="inputbox">
		<label for="eid">E-mail</label>
	 <input type="text"  id="eid" name="e_id" class="box"  required>
	 </div><br>

	 <div id="inputbox">
		<label for="key">Secure Key</label>
	 <input type="text"  id="key" name="key" class="box"  required>
	 </div><br>

 	<div id="inputbox">
		<label for="phone">Mobile#</label>
	 <input type="text"  id="phone" name="phone" class="box"  required>
	 </div><br>
	  <div id="inputbox">
		<label for="address">Address</label>
	 <input type="text"  id="address" name="address" class="box"  required>
	 </div><br>

	 <div id="inputbox">
		<label for="dept">Department</label>
	 <select name="dept" id="dept">

	<?php
  	$query = mysqli_query($link,"select dept_id,dept_name from dept");
  	while($res = mysqli_fetch_array($query)){
	?>

	 	<option value="<?php echo $res['dept_id'];?>"><?php echo $res['dept_name'];?></option>
	 	
	 <?php 
	} 
	 ?>
	 	</select>
	 </div><br>

	 <div id="inputbox">
		<label for="gender">Gender</label>
	 <select name="gender" id="gender">
	 	<option>Male</option>
	 	<option>Female</option>
	 	</select>
	 </div><br>
	 <div id = "inputbox">
	 <input type="submit" name="submit" class="button" value ="ADD">
	</div>
   </form>
   </div>
	<a href="admin.php">Go Back</a></br>
</body>
</html>

<?php

 if(isset($_POST['submit']))
 { $name = $_POST['name'];
	$dob = $_POST['dob'];
	$gender = $_POST['gender'];
   $eid = $_POST['e_id'];
   $phone = $_POST['phone'];
   $address = $_POST['address'];
   $dept = $_POST['dept'];
   $key = $_POST['key'];
   $keyh = md5($key);

    if(!preg_match("/^[A-Za-z ]+$/",$name))
    {
		$msg = "Invalid Name"; 
	}
   else if(!preg_match("/[0-9]{4}\-[0-9]{2}\-[0-9]{2}/",$dob))
   {
	 $msg = "Date of Birth should be in (yyyy-dd-mm)"; 
   } 
   else if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$eid))
   {
	   $msg = "Invalid E-mail Id";
	   echo $eid;
   }
  else if(!preg_match("/[0-9]{10}/",$phone))
   {
	 $msg = "please enter valid 10 digit mobile number"; 
   } 
   else if($phone>10000000000)
   {
	 $msg = "please enter 10 digit mobile number"; 
   } 
   else
   {
	   
	   
	   if($link)
	   {   $query = mysqli_query($link,"SELECT * FROM teacher WHERE e_id='".$eid."'");
		    $row_cnt = mysqli_num_rows($query);
		    if($row_cnt==0)
		    {
		   $query1 = mysqli_query($link,"insert into teacher (t_name,gender,e_id,dob,address,phone,t_dep,tkey) values('".$name."','".$gender."','".$eid."','".$dob."','".$address."','".$phone."','".$dept."','".$keyh."')");
		   
		   if($query1)
			{
				$msg = "Teacher Added Succesfully";
				header('refresh:2;url=admin.php');
				
			}
			else
		   {   echo $link->error;
			   $msg = "Query1 did not execute";
		   } 
	   }
	   else
	   {
		   $msg= "E-mail ID already present,Returning to Admin Page";
		   header('refresh:2;url=admin.php');
		   
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
