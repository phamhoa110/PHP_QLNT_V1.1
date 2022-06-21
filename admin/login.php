

<?php
    session_start();
    include('configQLNT.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['user_id'];
        $matkhau = $_POST['password'];
        //$matkhau = md5($matkhau);
        $sql = "SELECT * FROM admin WHERE username= '".$taikhoan."' AND password= '".$matkhau."' LIMIT 1";
        $row=mysqli_query($conn,$sql);

        $count = mysqli_num_rows($row);
        if($count==0){
            
            echo '<script>alert("Tên tài khoản hoặc mật khẩu không đúng")</script>';
            echo "<script>window.location.href='login.php';</script>";
            die();
        }else{
          $_SESSION['dangnhap1']=$taikhoan;
          header("Location:index.php");
              
        }
        
        
    }
?>

<html>
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
    .indigo-text{
        color: #10b571 !important;
    }
    .indigo{
        background-color: #17c77e !important;
    }
    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
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

<body>
    <main>
    <center>
      
      <div class="section"></div>

      <h5 class="indigo-text">Đăng nhập admin</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form action="" autocomplete="off" class="col s12" method="POST">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='user_id' id='user_id' />
                <label for='user_id'>Tên đăng nhập</label>
              </div>
            </div>
            
            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' id='password' />
                <label for='password'>Mật khẩu</label>
              </div>
              <label style='float: right;'>
                <!-- <a class='pink-text' style="color: #17c77e !important;" href='#!'><b>Quên mật khẩu</b></a> -->
              </label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='dangnhap' class='col s12 btn btn-large waves-effect indigo'>Đăng nhập</button>
              </div>
            </center>
          </form>
        </div>
      </div>
      <!-- <a href="register.php">Đăng ký</a> -->
    </center>

    <div class="section"></div>
    <div class="section"></div>
  </main>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</body>

</html>