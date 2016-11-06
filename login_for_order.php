<?php
session_start();
if(!empty($_SESSION['userName']))
{
   header('Location:index.php');
}
if(empty($_SESSION['msg']))
{
	$_SESSION['msg']="";
}
   if(isset($_POST['submit']))
   {
      $uid=$_POST['username'];
      $pwd=$_POST['password'];
      $sql="SELECT * FROM username WHERE userName='".$uid."' and pass='".$pwd."'";
      $con=mysql_connect('localhost','root','');
      mysql_select_db('hotel',$con);
      $i=mysql_query($sql);
      if($arr=mysql_fetch_array($i))
      {
         if($pwd=$arr['pass']&&$uid=$arr['userName'])
         {
         	unset($_SESSION['msg']);
            $_SESSION['userName']= $arr['userName'];
            header('Location:index.php');
         }
      }
      else
      {
         $_SESSION['msg']="* invalid username or password *";
      }
   }
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Sign-Up</title>
<link href="registration.css" rel="stylesheet" type="text/css" />
<style >
	input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 12px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
</style>
</head>
<body id="body-color">
<div id="Sign-Up" style="align:center">
<fieldset style="width:50%">
<h1 style="text-align:center">SIGN UP</h1>
<table border="0">
<tr>
<form method="POST">
<?php
ECHO $_SESSION['msg'];
?>
<tr>
<td>UserName</td><td> <input type="text" name="username"></td>
</tr>
<tr>
<td>Password</td><td> <input type="password" name="password"></td>
</tr>
<tr>
<td><input id="button" type="submit" name="submit" value="Log-In"></td>
</tr>
</form>
</table>
</fieldset>
</div>
</body>
</html>