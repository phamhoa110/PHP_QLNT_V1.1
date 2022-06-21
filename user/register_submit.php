<?php
session_start();
include_once('config.php');
if (
    isset($_POST['submit']) && $_POST["username"] != '' && $_POST["password"] != ''
    && $_POST['repassword'] != '' && $_POST['fullname'] != '' && $_POST['dateofbirth'] != '' && $_POST['sex'] != ''
    && $_POST['email'] != '' && $_POST['phonenumber'] != ''
) {
    //thực hiện khi đã nhập đầy đủ thông tin
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];
    $fullname = $_POST["fullname"];

    $dateofbirth = $_POST['dateofbirth'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $phonenumber = $_POST['phonenumber'];
    if ($password != $repassword) {

        echo '<script>alert("Mật khẩu không đúng")</script>';

        die();
    }
    $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
    if (!preg_match($regex, $email)) {
        echo '<script>alert("Email không hợp lệ")</script>';

        die();
    }
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $old = mysqli_query($conn, $sql);
    $password = md5($password);
    if (mysqli_num_rows($old) > 0) {

        echo '<script>alert("Tên đăng nhập đã tồn tại")</script>';

        die();
    }
    $sql = "INSERT INTO `user`(`username`, `password`, `fullname`, `dateofbirth`, `sex`, `email`, `phonenumber`) 
        VALUES ('$username','$password','$fullname','$dateofbirth','$sex','$email','$phonenumber')";
    $rs = mysqli_query($conn, $sql);

    echo '<script>alert("Đăng ký thành công")</script>';
    echo "<script>window.location.href='login.php';</script>";
    mysqli_close($conn);
} else {

    echo '<script>alert("vui lòng nhập đầy đủ thông tin")</script>';
}
