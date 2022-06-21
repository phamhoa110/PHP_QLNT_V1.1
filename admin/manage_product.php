<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bán nội thất</title>

  <!-- Google Font: Source Sans Pro -->
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
    .pagination {
      display: inline-block;
      margin-bottom: 10px;
      float: right;
    }

    .pagination a {

      font-weight: bold;

      font-size: 14px;

      color: black;

      padding: 5px 9px;

      text-decoration: none;

      border: 1px solid black;

    }

    .pagination a.active {

      background-color: gray;

    }

    .pagination a:hover:not(.active) {

      background-color: black;
      color: white;

    }

    #anh {
      width: 70px;
      height: 100px;
    }
  </style>

</head>

<body>
  <?php include "include/header.php"; ?>
  <div class="wrapper">

    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-10">
              <h1 style="text-align: center;">Danh sách sản phẩm</h1>
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
          <div class="buttons">
            <a href="add_product.php"><button class="btn-primary">Thêm sản phẩm</button></a>
          </div>
          <table class="table table-bordered mt-3 .bg-light">
            <thead>
              <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Tên danh mục</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Chất liệu</th>
                <th>Màu sắc</th>
                <th>Kích thước</th>
                <th>Nhà cung cấp</th>
                <th>Trọng lượng</th>
                <th>Chi tiết</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php


              require 'configQLNT.php';
              $count = 0;
              $n = 1;
              if (isset($_GET['page'])) {
                $page = $_GET['page'];
              } else {
                $page = 1;
              }

              $rowsPerPage = 4;
              $perRow = $page * $rowsPerPage - $rowsPerPage;
              $query = mysqli_query($conn, "SELECT * FROM sanpham LIMIT $perRow, $rowsPerPage");
              $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM sanpham"));
              $totalPages = ceil($totalRows / $rowsPerPage);
              $listPage = "";
              for ($i = 1; $i <= $totalPages; $i++) {
                if ($page == $i) {
                  $listPage .= '<a class = "active" href = "?page=' . $i . '">' . $i . '</a>';
                } else {
                  $listPage .= '<a href = "?page=' . $i . '">' . $i . '</a>';
                }
              }
              while ($row = mysqli_fetch_array($query)) {
                $count++;
              ?>

                <tr>

                  <td><?= $count ?></td>
                  <td><img id="anh" src="../user/images/books/<?php echo $row['Anh'] ?>" alt="<?= $row['TenSP'] ?>"></td>

                  <td><?php echo $row['TenSP']; ?></td>

                  <td><?php
                      $id =  $row['MaDM'];
                      $sql = "SELECT TenDM FROM danhmuc WHERE MaDM = $id";
                      $rowDMn  = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                      echo $rowDMn['TenDM'];
                      ?>
                  </td>

                  <td><?php echo $row['SoLuong']; ?></td>

                  <td><?php echo $row['DonGia']; ?></td>

                  <td><?php echo $row['ChatLieu']; ?></td>

                  <td><?php
                      $id =  $row['MaMau'];
                      $sql = "SELECT TenMau FROM mausac WHERE MaMau = $id";
                      $rowDMc = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                      echo $rowDMc['TenMau'];

                      ?></td>

                  <td><?php echo $row['KichThuoc']; ?></td>

                  <td><?php
                      $id =  $row['MaNCC'];
                      $sql = "SELECT TenNCC FROM nhacungcap WHERE MaNCC = $id";
                      $rowDMnc = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                      echo $rowDMnc['TenNCC'];

                      ?></td>

                  <td><?php echo $row['TrongLuong']; ?></td>



                  <td><?php echo $row['ChiTiet']; ?></td>


                  <td width="14%;"><a href="edit_product.php?id=<?php echo $row['MaSP']; ?>" class="btn btn-primary btn-sml">Sửa</a>
                    <a href="delete_product.php?id=<?php echo $row['MaSP']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" class="btn btn-danger btn-sml">Xóa</a>
                  </td>
                </tr>

              <?php } ?>
            </tbody>
          </table>
          <div class="pagination">
            <?php
            echo $listPage;
            ?>
          </div>
        </div>

      </section>

    </div>

    <!--?php //} ?-->
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