<?php
session_start();
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$user=$_POST['user'];
	$pass=$_POST['pass'];
	$cpass=$_POST['cpass'];
	if($pass!=$cpass)
	{
		$_SESSION['rmsg']="pass do not match";
		header('Location:register.php');
		exit(0);
	}
	$sql="SELECT * FROM username WHERE userName='".$user."'";
      $con=mysql_connect('localhost','root','');
      mysql_select_db('hotel',$con);
      $i=mysql_query($sql);
      if($arr=mysql_fetch_array($i))
      {
      		$_SESSION['rmsg']="username already exists";
      		header('Location:register.php');
		exit(0);
	}
	$sql="SELECT * FROM username WHERE email='".$email."'";
      $con=mysql_connect('localhost','root','');
      mysql_select_db('hotel',$con);
      $i=mysql_query($sql);
      if($arr=mysql_fetch_array($i))
      {
      		$_SESSION['rmsg']="email already exists";
      		header('Location:register.php');
		exit(0);
	}
	$query = "INSERT INTO UserName (userName,pass,name,email,status) VALUES ('$user','$pass','$name','$email','disabled')";
	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
		session_start(); 
		$_SESSION['userName'] = $userName;
		header("Location: index.php");
	}
}
