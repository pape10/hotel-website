<?php
session_start();
?>
<?php
if(empty($_SESSION['userName']))
{
	header("Location: login_for_order.php");
	exit();
}
?>
<?php
require 'mysqlconnect.php';
$username=$_SESSION['userName'];
 $selectquery = "SELECT * FROM  history WHERE username='$username' ORDER BY orderID DESC";
$sql = mysql_query($selectquery) or die(mysql_error());
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
<table style="width:100%">
<caption><h1>YOUR ORDER HISTORY</h1></caption>
  <tr style="back">
    <th>orderID</th>
    <th>datedelivery</th>
    <th>meal</th>
    <th>address</th>
    <th>user_order</th>
    <th>name</th>
    <th>num</th>
  </tr>
<?php   
while($row = mysql_fetch_array($sql,MYSQL_BOTH)){
	?>
  <tr>
    <th><?php echo $row['orderID']; ?></th>
    <th><?php echo $row['datedelivery']; ?></th>
    <th><?php echo $row['meal']; ?></th>
    <th><?php echo $row['address']; ?></th>
    <th><?php echo $row['user_order']; ?></th>
    <th><?php echo $row['name']; ?></th>
    <th><?php echo $row['num']; ?></th>
  </tr>
<?php }
?>
</table>
</body>
</html>