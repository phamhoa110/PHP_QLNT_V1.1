<?php

include("config.php");
if (isset($_GET['search']) && !empty($_GET['search'])) {
	$key = $_GET['search'];
	$sql_pro = "SELECT MaSP,TenDM , Anh ,TenSP, DonGia from sanpham inner join danhmuc on sanpham.MaDM = danhmuc.MaDM
		WHERE UPPER(sanpham.TenSP) LIKE UPPER('%$key%') ";
}


$query_tk =  mysqli_query($conn, $sql_pro);


?>

<div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
	<div id="tg-content" class="tg-content">
		<div class="tg-products">
			<div class="tg-sectionhead">
				<h2>Từ khóa tìm kiếm : <?php if (isset($_GET['search'])) echo $_GET['search'] ?> </h2>
			</div>

			<div class="tg-productgrid">

				<?php
			
				while ($row = mysqli_fetch_array($query_tk)) {
				?>

					<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
						<form action="themgiohang.php" method="post">
							<div class="tg-postbook">
								<figure class="tg-featureimg">
									<div class="tg-bookimg">
										<div class="tg-frontcover"><img src="images\books\<?php echo $row['Anh'] ?>" alt="image description"></div>
										<div class="tg-backcover"><img src="images\books\<?php echo $row['Anh'] ?>" alt="image description"></div>
									</div>

								</figure>

								<div class="tg-postbookcontent">
									<ul class="tg-bookscategories">
										<li><a href="javascript:void(0);"><?php echo $row['TenDM'] ?></a></li>
									</ul>
									<div class="tg-booktitle">
										<h3><a href="productdetail.php?MaSP=<?= $row['MaSP'] ?>"> <?php echo $row['TenSP'] ?> </a></h3>
									</div>
									<span class="tg-bookwriter"><a href="javascript:void(0);"> <?php echo $row['DonGia'] ?></a></span>
								
									<input type="hidden" name="MaSP" value="<?= $row['MaSP'] ?>">

									<a class="tg-btn tg-btnstyletwo" href="javascript:void(0);">
										<button type="submit" class="themgiosach" name="themgiosach"><i class="fa fa-shopping-basket"></i>
											<em>Thêm vào giỏ</em></button>
									</a>
								</div>
							</div>
						</form>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>
</div>