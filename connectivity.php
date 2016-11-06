<?php
require 'mysqlconnect.php';
/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/
function SignIn()
{
session_start();   //starting the session for user profile page
if(!empty($_POST['username']))   //checking the 'user' name which is from Sign-In.html, is it empty or have some text
{
	$query = mysql_query("SELECT *  FROM UserName where userName = '$_POST[username]' AND pass = '$_POST[password]'") or die(mysql_error());
	$row = mysql_fetch_array($query) or die(mysql_error());
	if(!empty($row['userName']) AND !empty($row['pass']))
	{
		$_SESSION['userName'] = $row['userName'];
		header("Location: index.php");
	}
	else
	{

		header("Location: login_for_order.php");
	}
}
}
if(isset($_POST['submit']))
{
	SignIn();
}
?>