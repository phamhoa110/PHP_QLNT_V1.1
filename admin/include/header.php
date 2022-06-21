<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Trang chủ</a>
      </li>

      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="contact.php" class="nav-link">Liên hệ</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown no-arrow">
          <a class="nav-link" href="logout.php">
                <i class="fas fa-sign-out-alt "></i><span class="text-secondary">Đăng xuất</span>  
          </a>
        </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link bg-light" >
      <img src="photo/logo-noi-that-2.png" alt="company name here" style="width: 300px; height:90px; margin-top: -10px; padding-right:50px;">
      <br>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="photo/user.png" class="img-square rounded elevation-3" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item menu-open">
            <a href="index.php" class="nav-link active">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Quản lý danh mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục mới</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý danh mục</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý sản phẩm
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Quản lý nhà cung cấp
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add_ncc.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm nhà cung cấp</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_ncc.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý nhà cung cấp</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Quản lý đơn hàng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="thongke.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê đơn hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="updateorder.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cập nhật trạng thái đơn hàng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="thongke_product.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thống kê sản phẩm</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Quản lý người dùng
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="manage_admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage_user.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Quản lý user</p>
                </a>
              </li>
            </ul>
          </li>
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
