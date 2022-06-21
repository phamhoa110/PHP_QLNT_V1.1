<?php

require 'config.php';
include("header1.php");

?>

<!doctype html>
<html class="no-js" lang="">



<body class="tg-home tg-homeone">
	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bg_1.jpg">
		</div>
		<!--************************************
				Inner Banner End
		*************************************-->

		<!--************************************
					Best Selling Start
			*************************************-->
		<section class="tg-sectionspace tg-haslayout">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="tg-sectionhead">
							<h2><span>Khách hàng yêu mến</span>Sản phẩm Nổi bật</h2>
							<a class="tg-btn" href="products.php">Xem tất cả</a>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="tg-bestsellingbooksslider" class="tg-bestsellingbooksslider tg-bestsellingbooks owl-carousel">

							<?php

							$sql = "SELECT * FROM sanpham ";

							$result = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($result)) {
							?>

								<div class="item">

									<form action="themgiohang.php" method="POST">
										<div class="tg-postbook">
											<figure class="tg-featureimg">
												<div class="tg-bookimg">
													<div class="tg-frontcover"><img src="images\books\<?= $row['Anh'] ?>" alt="image description"></div>
													<div class="tg-backcover"><img src="images\books\<?= $row['Anh'] ?>" alt="image description"></div>
												</div>

											</figure>
											<div class="tg-postbookcontent">
												<ul class="tg-bookscategories">
													

												</ul>
												<input type="hidden" name="MaSP" value="<?=$row['MaSP']?>">
												<div class="tg-booktitle">
													<h3><a href="productdetail.php?MaSP=<?php echo $row['MaSP'] ?>"><?php echo $row['TenSP'] ?> </a></h3>
												</div>
												<span class="tg-bookwriter"><a href="javascript:void(0);"> <?php echo $row['DonGia'] ?></a></span>

												<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
													<button type="submit" class="themgiosach" name="themgiosach"><i class="fa fa-shopping-basket"></i>
														<em>Thêm vào giỏ</em></button>
												</a>
											</div>
										</div>
										<div class="tg-postbook">
											<figure class="tg-featureimg">
												<div class="tg-bookimg">
													<div class="tg-frontcover"><img src="images\books\<?= $row['Anh'] ?>" alt="image description"></div>
													<div class="tg-backcover"><img src="images\books\<?= $row['Anh'] ?>" alt="image description"></div>
												</div>

											</figure>
											<div class="tg-postbookcontent">
												<ul class="tg-bookscategories">
													
												</ul>
												<input type="hidden" name="MaSP" value="<?=$row['MaSP']?>">
												<div class="tg-booktitle">
													<h3><a href="productdetail.php?MaSP=<?php echo $row['MaSP'] ?>"><?php echo $row['TenSP'] ?> </a></h3>
												</div>
												<span class="tg-bookwriter"><a href="javascript:void(0);"> <?php echo $row['DonGia'] ?></a></span>


												<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
													<button type="submit" class="themgiosach" name="themgiosach"><i class="fa fa-shopping-basket"></i>
														<em>Thêm vào giỏ</em></button>
												</a>
											</div>
										</div>
								</div>

								</form>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
	</div>
	</section>

	<!--************************************
					Featured Item End
			*************************************-->
	<?php
	?>
	<!--************************************
					Collection Count Start
			*************************************-->
	<section class="tg-parallax tg-bgcollectioncount tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bg_2.jpg">
		<div class="tg-sectionspace tg-collectioncount tg-haslayout">
			<div class="container">
				<div class="row">
					<div id="tg-collectioncounters" class="tg-collectioncounters">
						<div class="tg-collectioncounter tg-drama">
							<div class="tg-collectioncountericon">
								<i class="icon-envelope"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Kệ và giá</h2>
								<?php
								$sql_BanGhe = "select count(MaSP) as SoSanPham from sanpham inner join danhmuc on sanpham.MaDM = danhmuc.MaDM where danhmuc.TenDM = 'Kệ và giá';";
								$banghe = mysqli_fetch_assoc(mysqli_query($conn, $sql_BanGhe));
								?>
								<h3 data-from="0" data-to="<?= $banghe['SoSanPham'] ?>" data-speed="1000" data-refresh-interval="50">
									<?php

									echo $banghe['SoSanPham'];
									?>
								</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-horror">
							<div class="tg-collectioncountericon">
								<i class="icon-envelope"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Tủ</h2>
								<?php
								$sql_Tu = "select count(MaSP) as SoSanPham from sanpham inner join danhmuc on sanpham.MaDM = danhmuc.MaDM where danhmuc.TenDM = 'Tủ';";
								$tu = mysqli_fetch_assoc(mysqli_query($conn, $sql_Tu));
								?>
								<h3 data-from="0" data-to="<?= $tu['SoSanPham'] ?>" data-speed="1000" data-refresh-interval="50">
									<?php

									echo $tu['SoSanPham'];
									?>
								</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-romance">
							<div class="tg-collectioncountericon">
								<i class="icon-envelope"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Bàn</h2>
								<?php
								$sql_ban = "select count(MaSP) as SoSanPham from sanpham inner join danhmuc on sanpham.MaDM = danhmuc.MaDM where danhmuc.TenDM = 'Bàn';";
								$ban = mysqli_fetch_assoc(mysqli_query($conn, $sql_ban));
								?>
								<h3 data-from="0" data-to="<?= $ban['SoSanPham'] ?>" data-speed="1000" data-refresh-interval="50">
									<?php

									echo $ban['SoSanPham'];
									?>
								</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-fashion">
							<div class="tg-collectioncountericon">
								<i class="icon-envelope"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Ghế</h2>
								<?php
								$sql_Ghe = "select count(MaSP) as SoSanPham from sanpham inner join danhmuc on sanpham.MaDM = danhmuc.MaDM where danhmuc.TenDM = 'Ghế';";
								$ghe = mysqli_fetch_assoc(mysqli_query($conn, $sql_Ghe));
								?>
								<h3 data-from="0" data-to="<?= $ghe['SoSanPham'] ?>" data-speed="1000" data-refresh-interval="50">
									<?php

									echo $ghe['SoSanPham'];
									?>
								</h3>
							</div>
						</div>
						<div class="tg-collectioncounter tg-fashion">
							<div class="tg-collectioncountericon">
								<i class="icon-envelope"></i>
							</div>
							<div class="tg-titlepluscounter">
								<h2>Gương</h2>
								<?php
								$sql_Guong = "select count(MaSP) as SoSanPham from sanpham inner join danhmuc on sanpham.MaDM = danhmuc.MaDM where danhmuc.TenDM = 'Gương';";
								$guong = mysqli_fetch_assoc(mysqli_query($conn, $sql_Guong));
								?>
								<h3 data-from="0" data-to="<?= $guong['SoSanPham'] ?>" data-speed="1000" data-refresh-interval="50">
									<?php

									echo $guong['SoSanPham'];
									?>
								</h3>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--************************************
					Collection Count End
			*************************************-->
	
	<!--************************************
					Testimonials Start
			*************************************-->

	<!--************************************
					Testimonials End
			*************************************-->



	</main>
	<!--************************************
				Main End
		*************************************-->
	</div>

	<?php include("footer.php"); ?>
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