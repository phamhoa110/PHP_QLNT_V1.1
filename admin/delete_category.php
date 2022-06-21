<?php
	include_once('configQLNT.php');
	if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
			$id=$_GET['id'];
			
			$sql = "DELETE FROM danhmuc WHERE MaDM='$id'";
			if (mysqli_query($conn,$sql)) {
				header("location: manage_category.php");
		}
	}
?>