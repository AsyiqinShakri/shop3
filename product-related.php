<!-- Start related-product Area -->
<section class="related-product-area section_gap_bottom">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 text-center">
				<div class="section-title">
					<h1>Deals of the Week</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
						magna aliqua.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9">
				<div class="row">
					<? $sql = "SELECT * FROM product WHERE ishide <> 1 AND isdeal = 1"; ?>
					<? $rs = mq($sql); ?>
					<? while ($r = mfa($rs)) { ?>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<? $name = $r['name']; ?>
							<? $old_price = $r['price2']; ?>
							<? $new_price = $r['price']; ?>
							<? $img = $site_url . '/' . getimg($r['img1']); ?>
							<? $link = $site_url . '/product-single.php?name=' . urlencode($r['name']); ?>
							<? include "components/product-deal.php"; ?>
						</div>
					<? } ?>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ctg-right">
					<a href="#" target="_blank">
						<img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="">
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End related-product Area -->