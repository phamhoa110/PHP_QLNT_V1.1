<?php
include("header1.php");


?>

<!doctype html>
<html class="no-js" lang="">
<meta charset="utf-8">

<body>

    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
        <!--************************************
				Inner Banner Start
		*************************************-->
        <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bg_6.jpg">

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

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <div>
                                
                                    <table class="styled-table">
                                        <thead>

                                            <tr>
                                                <th>STT</th>
                                              <!--   <th>Mã sản phẩm</th> -->
                                                <th>Tên sản phẩm</th>
                                                <th>Hình ảnh</th>
                                                <th>Số lượng</th>
                                                <th>Đơn giá</th>
                                                <th>Tổng tiền</th>
                                                <th>Quản lý</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['cart'])) {
                                                $stt = 0;
                                                
                                                foreach ($_SESSION['cart'] as $cart_item) {
                                                    $stt++;
                                                    $tong=$cart_item['soluong']*$cart_item['DonGia'];
                                                    
                                                    //if ($sl <= 3) {
                                            ?>
                                                    <tr class="active-row">
                                                        <td> <?php echo $stt ?> </td>
                                                       <!--  <td> <?php echo $cart_item['MaSP'] ?> </td> -->
                                                        <td> <?php echo $cart_item['TenSP'] ?> </td>
                                                        <td> <img src=" images/books/<?= $cart_item['Anh'] ?>" alt="image description"> </td>
                                                        <td>
                                                            <a href="themgiohang.php?cong=<?php echo $cart_item['MaSP'] ?>">+</a>

                                                            <?php echo $cart_item['soluong'] ?>
                                                            <a href="themgiohang.php?tru=<?php echo $cart_item['MaSP'] ?>">-</a>
                                                        </td>
                                                        <td><?php echo $cart_item['DonGia'] ?></td>
                                                        <td><?php echo $tong ?></td>
                                                        <td><a href="themgiohang.php?xoa=<?php echo $cart_item['MaSP'] ?>">Xóa </a></td>
                                                    </tr>

                                                <?php
                                                    
                                                }
                                             
                                                ?>
                                            <?php
                                            } else { ?>
                                                <tr>
                                                    <td colspan="6">
                                                        <h5 style="color: red;">Hiện tại giỏ hàng trống</h5>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            <tr class="active-row">
                                                <td colspan="6"><span style="font-size: 18px;">Tổng tiền</span></td>
                                                <td>
                                                    <?php
                                                if (isset($_SESSION['cart'])) {
                                                $tongall=0;
                                                foreach ($_SESSION['cart'] as $cart_item) {
                                                    $tong=$cart_item['soluong']*$cart_item['DonGia'];
                                                    $tongall+=$tong;
                                                   
                                                }
                                                 
                                                echo $tongall;
                                            }
                                                    ?>

                                                </td>
                                            </tr>
                                            <td colspan="6">
                                                <a class="delete" href="themgiohang.php?xoatatca=1">XÓA TẤT CẢ</a>
                                            </td>
                                        </tbody>
                                    </table>

                               
                                <a href="thongtindonhang.php"> <input type="submit" name="borrow" class="borrow" value="Đặt hàng"></a>
                                <a href="index1.php"><input type="submit" class="borrow" value="Mua tiếp"></a>
                                <a href="danhsachdh.php"><input type="submit" class="borrow" value="Xem đơn đặt hàng"></a>
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