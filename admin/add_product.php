<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Thêm sản phẩm mới</title>
  <meta charset="UTF-8">
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
<style type="text/css">
  .container{
    width: 50%;
  }
  input{
    width: 20%;
  }
</style>
</head>
<body>
  <div class="wrapper">
      <!-- Preloader-->
      <!--div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/logo.png" alt="Logo" height="60" width="60">
      </div-->
      <?php 
      require 'configQLNT.php';
        $tenSP = "";
        $maDM="";
        $anh = "";
        $soluong = "";
        $dongia = "";
        $chatlieu = "";
        $mausac ="";
        $kichthuoc = "";
        $trongluong = "";
        $ncc="";
        $chitiet = "";
        

        //Lấy giá trị POST từ form vừa submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["tensanpham"])) { $tenSP = $_POST['tensanpham']; }
            if(isset($_POST["anh"])) { 
              $anh = $_POST["anh"];
              
               }
            if(isset($_POST["madanhmuc"])) { $maDM = $_POST['madanhmuc']; }
            if(isset($_POST["soluong"])) { $soluong = $_POST['soluong']; }
            if(isset($_POST["dongia"])) { $dongia = $_POST['dongia']; }
            if(isset($_POST["chatlieu"])) { $chatlieu = $_POST['chatlieu']; }
            if(isset($_POST["mausac"])) { $mausac = $_POST['mausac']; }
            if(isset($_POST["kichthuoc"])) { $kichthuoc = $_POST['kichthuoc']; }
            if(isset($_POST["trongluong"])) { $trongluong = $_POST['trongluong']; }

            if(isset($_POST["ncc"])) { $ncc = $_POST['ncc']; }
       
            if(isset($_POST["chitiet"])) { $chitiet = $_POST['chitiet']; }
            if($_POST['tensanpham']=='' || $_POST['anh']=='' || $_POST['madanhmuc']=='' || $_POST['soluong']=='' || $_POST['dongia']=='' || $_POST['chatlieu']=='' || $_POST['mausac']=='' || $_POST['kichthuoc']=='' || $_POST['trongluong']=='' ){
            echo '<script>alert("Vui lòng nhập đầy đủ thông tin")</script>';
            echo "<script>window.location.href='add_product.php';</script>";
            die();
          }
            //Code xử lý, insert dữ liệu vào table
            $anh = $_FILES['anh']['name'];
            $target = "../user/images/books/" . basename($anh);
            $sql = "INSERT INTO sanpham (MaDM, TenSP, Anh, SoLuong, DonGia, ChatLieu, MaMau ,KichThuoc, MaNCC, TrongLuong,ChiTiet) 
            VALUES ('$maDM', '$tenSP','$anh', '$soluong','$dongia','$chatlieu','$mausac', '$kichthuoc', '$ncc', '$trongluong', '$chitiet')";
              
            if (mysqli_query($conn, $sql)) {
              move_uploaded_file($_FILES['anh']['tmp_name'], $target);
                header('location: manage_product.php');
                
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            
        }

       ?>

      <?php include "include/header.php"; ?>
      <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Thêm thông tin sản phẩm mới</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"></a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <section class="content mb-2">
      <div class="container">
        <form class="mt-3" method="POST" action="" enctype="multipart/form-data">
          <label class="mt-3">Tên sản phẩm</label>
          <input class="form-control" name="tensanpham">

          <label class="mt-3">Hình ảnh</label>
          <input class="form-control" type="file" name="anh">

          <label>Mã danh mục</label>
          <select name="madanhmuc" class="form-control" >
            <option value="unselect">-----------------Chọn danh mục----------------------</option>
            <?php 
              $sql = "SELECT * from  danhmuc" ;
              $query = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($query)){
            ?>  
              <option value="<?=$row['MaDM']?>"><?=$row['TenDM']?></option>
               <?php } ?> 
          </select>

          <label class="mt-3">Số lượng</label>
          <input type="number" class="form-control" name="soluong" min="1">

          <label class="mt-3">Đơn giá</label>
          <input class="form-control" name="dongia">

          <label class="mt-3">Chất liệu</label>
          <input type="text" class="form-control" name="chatlieu">

          <label class="mt-3">Màu sắc</label>
          <select name="mausac" class="form-control" >
            <option value="unselect">-----------------Chọn màu sắc--------------------</option>
            <?php 
              $sql = "SELECT * from  mausac" ;
              $query = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($query)){
            ?>  
              <option value="<?=$row['MaMau']?>"><?=$row['TenMau']?></option>
               <?php } ?> 
          </select>

          <label class="mt-3">Kích thước</label>
          <input type="text" class="form-control" name="kichthuoc">

          <label class="mt-3">Trọng lượng</label>
          <input type="text" class="form-control" name="trongluong">

          <label class="mt-3">Nhà cung cấp</label>
         <select name="ncc" class="form-control" >
            <option value="unselect">---------------Chọn nhà cung cấp-----------------</option>
            <?php 
              $sql = "SELECT * from  nhacungcap" ;
              $query = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($query)){
            ?>  
              <option value="<?=$row['MaNCC']?>"><?=$row['TenNCC']?></option>
               <?php } ?> 
          </select>

          

          <label class="mt-3">Chi tiết</label>
          <input type="text" class="form-control" name="chitiet">

          

          <input type="submit" class="btn btn-small btn-primary mt-3" name="btnSubmit" value="Thêm mới">
        </form>
      </div>
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
