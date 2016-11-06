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
$menuID=$_REQUEST['menuID'];
$qty=$_REQUEST['qty'];
if(EMPTY($_SESSION['cart_item']))
{
	$store_data[]=array($menuID=>array('menuID'=>$menuID,'qty' => $qty));
	$_SESSION['cart_item']=$store_data;
}
else
{
	$store_data[]=array($menuID=>array('menuID'=>$menuID,'qty' => $qty));
	$_SESSION['cart_item']=array_merge($_SESSION['cart_item'], $store_data);
}
?>
<?php
header('Location:search_menu_home1.php');
?>