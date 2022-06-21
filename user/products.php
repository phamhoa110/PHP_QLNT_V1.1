<?php
require 'config.php';
include("header1.php");
$id = $_GET['id'];
$sql_danhmuc = "SELECT * FROM danhmuc  ORDER BY MaDM DESC";
$query_danhmuc = mysqli_query($conn, $sql_danhmuc);

$sql_mocgia = "select * from mocgia ";
$query_mocgia = mysqli_query($conn, $sql_mocgia);
?>

<!doctype html>
<html class="no-js" lang="">

<body>

	<div id="tg-wrapper" class="tg-wrapper tg-haslayout">
		<!--************************************
				Inner Banner Start
		*************************************-->
		<div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bg_2.jpg">

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

							<!-- Sách -->

							<?php if (isset($_GET['search'])) include("timkiem.php");
							else include("main/product.php");
							?>

							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
								<aside id="tg-sidebar" class="tg-sidebar">



									<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Danh mục sản phẩm</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<?php while ($row_danhmuc = mysqli_fetch_array($query_danhmuc)) { ?>
													<li><a href="products.php?main=book&id=<?php echo $row_danhmuc['MaDM'] ?>">
															<?= $row_danhmuc['TenDM'] ?>
														</a></li>
												<?php } ?>
											</ul>
										</div>
									</div>

									<div class="tg-widget tg-catagories">
										<div class="tg-widgettitle">
											<h3>Mốc giá</h3>
										</div>
										<div class="tg-widgetcontent">
											<ul>
												<?php while ($row_mocgia = mysqli_fetch_array($query_mocgia)) { ?>
													<li><a href="timkiemtheogia.php?start=<?=$row_mocgia['start']?>&end=<?=$row_mocgia['end']?>&id=<?=$id?>">
															
																<?= $row_mocgia['end'] == 0 ? "Từ ".$row_mocgia['start'] : $row_mocgia['start'].' - '.$row_mocgia['end'] ?>
															
														</a></li>
												<?php } ?>
											</ul>
										</div>
									</div>

									<?php
									include("tuongtac.php")
									?>
								</aside>
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