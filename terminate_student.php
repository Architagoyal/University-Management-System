<html>
<center>
<?php
include "db_connect.php";
     $link = connect();
?>
<head>
<title>Terminate student</title>

</head>
<style>
a:visited {
    color: white;
}
.img-circle
{
        border-radius: 50%;
}
label{
display:inline-block;
width:200px;
margin-right:130px;
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

<a><img class="img-circle" src="Images/rem.jpg" width="250" height="200"/></a><br/>

<div id="header">
  <h2 id="h2">Terminate student</h2>
</div><br>

<form name="new_course" id="cform" method="POST" action="">
<div id="formdiv">
   <div id="inputbox">
    <label for="cteach">Student</label>
   <select name="cteach" id="cteach">

  <?php
    $query = mysqli_query($link,"select s_id,s_name from stud_info ");
    while($res = mysqli_fetch_array($query)){
  ?>

    <option value="<?php echo $res['s_id'];?>"><?php echo $res['s_name'];?></option>
    
   <?php 
  } 
   ?>
    </select>
   </div><br>


      </div><br>
   <div id = "inputbox">
   <input type="submit" name="submit" class="button" value ="Remove">
  </div><br>
   </form>
   </div>
	<a href="admin.php">Go Back</a></br>
</body>
</html>



<?php

if(isset($_POST['submit']))
 {
    $cteach = $_POST['cteach'];
	   $query = mysqli_query($link,"select * From stud_info where s_id = '".$cteach."' ");
  		$res = mysqli_fetch_array($query);
  		if($res['s_cred']>75){$status = "PASSED";}else{$status = "FAILED";}
  		$query2 = mysqli_query($link,"Delete From stud_info where s_id = '".$cteach."' ");
  		
  
      $msg = "Student Removed Succesfully";
      echo $msg;
        header('refresh:2;url=admin.php'); 	   
}
?>
</font>
</center>
