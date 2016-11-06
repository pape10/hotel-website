<?php
	$host="localhost";
	$databasename="hotel";
	$user="root";
	$pass="";
	/**********MYSQL Settings****************/
	$conn=mysql_connect($host,$user,$pass);
	if($conn)
	{
	$db_selected = mysql_select_db($databasename, $conn);
	if (!$db_selected) {
	    die ('Cant use foo : ' . mysql_error());
	}
	}
	else
	{
	    die('Not connected : ' . mysql_error());
	}
		    function GetImageExtension($imagetype)
	     {
	       if(empty($imagetype)) return false;
	       switch($imagetype)
	       {
	           case 'image/bmp': return '.bmp';
	           case 'image/gif': return '.gif';
	           case 'image/jpeg': return '.jpg';
	           case 'image/png': return '.png';
	           default: return false;
	       }
	     }
	     $item_name=$_POST['itemname'];
	     $price=$_POST['price'];
	     $description=$_POST['description'];
	if (!empty($_FILES["primaryimage"]["name"])) {
	    $file_name=$_FILES["primaryimage"]["name"];
	    $temp_name=$_FILES["primaryimage"]["tmp_name"];
	    $imgtype=$_FILES["primaryimage"]["type"];
	    $ext= GetImageExtension($imgtype);
	    $imagename=date("d-m-Y")."-".time().$ext;
	    $target_path = "images/".$imagename;
	if(move_uploaded_file($temp_name, $target_path)) { 
		$query = "INSERT INTO menu (itemname,price,description,imagespath1) VALUES ('$item_name','$price','$description','$target_path')";

	    mysql_query($query) or die("error in $query_upload == ----> ".mysql_error()); 
	    echo "IMAGE UPLOADED";
	}else{
	   exit("Error While uploading image on the server");
	}
	}
	if (!empty($_FILES["secondaryimage"]["name"])) {
	    $file_name2=$_FILES["secondaryimage"]["name"];
	    $temp_name2=$_FILES["secondaryimage"]["tmp_name"];
	    $imgtype2=$_FILES["secondaryimage"]["type"];
	    $ext2= GetImageExtension($imgtype2);
	    $imagename2=date("d-m-Y")."-".time()."2".$ext2;
	    $target_path2 = "images/".$imagename2;
	if(move_uploaded_file($temp_name2, $target_path2)) { 
 $last_id=mysql_insert_id();
$sql="UPDATE menu SET imagespath2 = '$target_path2' WHERE menuID = '$last_id'";
	    mysql_query($sql) or die("error in == ----> ".mysql_error()); 
	    echo "IMAGE UPLOADED";
	}else{
	   exit("Error While uploading image on the server");
	}
	}
	if (!empty($_FILES["thirdimage"]["name"])) {
	    $file_name3=$_FILES["thirdimage"]["name"];
	    $temp_name3=$_FILES["thirdimage"]["tmp_name"];
	    $imgtype3=$_FILES["thirdimage"]["type"];
	    $ext3= GetImageExtension($imgtype3);
	    $imagename3=date("d-m-Y")."-".time()."3".$ext3;
	    $target_path3 = "images/".$imagename3;
	if(move_uploaded_file($temp_name3, $target_path3)) { 
$sql="UPDATE menu SET imagespath3 = '$target_path3' WHERE menuID = '$last_id'";
	    mysql_query($sql) or die("error in  == ----> ".mysql_error()); 
	    echo "IMAGE UPLOADED";
	}else{
	   exit("Error While uploading image on the server");
	}
	}

?>