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
<title>Faculty</title>

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
        border-radius: 45%;
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
<a title="Faculty Login"><img src="Images/faculty.png" width="290" height="180"/></a><br/>

<div id="header">
  <h2 id="h2">Faculty login</h2>
</div>
<form name="studentlogin" id="sform" method="POST" action="">
<div id="formdiv">
	<div id="inputbox">
		<label for="te_id">Email</label>
     <input type="text" id="e_id" name="e_id" class="box"  required>
     </div><br>
     <div id="inputbox">
  <!--   <label for="te_key">key</label>
     <input type="password" class="box" name="password" value="Password" onclick="this.value='';" required/>
     </div>
	 <div id = "inputbox"> -->
	 <input type="submit" name="submit" class="button" value ="Login">
	</div><br>
   </form>
   </div>
	<a href="home.php">Go Back</a></br>
</body>
</html>

<?php

 if(isset($_POST['submit']))
 { $e_id = $_POST['e_id'];
//	$key = $_POST['password'];
//	$keyh = md5($key);

    if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/",$e_id))
    {
		$msg = "Invalid email"; 
	}
   else
   {
	   

	   if($link)
	   {   $query = mysqli_query($link,"SELECT * FROM teacher WHERE e_id='".$e_id."'");
		    if($res = mysqli_fetch_array($query))
		    {
		  /*  if($res['tkey']===$keyh)
		    {*/
		    $_SESSION['login_lev'] = '2';
			$_SESSION['user_id'] = $res['teacher_id'];
			$_SESSION['user_dep']=$res['t_dep'];
			$_SESSION['user_name']=$res['t_name'];
			//echo $_SESSION['user_name'],$_SESSION['login_lev'];
			$msg = "Login Successful"; 
			header('refresh:1;url=teacher.php');}
			else{$msg = "Invalid credentials"; }
		    
			
		}
		// else{
		// 	$msg = "Invalid credentials"; 
		// 	echo $msg;
			
		// }
		    
	   }
	  
   //}
	   
   }
   if(isset($msg))
   {
	   echo '<div id="msgdiv"><h3>'.$msg.'</h3></div>';
   }
 

?>
</center>

