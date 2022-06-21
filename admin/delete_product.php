
<?php
include_once('configQLNT.php');
	if(isset($_REQUEST['id']) and $_REQUEST['id']!="")
	{
		$id=$_GET['id'];
		$sql = "DELETE FROM sanpham WHERE MaSP='$id'";
		
		if (mysqli_query($conn, $sql)) {
			header("location: manage_product.php");
		}
	}
?>