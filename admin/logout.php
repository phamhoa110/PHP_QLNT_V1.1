<?php

session_start();
 

unset($_SESSION['dangnhap1']);
// Redirect to login page
header("location: login.php");
exit;
?>