<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .indigo-text {
      color: #10b571 !important;
    }

    .indigo {
      background-color: #17c77e !important;
    }

    .input-field input[type=date]:focus+label,
    .input-field input[type=text]:focus+label,
    .input-field input[type=email]:focus+label,
    .input-field input[type=password]:focus+label {
      color: #17c77e;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #17c77e;
      box-shadow: none;
    }
  </style>
</head>


<?php
if (isset($_SESSION["thongbao"])) {
  echo $_SESSION["thongbao"];

  unset($_SESSION["thongbao"]);
}
?>

<body>
  <main>
    <center>
      <img class="responsive-img" style="width: 350px; height: 90px; margin-top: 20px;" src="images/logo-noi-that-2.png" />
      <div class="section"></div>

      <h5 class="indigo-text">Đăng ký thành viên</h5>
      <div class="section"></div>

      <div class="container" style="width: 40%;">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form action="register_submit.php" method="POST" style="width: 300px;">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='username' />
                <label for='username'>Tên đăng nhập</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' />
                <label for='password'>Mật khẩu</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='repassword' />
                <label for='repassword'>Xác nhận mật khẩu</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='fullname' />
                <label for='fullname'>Tên đầy đủ</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='date' name='dateofbirth' />

              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='sex' />
                <label for='sex'>Giới tính</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='email' />
                <label for='email'>Email</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='phonenumber' />
                <label for='phonenumber'>Số điện thoại</label>
              </div>
            </div>
            <br />
            <center>
              <div class='row'>
                <div>
                  <button type='submit' name='submit' class='col s12 btn btn-large waves-effect indigo'>Đăng ký</button>
                </div>
                <div>
                  <a href="index.php" style="color: red;" class="btn btn-warning">Hủy</a>
                </div>

              </div>
            </center>
          </form>
        </div>
      </div>

    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>