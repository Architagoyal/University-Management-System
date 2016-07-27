<center>
<style>
a:visited {
    color: white;
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
</style>
<form name="ct" id="ctform" method="POST" action="">
<div id="formdiv">
<div id="inputbox">
		<label for="cteach">Teacher</label>
	 <select name="cteach" id="cteach">

	<?php
  	$query = mysqli_query($link,"select teacher_id,teacher_name from teacher");
  	while($res = mysqli_fetch_array($query)){
	?>

	 	<option value="<?php echo $res['dept_id'];?>"><?php echo $res['dept_name'];?></option>
	 	
	 <?php 
	} 
	 ?>
	 	</select>
	 </div><br>

	 <div id = "inputbox">
	 <input type="submit" name="submit2" class="button" value ="submit">
	</div><br>

</form>
</div>
<?php

 if(isset($_POST['submit2']))
 { 
 	$cteach=$_POST['cteach'];
 
$query1 = mysqli_query($link,"update course set c_teach = '".$cteach."' where c_teach = '0' ");
if($query1)
			{
				$msg = "Course Added Succesfully";
				header('refresh:2;url=admin.html');
				
			}
			else
		   {   echo $link->error;
			   $msg = "Query1 did not execute";
		   } 
}
?>
</center>
