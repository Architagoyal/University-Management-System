<html>
<head>
<style type="text/css"> 
	<title>Home</title>
</style>
</head>
<style>
a:visited {
    color: white;
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
    -webkit-filter: blur(12px);
    filter: blur(12px);
    -webkit-filter: brightness(200%);
    filter: brightness(200%);
    -webkit-filter: contrast(50%);
    filter: contrast(50%);
}

.stretch {
    width:100%;
    height:100%;
}
</style>
<body link="EEEEEE">
<div id="background">
    <img src="Images/home.jpg" class="stretch" alt="" />
</div>
<center>
<h1>NETAJI SUBHAS TECHNOLOGICAL UNIVERSITY OF DELHI</h1>
<p>Welcome to the online portal of NSTUD. Which action would you like to perform?</p>

<table>
<tr>
	<td>
	<a href="admin_login.php" title="Admin Login"><img class="img-circle" src="Images/Admin.png" width="250" height="200"/></a><br/>
	</td>

	<td>
	<a href="login_student.php" title="Student Login"><img class="img-circle" src="Images/student1.png" width="250" height="200"/></a><br/>
	</td>
</tr>
<tr>
	<td>
	<h2 style="text-indent: 2em;">Admin Login</h2>
	</td>
	<td>
	<h2 style="text-indent: 2em;">Student Login</h2>
	</td>
</tr>
<tr>
	<td>
	<a href="login_teacher.php" title="Teacher Login"><img class="img-circle" src="Images/Teacher.png" width="250" height="200"/></a><br/>
	</td>

	<td>
	<a href="about.php" title="About us"><img class="img-circle" src="Images/info.png" width="250" height="200"/></a><br/>
	</td>
</tr>
<tr>
	<td>
	<h2 style="text-indent: 2em;">Teacher Login</h2>
	</td>
	<td>
	<h2 style="text-indent: 3em;">About Us</h2>
	</td>
</tr>
</font>
</table>
</br>
</center>
</body>
</html>
