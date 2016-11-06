<?php
session_start();
?>
<?php
if(isset($_GET['search']))
{
  $searchquery=$_GET['searchquery'];
}
else
{
  $searchquery="";
}
?>
<!DOCTYPE html>
<html>
<head>
<title>HOTEL BONAFIDE</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="food_menu.css" rel="stylesheet" type="text/css" />
<link href="modal.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="search.css">
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
}
  else
  {
    echo '<li id="tabs" style="float:right"><a href="register.php">register</a></li>
  <li id="tabs" style="float:right"><a href="login_for_order.php">log in</a></li>';
  }
  ?>
</ul>
<?php
include 'search.html';
?>
    </div>
  <?php
  require 'mysqlconnect.php';
  ?>
<?php 
  $selectquery = "SELECT * FROM  menu WHERE itemname LIKE '%".$searchquery."%' ORDER BY itemname ASC ";
$sql = mysql_query($selectquery) or die(mysql_error());   
while($row = mysql_fetch_array($sql,MYSQL_BOTH)){
?>
<div class="responsive">
  <div class="img">
    <a target="_blank" href="individual_menu.php?menuID=<?php echo $row['menuID']?>">
      <img src="<?php echo $row['imagespath1'];?>" alt="<?php echo $row['itemname']; ?>" width="300" height="200">
    </a>
    <div class="desc"><?php echo $row['itemname']?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $row['price']?> &nbsp; &nbsp; 
    </div>
  </div>
</div>
<?php }
?>
<br/>
<br/>
</body>
</html>