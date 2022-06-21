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

                        <?php
                        //include("tuongtac.php") 
                        ?>
                        </aside>
                    </div> 

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <div>
                            <h3>Danh sách đơn đặt hàng</h3>
                            <table class="styled-table">
                                <thead>

                                    <tr>
                                        <th>STT</th>
                                        <th>Ngày đặt</th>
                                        <th>Tổng tiền</th>
                                        <th>Trạng thái</th>
                                        <th>Hoạt động</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //kết nối csdl
                                    //session_start();
                                    include_once('config.php');
                                    if(isset($_SESSION['dangnhap']))
                                    $id = $_SESSION['userid'];

                                    //Truy vấn hảng tblcategory để lấy các bản ghi
                                    $sql = "SELECT * FROM tblorder Where user_id='$id'";
                                    $rs = mysqli_query($conn, $sql);
                                    $count = 0;
                                    while ($row = mysqli_fetch_assoc($rs)) 
                                    {

                                         $count++;
                                    ?>
                                        <tr class="active-row">
                                            <td><?= $count ?></td>
                                            <td><?= $row['odate'] ?></td>
                                            
                                            <td>
                                                <?php
                                                    $idorder = $row['id'];//mã đơn hàng
                                                     $rsTong = mysqli_query($conn, "SELECT * FROM tblorderdetails Where orderid='$idorder'");
                                                     $tong =0;
                                                    while($r = mysqli_fetch_assoc($rsTong))
                                                    {
                                                        $tong += $r['soluong']*$r['dongia'];
                                                    }
                                                    echo $tong;
                                                ?>
                                             </td>
                                             <td>
                                                <?php
                                                    if ($row['status']==0)
                                                        echo "Chờ xác nhận!";
                                                    else
                                                        echo "Đặt hàng thành công!";
                                                ?>
                                            </td>
                                            <td>
                                               
                                                <a href="chitietdonhang.php?id=<?= $row['id'] ?>">Chi tiết</a>
                                                 <?php
                                                    if ($row['status']==0)
                                                    {
                                                ?>
                                                    <a href="delete_order.php?id=<?= $row['id'] ?>" onclick="return confirm('Bạn có chắc chắn Hủy hóa đơn này không?');">Hủy</a>
                                                <?php
                                                    }
                                                ?>
                                            </td>

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