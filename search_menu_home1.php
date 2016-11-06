<?php
session_start();
?>
<?php
if(empty($_SESSION['userName']))
{
    header("Location: login_for_order.php");
}
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
<style type="text/css">
  #textarea {
    width: 60px;
}
</style>
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
<form method="POST" action="addtocart.php?menuID=<?php echo $row['menuID']; ?>">
<div class="responsive">
  <div class="img">
    <a target="_blank" href="individual_menu.php?menuID=<?php echo $row['menuID']?>">
      <img src="<?php echo $row['imagespath1'];?>" alt="<?php echo $row['itemname']; ?>" width="300" height="200">
    </a>
    <div class="desc"><?php echo $row['itemname']?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo $row['price']?> &nbsp; &nbsp; 
   <label for="textarea" style="margin-left:100px">QTY:</label> <input type="text" name="qty" value="0" id="textarea" ><br>
   <?php
   $msg1="enabled";
   $msg2="add to cart";
   if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
        foreach ($v as $key => $value) {
          # code...
          if($row['menuID'] == $key)
          {

              $msg1="disabled";
              $msg2="added";
          }
          else
          {
            $msg1="enabled";
            $msg2="add to cart";
          }
      }
      if($msg1=="disabled")
      {
        break;
      }
    }
  }
  ?>
    <input type="submit" name="addtocart" value="<?php echo $msg2; ?>"  style="margin-left:80px;width:200px;" <?php echo $msg1; ?>><br>
 </div>
  </div>
</div>
</form>
<?php }
?>
</body>
</html>