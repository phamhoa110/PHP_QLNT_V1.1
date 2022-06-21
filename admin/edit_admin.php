<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sửa thông tin admin</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap 
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css"-->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body>
	<div class="wrapper">
      <!-- Preloader-->
      <!--div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/logo.png" alt="Logo" height="60" width="60">
      </div-->
    <?php include "include/header.php"; ?>
    <?php
          require 'configQLNT.php';
            $id=$_GET['id'];
          $query=mysqli_query($conn,"SELECT * FROM admin WHERE id ='$id'");
          
          $row=mysqli_fetch_assoc($query);
          ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Chỉnh sửa thông tin admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container"> 
		    <form method="POST" class="form-group" enctype="multipart/form-data">
        <label class="mt-3">admin's nname</label>
          <input class="form-control ms-5" name="username" value="<?php echo $row['username']; ?>">

          <label class="mt-3">Password</label>
          <input class="form-control ms-5" name="password" value="<?php echo $row['password']; ?>">

          <label class="mt-3">Tên admin</label>
          <input class="form-control ms-5" name="adminname" value="<?php echo $row['fullname']; ?>">

          <!-- <label class="mt-3">Mô tả</label>
          <input class="form-control ms-5" value="<?php //echo $row['description']; ?>" name="mota"> -->

          <input type="submit" class="btn btn-small btn-primary mt-3" name="update_admin" value="Sửa">
          <input type="submit" class="btn btn-small btn-primary mt-3" name="return" value="Quay lại">
			</form>
		</div>
    <?php
        //   if (isset($_POST['update_admin'])){
        //     if(isset($_POST['adminname'])) { $name=$_POST['adminname']; }
        //     $sql = "UPDATE admin SET fullname='$name' WHERE id='$id'";
        //     if (mysqli_query($conn, $sql)) {
        //       //echo '<script>alert("Sửa thành công\nMời bạn quay lại trang quản lý để xem chi tiết")</script>';
        //       echo "<script>window.location.href='manage_admin.php';</script>";
        //     }
        //   }
        // && $_POST['username']!='' && $_POST['password']!='' && $_POST['adminname']!=''
        if(isset($_POST['return'])){
          echo "<script>window.location.href='manage_admin.php';</script>";
        }
        if(isset($_POST['update_admin'])){
          $username = $_POST['username'];
          $password = $_POST['password'];
          $name = $_POST['adminname'];
          $sql = "SELECT * FROM admin WHERE username = '$username'";
          $old = mysqli_query($conn, $sql);
          if($_POST['username']=='' || $_POST['password']=='' || $_POST['adminname']==''){
            echo '<script>alert("Vui lòng nhập đầy đủ thông tin")</script>';
            die();
          }
          if(mysqli_num_rows($old)>0){
              echo '<script>alert("adminname đã tồn tại!")</script>';
              //echo "<script>window.location.href='edit_admin.php';</script>";
              die();
          }
          $sql = "UPDATE admin SET fullname='$name', password='$password', username='$username' WHERE id='$id'";
          if (mysqli_query($conn, $sql)) {
              //echo '<script>alert("Sửa thành công\nMời bạn quay lại trang quản lý để xem chi tiết")</script>';
              echo "<script>window.location.href='manage_admin.php';</script>";
          }
        }
        // else{
        //   echo '<script>alert("Vui lòng nhập đầy đủ thông tin")</script>';
        //   //echo "<script>window.location.href='edit_admin.php';</script>";
        // }
        ?>
	</section>
</div>
	<?php include 'include/footer.php'; ?>
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <script src="dist/js/adminlte.js"></script>
</body>
</html>