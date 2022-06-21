<!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <title>Quản lý danh mục</title>

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

        font-weight:bold;

        font-size:14px;

        color: black;

        padding: 5px 9px;

        text-decoration: none;

        border:1px solid black;

    }

    .pagination a.active {

        background-color: gray;

    }

    .pagination a:hover:not(.active) {

        background-color: black;
        color: white;

    }
    #anh{
        width: 70px;
        height: 100px;
    }
  </style>

    </head>
    <body>
    <div class="wrapper">
      <!-- Preloader-->
      <!--div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/logo.png" alt="Logo" height="60" width="60">
      </div-->
    <?php include "include/header.php"; ?>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Quản lý thông tin danh mục</h1>
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
                <a href="add_category.php" ><button class="btn-primary">Thêm danh mục mới</button></a>
        </div>
          <table class="table table-bordered mt-3 .bg-light">
            <thead>
                <tr>
                  
                  <th>Mã danh mục</th>
                  <th>Tên danh mục</th>
                  <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $n = 1;
                require 'configQLNT.php';
                if(isset($_GET['page'] )){
                    $page = $_GET['page'];
                }
                else{
                    $page = 1;
                }
                $rowsPerPage = 8;
                $perRow = $page*$rowsPerPage-$rowsPerPage;
                
                $query=mysqli_query($conn,"SELECT * FROM danhmuc LIMIT $perRow, $rowsPerPage");
                $totalRows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM danhmuc"));
                $totalPages = ceil($totalRows/$rowsPerPage);
                $listPage = "";
                for($i = 1;$i<=$totalPages;$i++){
                    if($page == $i){
                        $listPage.='<a class = "active" href = "?page='.$i.'">'.$i.'</a>';
                    }
                    else{
                        $listPage.='<a href = "?page='.$i.'">'.$i.'</a>';
                    }
                }
                while($row=mysqli_fetch_array($query)){
            ?>
            <tr>
                <!--td><?php // echo $n++ ?></td-->
                <th><?php echo $row['MaDM']; ?></th>
                <td><?php echo $row['TenDM']; ?></td>

                <td width="14%;"><a href="edit_category.php?id=<?php echo $row['MaDM']; ?>" class="btn btn-primary btn-sml" >Sửa</a>
                <a href="delete_category.php?id=<?php echo $row['MaDM']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');" class="btn btn-danger btn-sml">Xóa</a></td>
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
    
