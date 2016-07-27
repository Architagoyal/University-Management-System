<html>
<html>
<center>
<?php
include "db_connect.php";
	   $link = connect();
session_start();
?>

<html>
<head>
<title>Student</title>

</head>
<style>
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
.img-circle
{
        border-radius: 30%;
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
    <img src="Images/bkgrnd.jpg" class="stretch" alt="" />
</div>
<font color="white">
<a title="Student Login"><img class="img-circle" src="Images/student.jpg" width="250" height="200"/></a><br/>

<div id="header">
  <h2 id="h2">Student login</h2>
</div>
<form name="studentlogin" id="sform" method="POST" action="">
<div id="formdiv">
	<div id="inputbox">
		<label for="se_id">Email</label>
     <input type="text" id="e_id" name="e_id" class="box"  required>
     </div><br>
	 <div id = "inputbox">
	 <input type="submit" name="submit" class="button" value ="Login">
	</div>
   </form>
   </div>
	<a href="home.php">Go Back</a></br>
</body>

</html>

<?php

 if(isset($_POST['submit']))
 { $e_id = $_POST['e_id'];

    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$e_id))
    {
		$msg = "Invalid email"; 
	}
   else
   {
	   

	   if($link)
	   {   $query = mysqli_query($link,"SELECT * FROM stud_info WHERE e_id='".$e_id."'");
			$row_cnt = mysqli_num_rows($query);
		    if($row_cnt>0)
		    {
			$res = mysqli_fetch_array($query);
			$_SESSION['login_lev'] = '1';
			$_SESSION['user_id'] = $res['s_id'];
			$_SESSION['user_sem'] = $res['s_sem'];
			$_SESSION['user_dep']=$res['s_dep'];
			$_SESSION['user_name']=$res['s_name'];
			$_SESSION['s_cred'] = $res['s_cred'];
			$_SESSION['s_sem'] = $res['s_sem'];
			
			//echo $_SESSION['user_name'],$_SESSION['login_lev'];
			$msg = "Login Successful"; 
			header('refresh:1;url=student.php');
		}
		else{
			$msg = "Invalid email"; 
		}
		    
	   }
	  
   }
	   
   }
   if(isset($msg))
   {
	   echo '<div id="msgdiv"><h3>'.$msg.'</h3></div>';
   }
 

?>
</center>
