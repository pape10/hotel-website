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
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="food_menu.css" rel="stylesheet" type="text/css" />
<link href="modal.css" rel="stylesheet" type="text/css" />
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
<form action="edit_info.php" method="POST">
<H1 style="margin-left:750px">ACCOUNT INFO</H1>
<div style="margin-left:700px;margin-right:200px;height:100%;width:400px;padding-left:100px;">
  <?php
    require 'mysqlconnect.php';
    $username=$_SESSION['userName'];
    $selectquery = "SELECT * FROM  username WHERE username='$username'";
    $sql = mysql_query($selectquery) or die(mysql_error());
    while($row=mysql_fetch_array($sql,MYSQL_BOTH))
    {?>
       <p>username: <?php echo $row['userName']; ?> </p>
       <br/>
        <p>email: <?php echo $row['email']; ?> </p>
       <br/>
        <p>name: <?php echo $row['name']; ?> </p>
        <br/>
    <?php } ?>
    </div>
    <input type="submit" style="margin-top:30px;margin-left:700px;border-radius:10px;
position: relative;
width:300px;
height:40px;
background:red;
font-weight:bold;
font-size:20px;
cursor: pointer;" name="edit" value="edit account">
  </form>
</body>
</html>