<?php
session_start();
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
<div id="openModal" class="modalDialog">
    <div> <a href="#close" title="Close" class="close">X</a>

          <form action="connectivity1.php" method="POST">
          <h2 style="text-align:center">LOG IN</h2>
            <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>
      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>
      <input id="button" type="submit" name="submit" value="Log-In">
      <a href="forgot_password.php">forgot password</a>
          </form>
    </div>
</div>
</ul>
    <div id="sliderFrame">
        <div id="slider">
            <img src="1.jpg" />
            <img src="2.jpg" />
            <img src="3.jpg" />
        </div>
        <!--Custom navigation buttons on both sides-->
        <div class="group1-Wrapper">
        <a onclick="imageSlider.next()" class="group1-Prev"></a>
            <a onclick="imageSlider.next()" class="group1-Next"></a>
        </div>
        <!--nav bar-->
        <div style="text-align:center;padding:20px;z-index:20;">
            <a onclick="imageSlider.previous()" class="group2-Prev"></a>
            <a id='auto' onclick="switchAutoAdvance()"></a>
            <a onclick="imageSlider.next()" class="group2-Next"></a>
        </div>
    </div>

    <script type="text/javascript">
        //The following script is for the group 2 navigation buttons.
        function switchAutoAdvance() {
            imageSlider.switchAuto();
        }
    </script>
        <div class="name-container w3-lobster">
            <h1 class="w3-xxxlarge">HOTEL BONAFIDE!</h1>
            <p class="w3-large">hotel bonafide is one of the best hotels in bhubaneswar it provides a range of services from home delivery to catering service
            hotel bonafide is one of the best hotels in bhubaneswar it provides a range of services from home delivery to catering servicehotel bonafide is one of the best hotels in bhubaneswar it provides a range of services from home delivery to catering service</p>
        </div>
            <div class="name-container1 w3-lobster">
            <h1 class="w3-xxxlarge">BONAFIDE HOTELS IN BHUBANESWAR!</h1>
            </div>
    <div class="read-more-text-container">
      <div class="text-box">
        <img id="logo-text-box" src="1.jpg">
        <h1 style="text-align: center">BONAFIDE FIRE</h1>
        <p style="text-align: center">BONAFIDE FIRE is situated in patia</p>
                <div id="text-box-links-isdiv">
        <a id="text-box-links"onmouseover="mOver(this)" onmouseout="mOut(this)" href="#index">
        Read More?</a>
        <script>
        function mOver(obj) {
            obj.innerHTML = "Read More>"
        }

        function mOut(obj) {
            obj.innerHTML = "Read More?"
        }
        </script>
        </div>
      </div>
          <div class="text-box">
        <img id="logo-text-box" src="1.jpg">
        <h1 style="text-align: center">BONAFIDE AQUA</h1>
        <p style="text-align: center">bonafide aqua is situated in saheed nagar</p>
        <div id="text-box-links-isdiv">
        <a id="text-box-links"onmouseover="mOver(this)" onmouseout="mOut(this)" href="#index">
        Read More?</a>
        <script>
        function mOver(obj) {
            obj.innerHTML = "Read More>"
        }

        function mOut(obj) {
            obj.innerHTML = "Read More?"
        }
        </script>
        </div>
      </div>
          <div class="text-box">
        <img id="logo-text-box" src="1.jpg">
        <h1 style="text-align: center">BONAFIDE GRAND</h1>
        <p style="text-align: center">bonafide grand is in jaydev vihar</p>
                <div id="text-box-links-isdiv">
        <a id="text-box-links"onmouseover="mOver(this)" onmouseout="mOut(this)" href="#index">
        Read More?</a>
        <script>
        function mOver(obj) {
            obj.innerHTML = "Read More>"
        }

        function mOut(obj) {
            obj.innerHTML = "Read More?"
        }
        </script>
        </div>
      </div>
    </div>
        <script type="text/javascript">
        //The following script is for the group 2 navigation buttons.
        function switchAutoAdvance() {
            imageSlider.switchAuto();
        }
    </script>
</body>
</html>
