<?php
	
include_once("config.php");
include("header1.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
if (!empty($_SESSION['dangnhap'])) {
	//$id = $_SESSION['userid'];
     if (!empty($_SESSION['cart'])) 
     {
     	if(isset($_POST['vanchuyen'])){
		$hoten=$_POST['hoten'];
		$diachi=$_POST['diachi'];
		$sdt=$_POST['sdt'];
		$odate = date("Y-m-d H:i:s");
		//$otime = date('H:i:s');
		
		$userid =$_SESSION['userid'];
		
		$sql = "INSERT INTO tblorder (odate,user_id,status,hoten,diachi,sdt) VALUES('$odate','$userid','0','$hoten','$diachi','$sdt')";
		
		}
	mysqli_query($conn,$sql);
	//lấy id của bản ghi vừa chèn (sau cùng);
	$id = mysqli_insert_id($conn);

	foreach($_SESSION['cart'] as $cart_item){

		$k = $cart_item['MaSP'];
		$quantity = $cart_item['soluong'];
		$price = $cart_item['DonGia'];
		

		//$iddetails = mysqli_insert_id($conn);
	
		$sql1 = "SELECT * FROM sanpham WHERE MaSP = '$k'";
		$rs = mysqli_query($conn,$sql1);
		$r = mysqli_fetch_assoc($rs);
		$sl = $r['SoLuong'];
		if ($sl >= $quantity)
		{
			$sql = "INSERT INTO tblorderdetails (orderid,sanphamid,soluong,dongia) VALUES ('$id','$k','$quantity','$price')";
		mysqli_query($conn,$sql);
			$slcon = $sl - $quantity;
			if ($slcon == 0 )
				$status = 0;
			else 
				$status = 1;

			mysqli_query($conn,"UPDATE sanpham SET SoLuong='$slcon', TrangThai='status' WHERE MaSP = '$k'");
		}
	}

	unset($_SESSION['cart']);
	mysqli_close($conn);
	echo "<script>window.location.href='danhsachdh.php';</script>";   
}       
  else {
            echo '<script>alert("Chưa có sản phẩm nào trong giỏ hàng!")</script>';
            echo '<script>window.location.href="index1.php";</script>';
        }
}
else {
    echo '<script>alert("Bạn chưa đăng nhập!")</script>';
}
