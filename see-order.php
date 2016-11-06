<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>YOUR ORDER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="modal.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="hotel_index.css" />
<link href="registration.css" rel="stylesheet" type="text/css" />
<link href="modal.css" rel="stylesheet" type="text/css" />
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
  <li id="login_register"><a href="#openModal">log in</a></li>';
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
<H1>YOUR ORDER</H1>
</body>
</html>

<?php
require 'mysqlconnect.php';
$order="username-".$_SESSION['userName']." | ";
$order.="             menu-";
if(!empty($_POST['menu'])){
foreach($_POST['menu'] as $selected){
$order.=" ".$selected." | "; 
}
}

$date=$_POST['date-of-delivery'];

$meal=$_POST['meal'];
echo $order;
echo "<br />\n";
echo "<br />\n";
echo "meal of delivery-".$meal;
$query = "INSERT INTO history (datedelivery,meal,address,user_order) VALUES ('$date','$meal','address','$order')";
$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
		$_SESSION['orderID']=mysql_insert_id();
	}
?>
<html>
<body>
  <div id="Sign-Up" style="align:center">
<fieldset style="width:50%">
<h1 style="text-align:center">ENTER YOUR ADDRESS</h1>
<table border="0">
<tr>
<form action="finalorder.php" method="POST">
<td>Name</td><td> <input type="text" name="name"></td>
</tr>
<tr>
<td>Email</td><td> <input type="text" name="email"></td>
</tr>
<tr>
<td>phone number</td><td> <input type="text" name="num"></td>
</tr>
<tr>
<td>alternate number</td><td> <input type="text" name="altnum"></td>
</tr>
<tr>
<td>address </td><td><input type="text" name="address"></td>
</tr>
<tr>
<td><input id="button" type="submit" name="SubmitButton" value="ORDER"></td>
</tr>
</form>
</table>
</fieldset>
</div>
</body>
</html>