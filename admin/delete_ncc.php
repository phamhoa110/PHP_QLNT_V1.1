<?php
	include_once('configQLNT.php');
	if(isset($_REQUEST['id']) and $_REQUEST['id']!=""){
			$id=$_GET['id'];
			
			$sql = "DELETE FROM nhacungcap WHERE MaNCC='$id'";
			if (mysqli_query($conn,$sql)) {
				header("location: manage_ncc.php");
		}
	}
?>