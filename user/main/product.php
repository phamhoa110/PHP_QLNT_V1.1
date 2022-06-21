<?php
	include("config.php");
	if (!isset($_GET['id'])) {

		$sql_pro = "SELECT* FROM sanpham WHERE TrangThai ='1'";

	 } else {

		$id = $_GET['id'];
		$sql_pro = " SELECT* FROM sanpham where MaDM = '$id' AND TrangThai ='1'";
		
	 }
	
	$a = mysqli_query($conn, $sql_pro);

	$query_pro = mysqli_query($conn, $sql_pro);
?>

<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
	<div id="tg-content" class="tg-content">
		<div class="tg-products">
			<div class="tg-sectionhead">
				<h2><span>Tất cả sản phẩm</span>
					
				</h2>
			</div>

			<div class="tg-productgrid">
				<?php
				while ($row = mysqli_fetch_array($query_pro)) {
				?>
					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
						<div class="tg-postbook">
							<form action="themgiohang.php" method="POST">
								<figure class="tg-featureimg">
									<div class="tg-bookimg">
										<div class="tg-frontcover"><img src="images\books\<?php echo $row['Anh'] ?>" alt="image description"></div>
										<div class="tg-backcover"><img src="images\books\<?php echo $row['Anh'] ?>" alt="image description"></div>
									</div>

								</figure>
								<div class="tg-postbookcontent">
									<ul class="tg-bookscategories">
										<li></li>
									</ul>
									<div class="tg-booktitle">
										<h3><a href="productdetail.php?MaSP=<?php echo $row['MaSP'] ?>"><?php echo $row['TenSP'] ?> </a></h3>
									</div>
									<span class="tg-bookwriter">Giá : <a href="javascript:void(0);"> <?php echo $row['DonGia'] ?></a></span>
									
									<input type="hidden" name="MaSP" value="<?= $row['MaSP'] ?>">
									<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
										<button type="submit" class="themgiosach" name="themgiosach"><i class="fa fa-shopping-basket"></i>
											<em>Thêm vào giỏ</em></button>
									</a>
								</div>
							</form>
						</div>
					</div>
				<?php 
			} 
			?>

			</div>
		</div>
	</div>
</div>