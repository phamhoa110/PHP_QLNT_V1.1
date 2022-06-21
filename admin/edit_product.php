<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sửa thông tin sản phẩm</title>
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
    <?php include "include/header.php"; 
    require 'configQLNT.php';
	    $id=$_GET['id'];
		$query=mysqli_query($conn,"SELECT * FROM sanpham WHERE MaSP ='$id'");
		
		$row=mysqli_fetch_assoc($query);
    ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Chỉnh sửa thông tin sản phẩm</h1>
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
		    <form method="POST" class="form mb-3" enctype="multipart/form-data">
          <label class="mt-3">Tên sản phẩm</label>
          <input class="form-control" name="tensanpham" value="<?=$row['TenSP']?>">
          
          <div class="form-group">
              <label for="exampleInputFile">Hình ảnh</label>
                <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="exampleInputFile" name="anh" value="<?= $row['Anh'] ?>">
                      <label class="custom-file-label" name ="anh" for="exampleInputFile"><?= $row['Anh'] ?></label>
                  </div>
              </div>
          </div>
         

          <label>Tên danh mục</label>
          <select name="madanhmuc" class="form-control">
            <option value="unselect">-----------------Chọn danh mục----------------------</option>
            <?php 
              $sql = "SELECT * from  danhmuc" ;
              $query = mysqli_query($conn, $sql);
              while($rowDM = mysqli_fetch_assoc($query)){
            ?>  
              <option <?php
                if($row['MaDM'] == $rowDM['MaDM']){
                  echo 'selected = "selected"';
                }
              ?>value="<?=$rowDM['MaDM']?>"><?=$rowDM['TenDM']?></option>
               <?php } ?> 
          </select>

          <label class="mt-3">Số lượng</label>
          <input type="number" class="form-control" name="soluong" min="1" value="<?=$row['SoLuong']?>">

          <label class="mt-3">Đơn giá</label>
          <input class="form-control" name="dongia" value="<?=$row['DonGia']?>">

          <label class="mt-3">Chất liệu</label>
          <input type="text" class="form-control" name="chatlieu" value="<?=$row['ChatLieu']?>">

          <label class="mt-3">Màu sắc</label>
          <select name="mausac" class="form-control" >
            <option value="unselect">--------------------Chọn màu sắc--------------------</option>
            <?php 
              $sql = "SELECT * from  mausac" ;
              $query = mysqli_query($conn, $sql);
              while($rowMau = mysqli_fetch_assoc($query)){
            ?>  
              <option <?php
                if($row['MaMau'] = $rowMau['MaMau']){
                  echo 'selected="selected"';
                }
              ?> value="<?=$rowMau['MaMau']?>"><?=$rowMau['TenMau']?></option>
               <?php } ?> 
          </select>

          <label class="mt-3">Kích thước</label>
          <input type="text" class="form-control" name="kichthuoc" value="<?=$row['KichThuoc']?>">

          <label class="mt-3">Trọng lượng</label>
          <input type="text" class="form-control" name="trongluong" value="<?=$row['TrongLuong']?>">

          <label class="mt-3">Nhà cung cấp</label>
         <select name="ncc" class="form-control" >
            <option value="unselect">----------------Chọn nhà cung cấp---------------</option>
            <?php 
              $sql = "SELECT * from  nhacungcap" ;
              $query = mysqli_query($conn, $sql);
              while($rowNha = mysqli_fetch_assoc($query)){
            ?>  
              <option <?php
                if($row['MaNCC'] = $rowNha['MaNCC']){
                  echo 'selected';
                }
              ?> value="<?=$rowNha['MaNCC']?>"><?=$rowNha['TenNCC']?></option>
               <?php } ?> 
          </select>
          

          <label class="mt-3">Chi tiết</label>
          <input type="text" class="form-control" name="chitiet" value="<?=$row['ChiTiet']?>">

        

             <input class="mt-3" type="submit" value="Sửa" name="update_SP">

      </form>
				<?php
        
					if (isset($_POST['update_SP'])){
           
						if(isset($_POST['madanhmuc'])){
              $madm=$_POST['madanhmuc'];
              
            }

						if(isset($_POST['tensanpham'])){
              $tensp=$_POST['tensanpham'];
            }

            if(isset($_POST['soluong'])) {
              $soluong=$_POST['soluong'];
            }

            if(isset($_POST['dongia'])){
              $dongia = $_POST['dongia'];
            }

            if(isset($_POST['chatlieu'])){
              $chatlieu = $_POST['chatlieu'];
            }

            if(isset($_POST['mausac'])){
              $mausac = $_POST['mausac'];
            }

            if(isset($_POST['kichthuoc'])){
              $kichthuoc = $_POST['kichthuoc'];
            }

            if(isset($_POST['ncc'])){
              $ncc = $_POST['ncc'];
            }

            if(isset($_POST['trongluong'])){
              $trongluong = $_POST['trongluong'];
            }

            if(isset($_POST['chitiet'])){
              $chitiet = $_POST['chitiet'];
            }

            if(isset($_FILES['anh'])){
             $anh = $_POST['anh'];
          }

          $anh = $_FILES['anh']['name'];
          $target = "../user/images/books/" . basename($anh);
         

           
				  $sql = "UPDATE sanpham SET TenSP='$tensp', MaDM='$madm', Anh ='$anh', SoLuong = '$soluong', DonGia = '$dongia', ChatLieu = '$chatlieu', MaMau = '$mausac',
          KichThuoc = '$kichthuoc', MaNCC = '$ncc', TrongLuong = '$trongluong', ChiTiet = '$chitiet' WHERE MaSP='$id'";
						if (mysqli_query($conn, $sql)) {
              
              move_uploaded_file($_FILES['anh']['tmp_name'], $target);
                
              echo '<script>alert("Sửa thành công\nMời bạn quay lại trang quản lý để xem chi tiết")</script>';
            }
            ob_start();
            mysqli_close($conn);
            echo "<script> window.location.href='manage_product.php';</script>";
              
            ob_end_flush();
					}
				?>
        
         
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