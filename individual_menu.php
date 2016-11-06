<?php
session_start();
	$menuID=$_REQUEST["menuID"];
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
 <script src='https://cdnjs.cloudflare.com/ajax/libs/autosize.js/3.0.15/autosize.min.js'></script>
<script>
    // Automatically size all of your <textarea> elements as you type
    autosize(document.querySelectorAll('textarea'));
</script>
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

<div style="margin-left:400px;height:100%;width:700px;padding-left:100px;">
  <?php
    require 'mysqlconnect.php';
    $selectquery = "SELECT * FROM  menu WHERE menuID='$menuID'";
    $sql = mysql_query($selectquery) or die(mysql_error());
    while($row=mysql_fetch_array($sql,MYSQL_BOTH))
    {
      $itemname=$row['itemname'];?>
    	<H1 style="margin-left:250px;margin-top:10px;font-size: 4em;"><?php echo $row['itemname']; ?></H1>
       <div>
       <a href="<?php echo $row['imagespath1'];?>"><img style="width:700px" src="<?php echo $row['imagespath1'];?>"></a>
       </div>        
        <p style="font-size: 2.5em;margin-left:200px"></p>
       <br/>
        <p style="margin-left:200px;font-size: 1.5em;">description: <?php echo $row['description']; ?> </p>
        <br/>
                <p style="font-size: 1.5em;margin-left:220px;margin-top:0px;">price: <?php echo $row['price']; ?> </p>
        </div>
    <?php } ?>
    </div>
    <div style="position:relative;float:left">
<input type="submit" style="margin-top:30px;margin-left:650px;border-radius:10px;
position: relative;
width:300px;
height:40px;
background:red;
font-weight:bold;
font-size:20px;
cursor: pointer;" name="submit" value="add to tray">
<br>
</div>
<div style="float:left;margin:left:500px;padding-top:40px">
<form method="POST" action="addreply.php?menuID=<?php echo $menuID; ?>&itemname=<?php echo $itemname; ?>">
    <textarea style="margin-left:500px" rows="4" cols="80" name="comment">
</textarea>
    <input type="submit" name="comment_submit" value="comment" style="margin-left:750px;">
    </form>
    </div>
    <div style="float:left;padding-top:40px;">
    <h2 style="margin-left:500px;">REVIEWS</h2>
        <?php
        $selectquery = "SELECT * FROM  comment WHERE menuID='$menuID'";
    $sql = mysql_query($selectquery) or die(mysql_error());
    while($row=mysql_fetch_array($sql,MYSQL_BOTH))
    {?>
      <div style="
    margin-top: 10px;
    min-width: 500px;
    margin-bottom: 10px;
    margin-right: 250px;
    margin-left: 480px;
    background-color: lightblue;">
        <span style="font-weight: 900;font-size:125%"><?php echo $row['userName'];?>:</span>
        <p style="display:inline;padding-left:10px;"><?php echo $row['comment']; ?></p>
        <br/>
        </div>
        <?php
      }
      ?>
    </div>
</div>
</body>
</html>