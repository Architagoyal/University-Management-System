<html>
<center>
<html>
<?php
include "db_connect.php";
	   $link = connect();
	   session_start();
	   if($_SESSION['login_lev']!='1'){header('Loaction=home.php');}
	   $query = mysqli_query($link,"select * From stud_info where s_id = '".$_SESSION['user_id']."' ");
  		$res = mysqli_fetch_array($query);
  		if($res['s_cred']>75){$status = "PASSED";}else{$status = "FAILED";}
  		$query2 = mysqli_query($link,"Delete From stud_info where s_id = '".$_SESSION['user_id']."' ");
  		$query1 = mysqli_query($link,"insert into alum_info (s_id,s_name,gender,e_id,dob,address,phone,s_dep,status) values('".$res['s_id']."','".$res['s_name']."','".$res['gender']."','".$res['e_id']."','".$res['dob']."','".$res['address']."','".$res['phone']."','".$res['s_dep']."','".$status."')");
	   
?>
<head>
  <title>Thank you</title>
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
a:visited {
    color: white;
}
</style>
<body link="white">
<div id="background">
    <img src="Images/bg2.jpg" class="stretch" alt="" />
</div>
<font color="white"> 
  <a title="Thank You"><img src="Images/ty.png" width="250" height="200"/></a><br/>
  <h1>Thank you</h1>
  <p><?php echo $_SESSION['user_name']; ?> <br> <br> You successfully completed <?php echo $res['s_cred']; ?> credits</p><br><br>
  <a> You <?php echo $status; ?> </a><br><br>
   <a> You may take a screenshot of this page as your Certificate </a><br><br>
	<a href="student.php">Go Back</a></br>
</font>
</body>
</center>
