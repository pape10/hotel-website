<?php
session_start();
?>
<?php
if(empty($_SESSION('userName')))
{
	header("Location :login_for_order.php");
}
?>
<?php
require 'mysqlconnect.php';
?>
<!DOCTYPE html>
<html>
<title>
  HOTEL BONAFIDE
</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="modal.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="hotel_index.css" />
<link href="js-image-slider.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
 <link href="slider.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" type="text/css" href="tray_table.css" />
 <script src="js-image-slider.js" type="text/javascript"></script>
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
  <li id="tabs"><a href="menu.php" >menu</a></li>
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
<div>

<h1 style="margin-left:700px;margin-top:200px;"><?php
function updateinfo()
{
	$userName=$_SESSION['userName'];
	$name = $_POST['name'];
	$email = $_POST['email'];
$sql="UPDATE username SET name='$name',email = '$email' WHERE userName = '$userName'";
	$data = mysql_query ($sql)or die(mysql_error());
	if($data)
	{		
		$msg="ACCOUNT INFO UPDATED";
	}
	else
	{
		$msg="FAILED TO UPDATE ACCOUNT INFO";
	}
	echo $msg;
}
if(isset($_POST['edited']))
{
	updateinfo();
}
?></h1>
</body>
</html>
