<?php
include_once("header1.php");
?>

<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
    <!--************************************
        Inner Banner Start
    *************************************-->
    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bg_5.jpg">

    </div>
    <!--************************************
        Inner Banner End
    *************************************-->

    <!--************************************
        Main Start
    *************************************-->
    <main id="tg-main" class="tg-main tg-haslayout">
        <!--************************************
          News Grid Start
      *************************************-->
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div id="tg-twocolumns" class="tg-twocolumns">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <?php
                            if (isset($_SESSION['cart'])) {
                             
                            }
                            ?>
                            <div>
                                <h3>Danh sách sản phẩm đã đặt hàng</h3>
                                <table class="styled-table">
                                    <thead>

                                        <tr>
                                            <th>STT</th>
                                            <th>Tên hàng</th>
                                            <th>Ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Đơn giá</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //kết nối csdl
                                        include_once('config.php');
                                        //Lấy id hóa đơn
                                        $id = $_GET['id'];
                                        //Truy vấn hảng chi tiết hóa đơn
                                        $sql = "SELECT OD.soluong,OD.dongia,I.TenSP,I.Anh FROM tblorderdetails AS OD INNER JOIN sanpham AS I ON OD.sanphamid = I.MaSP WHERE OD.orderid = $id";
                                        $rs = mysqli_query($conn, $sql);
                                        $count = 0;
                                        while ($row = mysqli_fetch_assoc($rs)) {
                                            $count++;
                                        ?>
                                            <tr class="active-row">
                                                <td><?= $count ?></td>
                                                <td><?= $row['TenSP'] ?></td>
                                                <td><img src="images/books/<?= $row['Anh'] ?>"></td>
                                                <td><?= $row['soluong'] ?></td>
                                                <td><?= $row['dongia'] ?></td>
                                                <td><?= $row['dongia'] * $row['soluong'] ?></td>
                                            </tr>

                                        <?php
                                        }
                                        mysqli_close($conn);
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!--************************************
          News Grid End
      *************************************-->
    </main>
    <!--************************************
        Main End
    *************************************-->

    <?php include("footer.php") ?>
</div>
<!--************************************
      Wrapper End
  *************************************-->
<script src="js/vendor/jquery-library.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.vide.min.js"></script>
<script src="js/countdown.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/parallax.js"></script>
<script src="js/countTo.js"></script>
<script src="js/appear.js"></script>
<script src="js/gmap3.js"></script>
<script src="js/main.js"></script>
</body>

</html>