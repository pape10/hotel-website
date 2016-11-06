<?php
require 'mysqlconnect.php';
	$userID=$_REQUEST["userID"];
	$sql="UPDATE username SET status = 'activated' WHERE userID = '$userID'";
	mysql_query($sql);
?>
