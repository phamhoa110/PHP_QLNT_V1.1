<?php
include_once('configQLNT.php');
if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
	$id=$_GET['id'];
	$sql = "DELETE FROM user WHERE id='$id'";
	if (mysqli_query($conn,$sql)) {
		header("location: manage_user.php");
}
}
?>