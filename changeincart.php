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
if(isset($_POST['removecart']))
{
	$menuID=$_REQUEST['menuID'];
	$qty=$_REQUEST['qty'];
	foreach ($_SESSION['cart_item'] as $key => $value) {
		foreach ($value as $k => $v) {
			if($menuID==$v['menuID'])
			{
				unset($_SESSION['cart_item'][$key]);
				header('Location:seecart.php');
			}
}
}
}
else if (isset($_POST['updatecart'])) {
	# code...
	$menuID=$_REQUEST['menuID'];
	$qty=$_REQUEST['qty'];
	foreach ($_SESSION['cart_item'] as $key => $value) {
		foreach ($value as $k => $v) {
			if($menuID==$v['menuID'])
			{
				$_SESSION['cart_item'][$key]=array($menuID=>array('menuID'=>$menuID,'qty' => $qty));
				header('Location:seecart.php');
			}
}
}
}
?>