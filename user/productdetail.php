<?php
include("header1.php");
$id = $_GET['MaSP'];
$sql_chitiet = "SELECT *  FROM sanpham INNER JOIN danhmuc on sanpham.MaDM=danhmuc.MaDM WHERE sanpham.MaSP=$id";
$query_chitiet = mysqli_query($conn, $sql_chitiet);
?>

<!doctype html>
<html class="no-js" lang="zxx">


<body>

	<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-07.jpg">

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
						<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
							<div id="tg-content" class="tg-content">
								<div class="tg-productdetail">
									<div class="row">
										<?php
										while ($row = mysqli_fetch_array($query_chitiet)) {
										?>
											<form action="themgiohang.php" method="POST">
												<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

													<div class="tg-postbook">
														<figure class="tg-featureimg"><img src="images\books\<?= $row['Anh'] ?>" alt="image description"></figure>
														<div class="tg-postbookcontent">
															<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
																<button type="submit" class="themgiosach" name="themgiosach"><i class="fa fa-shopping-basket"></i>
																	<em>Thêm vào giỏ</em></button>

															</a>
														</div>

													</div>

												</div>
												<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
													<div class="tg-productcontent">

														<ul class="tg-bookscategories">
															<li><a href="javascript:void(0);"><?php echo $row['TenSP'] ?></a></li>
														</ul>
														<div class="tg-booktitle">
															<h3>Danh mục: <?php echo $row['TenDM'] ?></h3>
														</div>
														<div class="tg-booktitle">
															<h3>Giá: <?php echo $row['DonGia'] ?></h3>
														</div>
														
														<input type="hidden" name="MaSP" value="<?= $row['MaSP'] ?>">
														<span class="tg-bookwriter">Kích thước: <a href="javascript:void(0);"><?php echo $row['KichThuoc'] ?></a></span>
														<span class="tg-bookwriter">Màu sắc:
															<select name="mausac" class="form-control" style="width: 300px;">
																<option value="unselect">-------------Chọn màu sắc---------------</option>
																<?php
																$sql_MauSac = "SELECT * from  mausac";
																$query_MauSac = mysqli_query($conn, $sql_MauSac);
																while ($row_MauSac = mysqli_fetch_assoc($query_MauSac)) {
																?>
																	<option <?php
																			if ($row['MaMau'] == $row_MauSac['MaMau']) {
																				echo "selected";
																			}
																			?> value="<?= $row_MauSac['MaMau'] ?>"><?= $row_MauSac['TenMau'] ?></option>
																<?php
																}
																?>
															</select>

														</span>
														<span class="tg-bookwriter">Trọng lượng: <a href="javascript:void(0);"><?php echo $row['TrongLuong'] ?></a></span>
														<span class="tg-bookwriter">Chất liệu: <a href="javascript:void(0);"><?php echo $row['ChatLieu'] ?></a></span>

														<div class="tg-description">
															<?php echo $row['ChiTiet'] ?>
														</div>
														<div class="tg-share">
															<span>Share:</span>
															<ul class="tg-socialicons">
																<li class="tg-facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
																<li class="tg-twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
																<li class="tg-linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
																<li class="tg-googleplus"><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
																<li class="tg-rss"><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
															</ul>
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