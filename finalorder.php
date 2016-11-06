<?php
session_start();
?>
<?php
if(empty($_SESSION['orderID']))
{
	header("Location: index.php");
	exit();
}
?>
<?php
if(empty($_SESSION['userName']))
{
	header("Location: login_for_order.php");
	exit();
}
?>
?>
<?php
require 'mysqlconnect.php';
function updateaddress()
{
	$userName=$_SESSION['userName'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$num =  $_POST['num'];
	$altnum=$_POST['altnum'];
	$address=$_POST['address'];
	$last_orderID=$_SESSION['orderID'];
	$sql="UPDATE history SET address='$address',username = '$userName', name= '$name',email='$email',num='$num',altnum='$altnum' WHERE orderID = '$last_orderID'";
	$data = mysql_query ($sql)or die(mysql_error());
	if($data)
	{		
			 unset($_SESSION['orderID']);
	}
}
if(isset($_POST['SubmitButton']))
{
	updateaddress();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>HOTEL BONAFIDE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="modal.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="hotel_index.css" />
</head>
<body>
<div class="w3-top">
<ul id="navigation">
  <li><a class="active" href="index.php"><img src="logo.gif" id="logo"></a></li>
  <li id="tabs"><a href="#news" >about</a></li>
  <li class="dropdown" >
    <a href="#" class="dropbtn">services</a>
    <div class="dropdown-content">
      <a href="search_menu_home.php">home delivery</a>
      <a href="#">book a table</a>
      <a href="#">party order</a>
    </div>
  </li>
  <li id="tabs"><a href="searchmenu.php" >menu</a></li>
  <?php
  if(empty($_SESSION['userName']))
  {
  echo '<li id="login_register"><a href="register.php">register</a></li>
  <li id="login_register"><a href="login_for_order.php">log in</a></li>';
  }
  else
  {
    echo '  <li class="dropdown" style="float:right" >
    <a href="#" class="dropbtn">account</a>
    <div class="dropdown-content" style="right:160px">
      <a href="tray.php" style="text-align:right">tray</a>
      <a href="account.php" style="text-align:right">account info</a>
      <a href="logout.php" style="text-align:right">logout</a>
    </div>
  </li>';
  }
?>
</ul>
</div>
<h1 style="margin-left:600px;margin-top:150px;">YOUR ORDER HAS BEEN RECORDED</h1>
<p style="margin-left:700px;margin-top:150px;">go to the homepage <a href="index.php">go to the home page</p>
</body>
</html>