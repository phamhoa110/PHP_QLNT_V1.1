<?php
	include_once('config.php');
		$id = $_GET['id'];//mã đơn hàng

		//update lại số lượng của các mặt hàng trong đơn hàng
		$sql3 = "SELECT * FROM tblorderdetails WHERE orderid = '$id'";
		$rs3 = mysqli_query($conn,$sql3);
		while ($r3 = mysqli_fetch_assoc($rs3))
		{
			$masp = $r3['sanphamid'];//mã sản phẩm
			$slmua = $r3['soluong']; //số lượng trong đơn hàng

			//lấy ra số lượng hiện tại của sản phẩm trong bảng sản phẩm
			$sql4 = "SELECT * FROM sanpham WHERE MaSP = '$masp'";
			$rs4 = mysqli_query($conn,$sql4);
			$r4 = mysqli_fetch_assoc($rs4);
			$sl = $r4['SoLuong'];
			$slcon = $sl + $slmua;
			$status = 1;
			mysqli_query($conn,"UPDATE sanpham SET SoLuong='$slcon', TrangThai='$status' WHERE MaSP = '$masp'");
		}

		$sql = "DELETE FROM tblorderdetails WHERE orderid = '$id'";
		$sql2 = "DELETE FROM tblorder WHERE id = '$id'";
		mysqli_query($conn,$sql);
		mysqli_query($conn,$sql2);

		mysqli_close($conn);
		header("Location: danhsachdh.php");
	
?>