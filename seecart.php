<?php
session_start();
?>
<?php
if(empty($_SESSION['userName']))
{
    header("Location: login_for_order.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>HOTEL BONAFIDE</title>
<style type="text/css">
  #textarea {
    width: 60px;
}
</style>
<link href="food_menu.css" rel="stylesheet" type="text/css" />
<link href="modal.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="search.css" />
</head>
<body>
<ul id="navbar">
  <li><a class="active" href="index.php"><img src="logo.gif" id="logo"></a></li>
  <li id="tabs"><a href="#news">about</a></li>
  <li class="dropdown" >
    <a href="#" class="dropbtn">services</a>
    <div class="dropdown-content">
      <a href="search_menu_home.php">home delivery</a>
      <a href="#">book a table</a>
      <a href="#">order for party</a>
    </div>
  </li>
  <li id="tabs"><a href="searchmenu.php" >menu</a></li>
  <?php
  if(!empty($_SESSION['userName']))
  {
echo '<li class="dropdown" style="float:right" >
    <a href="#" class="dropbtn">account</a>
    <div class="dropdown-content" style="right:160px">
      <a href="tray.php" style="text-align:right">tray</a>
      <a href="account.php" style="text-align:right">account info</a>
      <a href="logout.php" style="text-align:right">logout</a>
    </div>
  </li>';
  echo '<li id="tabs" style="float:right"><a href="seecart.php">cart</a></li>';
}
  else
  {
    echo '<li id="tabs" style="float:right"><a href="register.php">register</a></li>
  <li id="tabs" style="float:right"><a href="login_for_order.php">log in</a></li>';
  }
  ?>
</ul>
<H1 style="margin-left:750px;">ON CART</H1>
<?php
require 'mysqlconnect.php';
?>
<?php
if(!EMPTY($_SESSION['cart_item']))
{
	foreach ($_SESSION['cart_item'] as $key => $value) {
		# code...
		foreach ($value as $k => $v) {
			$m=$v['menuID'];
			$selectquery = "SELECT * FROM  menu WHERE menuID='$m'";
}
$sql = mysql_query($selectquery) or die(mysql_error());   
while($row = mysql_fetch_array($sql,MYSQL_BOTH)){
?>
<form method="POST" action="changeincart.php?menuID=<?php echo $row['menuID']; ?>">
<div class="responsive">
  <div class="img">
    <a target="_blank" href="individual_menu.php?menuID=<?php echo $row['menuID']?>">
      <img src="<?php echo $row['imagespath1'];?>" alt="<?php echo $row['itemname']; ?>" width="300" height="200">
    </a>
    <div class="desc"><?php echo $row['itemname']?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $row['price']?> &nbsp; &nbsp; 
   <label for="textarea" style="margin-left:100px">QTY:</label> <input type="text" name="qty" value="<?php echo $v['qty']; ?>" id="textarea" ><br>
   <input type="submit" name="removecart" value="remove">
   <input type="submit" name="updatecart" value="update" style="float:right"><br>
  </div>
</div>
</div>
</form>
<?php }
}
}

else
{
	echo "YOU HAVE NO ITEMS ON THE CART";
}
?>
