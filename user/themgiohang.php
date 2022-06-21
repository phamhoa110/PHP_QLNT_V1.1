<?php
session_start();
include("config.php");
//them
if(isset($_GET['cong'])){
    $id=$_GET['cong'];

    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['MaSP']!=$id){
            $product[] =  array('TenSP'=>$cart_item['TenSP'],'Anh'=>$cart_item['Anh'],'soluong'=>$cart_item['soluong'],'DonGia'=>$cart_item['DonGia'],'MaSP'=>$cart_item['MaSP']);
            $_SESSION['cart']=$product; 

        }
        else{
            $sql = "select SoLuong from sanpham where MaSP = '$id'";
            $rs = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($rs);
            $tangsl=$cart_item['soluong']+1;

            if($cart_item['soluong']<$row['SoLuong']){
                $product[] =  array('TenSP'=>$cart_item['TenSP'],'Anh'=>$cart_item['Anh'],'soluong'=>$tangsl,'DonGia'=>$cart_item['DonGia'],'MaSP'=>$cart_item['MaSP']);
            }
            else{
                $product[] =  array('TenSP'=>$cart_item['TenSP'],'Anh'=>$cart_item['Anh'],'soluong'=>$cart_item['soluong'],'DonGia'=>$cart_item['DonGia'],'MaSP'=>$cart_item['MaSP']);
            }
             $_SESSION['cart']=$product;
        }

    }
    echo "<script>window.location.href='giohang.php';</script>";
}
//tru so luong
if(isset($_GET['tru'])){
    $id=$_GET['tru'];
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['MaSP']!=$id){
            $product[] =  array('TenSP'=>$cart_item['TenSP'],'Anh'=>$cart_item['Anh'],'soluong'=>$cart_item['soluong'],'DonGia'=>$cart_item['DonGia'],'MaSP'=>$cart_item['MaSP']);
            $_SESSION['cart']=$product; 

        }
        else{
            $trusl=$cart_item['soluong']-1;
            if($trusl>=1){
                $product[] =  array('TenSP'=>$cart_item['TenSP'],'Anh'=>$cart_item['Anh'],'soluong'=>$trusl,'DonGia'=>$cart_item['DonGia'],'MaSP'=>$cart_item['MaSP']);
            }
            else{
                // $product[] =  array('TenSP'=>$cart_item['TenSP'],'Anh'=>$cart_item['Anh'],'soluong'=>$cart_item['soluong'],'DonGia'=>$cart_item['DonGia'],'MaSP'=>$cart_item['MaSP']);
                unset($_SESSION['cart']);
            }
             $_SESSION['cart']=$product;
        }
       

    }
    echo "<script>window.location.href='giohang.php';</script>";
}
//xoa sach
if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
    $id=$_GET['xoa'];
    foreach($_SESSION['cart'] as $cart_item){
        //ktra id trong session trùng với id được get ra k, in lại session ngoại trừ session có id trên
        if($cart_item['MaSP']!=$id){
            $product[] =  array('TenSP'=>$cart_item['TenSP'],'Anh'=>$cart_item['Anh'],'soluong'=>$cart_item['soluong'],'DonGia'=>$cart_item['DonGia'],'MaSP'=>$cart_item['MaSP']);
        }
        $_SESSION['cart']=$product; 
        header('Location:giohang.php');
    }
}

//xoa tat ca sach
if(isset($_GET['xoatatca']) && $_GET['xoatatca']==1){
    unset($_SESSION['cart']);
    header('Location:index1.php');
}

//them
if(isset($_POST['themgiosach'])){

    $id = $_POST['MaSP'];
    
    $soluong = 1;
    $sql = "SELECT * FROM sanpham WHERE MaSP = '".$id."' LIMIT 1";
    $querry = mysqli_query($conn,$sql);
    $row= mysqli_fetch_array($querry);
    if($row){
       
        if(isset($_SESSION['cart']))//đã có giỏ thì lấy ra
        {
            $cart = $_SESSION['cart'];
        }
        else{//chưa có thì tạo
            $cart = [];
        }
        //Kiểm tra hàng có trong giỏ chưa
        if(array_key_exists($id, $cart)){//hàng đã có trong giỏ
            $cart[$id]['soluong']++;
        }
        else{//chưa có sp trong giỏ
            $cart[$id] = array('TenSP'=>$row['TenSP'],'Anh'=>$row['Anh'],'MaSP'=>$id,'soluong'=>$soluong,'DonGia'=>$row['DonGia'],'MaSP'=>$row['MaSP']);
        }
        //cập nhật lại giỏ hàng
         $_SESSION['cart'] = $cart;
    }
       header('Location:index1.php');
    }
    

?>