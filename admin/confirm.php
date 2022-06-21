<?php
	include_once('configQLNT.php');
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$sql = "UPDATE tblorder SET status=1 WHERE id = '$id'";
		mysqli_query($conn,$sql);
		mysqli_close($conn);
		header("Location: thongke.php");
	}
?>