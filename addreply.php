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
if (isset($_REQUEST['comment_submit'])) {
	# code...
	require 'mysqlconnect.php';
	$userName=$_SESSION['userName'];
	$selectquery = "SELECT userID FROM  username WHERE userName='$userName'";
    $sql = mysql_query($selectquery) or die(mysql_error());
    while($row=mysql_fetch_array($sql,MYSQL_BOTH))
    {
    	$userID=$row['userID'];
    }
	$comment=$_REQUEST['comment'];
	$menuID=$_REQUEST['menuID'];
	$itemname=$_REQUEST['itemname'];
		$query = "INSERT INTO comment (menuID,itemname,userName,userID,comment) VALUES ('$menuID','$itemname','$userName','$userID','$comment')";
	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
		header('Location:individual_menu.php?menuID='.$menuID);
	}
}
?>