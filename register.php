<?php
	session_start();
	if(empty($_SESSION['rmsg']))
	{
		$_SESSION['rmsg']="";
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
<form method="POST" action="connectivity-sign-up.php">
<?php
echo $_SESSION['rmsg'];
?>
<td>Name</td><td> <input type="text" name="name"></td>
</tr>
<tr>
<td>Email</td><td> <input type="text" name="email"></td>
</tr>
<tr>
<td>UserName</td><td> <input type="text" name="user"></td>
</tr>
<tr>
<td>Password</td><td> <input type="password" name="pass"></td>
</tr>
<tr>
<td>Confirm Password </td><td><input type="password" name="cpass"></td>
</tr>
<tr>
<td><input id="button" type="submit" name="submit" value="Sign-Up"></td>
</tr>
</form>
</table>
</fieldset>
</div>
</body>
</html>