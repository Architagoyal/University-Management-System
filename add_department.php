<html>
<center>
<?php
	   include "db_connect.php";
	   $link = connect();
	   ?>
<head>
<title>Add Department</title>

</head>
<style>
a:visited {
    color: white;
}
label{
display:inline-block;
width:200px;
margin-right:65px;
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
<a title="Add Department"><img src="Images/department.jpg" width="250" height="200"/></a><br/>	

<div id="header">
  <h2 id="h2">Add Department</h2>
</div>
     
<form name="new_department" id="depform" method="POST" action="">
<div id="formdiv">
	<div id="inputbox">
		<label for="dname">Name</label>
     <input type="text" id="dname" name="dname" class="box"  required>
     </div>
      </div>
	</br></br>
	  <div id="inputbox">
		<label for="description">Description</label>
	 <input type="text"  id="description" name="description" class="box"  required>
	 </div>
	</br></br>
	 <div id = "inputbox">
	 <input type="submit" name="submit" class="button" value ="ADD">
	</div>
	</br></br>
   </form>
   </div>
	<a href="admin.php">Go Back</a></br>
</body>
</html>

<?php

 if(isset($_POST['submit']))
 { $dname = $_POST['dname'];
	$desc = $_POST['description'];
    if(!preg_match("/^[A-Za-z ]+$/",$dname))
    {
		$msg = "Invalid Name"; 
	}
   else
   {
	   

	   if($link)
	   {   $query = mysqli_query($link,"SELECT * FROM dept WHERE dept_name='".$dname."'");
		    $row_cnt = mysqli_num_rows($query);
		    if($row_cnt==0)
		    {
		   //$query1 = mysqli_query($link,"insert into dept (dept_name,dept_desc) values('".$dname."','".$desc."')");
		    $query1 = mysqli_query($link,"insert into dept values('".$dname."','".$desc."')");
		   
		   if($query1)
			{
				$msg = "Department Added Succesfully";
				header('refresh:2;url=admin.php');
				
			}
			else
		   {   echo $link->error;
			   $msg = "Query did not execute";

		   } 
	   }
	   else
	   {
		   $msg= " already present,Returning to Admin Page";
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
