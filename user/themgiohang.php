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
        //ktra id trong session tr??ng v???i id ???????c get ra k, in l???i session ngo???i tr??? session c?? id tr??n
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
       
        if(isset($_SESSION['cart']))//???? c?? gi??? th?? l???y ra
        {
            $cart = $_SESSION['cart'];
        }
        else{//ch??a c?? th?? t???o
            $cart = [];
        }
        //Ki???m tra h??ng c?? trong gi??? ch??a
        if(array_key_exists($id, $cart)){//h??ng ???? c?? trong gi???
            $cart[$id]['soluong']++;
        }
        else{//ch??a c?? sp trong gi???
            $cart[$id] = array('TenSP'=>$row['TenSP'],'Anh'=>$row['Anh'],'MaSP'=>$id,'soluong'=>$soluong,'DonGia'=>$row['DonGia'],'MaSP'=>$row['MaSP']);
        }
        //c???p nh???t l???i gi??? h??ng
         $_SESSION['cart'] = $cart;
    }
       header('Location:index1.php');
    }
    

?>