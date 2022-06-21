<?php
    session_start();
    //session_unset("user");
    unset($_SESSION['dangnhap']);
    unset($_SESSION['cart']);
    header("location:index.php");
?>