
<html>
<?php
include "db_connect.php";
	   $link = connect();
session_start();
if($_SESSION['login_lev']!='2')
	{
	header('Location:home.php');
	}
?>

