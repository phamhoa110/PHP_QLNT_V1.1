<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sửa thông tin nhà cung cấp</title>
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
    <?php
    include "include/header.php"; 
    require 'configQLNT.php';
    $id=$_GET['id'];
    $query=mysqli_query($conn,"SELECT * FROM nhacungcap WHERE MaNCC ='$id'");
    
    $row=mysqli_fetch_assoc($query);
    ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Chỉnh sửa nhà cung cấp</h1>
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
        <div class="container ">
        <form class="mt-3" method="POST" class="form">
          

          <label class="mt-3">Tên nhà cung cấp
          <input class="form-control" name="ten" value="<?php echo $row['TenNCC']; ?>"></label><br>
          <label class="mt-3">Địa chỉ
          <input class="form-control" name="diachi" value="<?php echo $row['DiaChi']; ?>"></label><br>
          <label class="mt-3">Số điện thoại
          <input class="form-control" name="sdt" value="<?php echo $row['SDT']; ?>"></label><br>

          <input type="submit" class="btn btn-small btn-primary mt-3" name="update_NCC" value="Sửa">


      </form>
    </div>
    <?php
        
         ob_start();
         if (isset($_POST['update_NCC'])){

           if(isset($_POST['ten'])){
             $tenNCC = $_POST['ten'];
           }
           if(isset($_POST['diachi'])){
             $diachi = $_POST['diachi'];
           }
           if(isset($_POST['sdt'])){
             $sdt = $_POST['sdt'];
           }
           if($_POST['ten']=='' || $_POST['diachi']=='' || $_POST['sdt']==''){
            echo '<script>alert("Vui lòng nhập đầy đủ thông tin")</script>';
            die();
          }
           
           $sql = "UPDATE nhacungcap SET  TenNCC ='$tenNCC',DiaChi='$diachi',SDT='$sdt' WHERE MaNCC='$id'";
           mysqli_query($conn, $sql);
            
           mysqli_close($conn);
          echo "<script> window.location.href='manage_ncc.php';</script>";
           
         }
         ob_end_flush();
        ?>
  </section>
    </div>
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