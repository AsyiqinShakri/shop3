<? include "header.php"; ?>

<? $sql = "SELECT * FROM product WHERE ishomebanner = 1 AND ishide <> 1"; ?>
<? $rs = mq($sql); ?>

<!-- start banner Area -->
<section class="banner-area">
	<div class="container">
		<div class="row fullscreen align-items-center justify-content-start">
			<div class="col-lg-12">
				<div class="active-banner-slider">
					<? while ($r = mfa($rs)) { ?>
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h1><?= $r['name'] ?></h1>
									<p><?= $r['meta_desc'] ?></p>
									<div class="add-bag d-flex align-items-center" onclick="addToCart('<?= $r['id'] ?>', 1)">
										<a class="add-btn" href="javascript:void(0)"><span class="lnr lnr-cross"></span></a>
										<span class="add-text text-uppercase">Add to Bag</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="<?= $site_url . '/' . getimg($r['img1']) ?>" alt="">
								</div>
							</div>
						</div>
					<? } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->

<!-- start features Area -->
<section class="features-area section_gap">
	<div class="container">
		<div class="row features-inner">
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon1.png" alt="">
					</div>
					<h6>Swift Delivery</h6>
					<p>Fast Shipping on all order</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon2.png" alt="">
					</div>
					<h6>Return Policy</h6>
					<p>30 Days Refund. No question asked</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon3.png" alt="">
					</div>
					<h6>24/7 Support</h6>
					<p>No questions left unaswered</p>
				</div>
			</div>
			<!-- single features -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="single-features">
					<div class="f-icon">
						<img src="img/features/f-icon4.png" alt="">
					</div>
					<h6>Secure Payment</h6>
					<p>Safety first</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end features Area -->

<!-- start product Area -->
<section class="active-product-area section_gap">
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Latest Products</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<? $sql = "SELECT * FROM product WHERE ishide <> 1 AND islatest = 1"; ?>
				<? $rs = mq($sql); ?>
				<!-- single product -->
				<? while ($r = mfa($rs)) { ?>
					<div class="col-lg-3 col-md-6">
						<? $id = $r['id']; ?>
						<? $name = $r['name']; ?>
						<? $old_price = dfd($r['price2']); ?>
						<? $new_price = dfd($r['price']); ?>
						<? $img = $site_url . '/' . getimg($r['img1']); ?>
						<? $link = $site_url . '/product-single.php?name=' . urlencode($r['name']); ?>
						<? include "components/product-card.php" ?>
					</div>
				<? } ?>
			</div>
		</div>
	</div>
	<!-- single product slide -->
	<div class="single-product-slider">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>Upcoming Products</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore
							magna aliqua.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<? $sql = "SELECT * FROM product WHERE ishide <> 1 AND isupcoming = 1"; ?>
				<? $rs = mq($sql); ?>
				<!-- single product -->
				<? while ($r = mfa($rs)) { ?>
					<div class="col-lg-3 col-md-6">
						<? $id = $r['id']; ?>
						<? $name = $r['name']; ?>
						<? $old_price = dfd($r['price2']); ?>
						<? $new_price = dfd($r['price']); ?>
						<? $img = $site_url . '/' . getimg($r['img1']); ?>
						<? $link = $site_url . '/product-single.php?name=' . urlencode($r['name']); ?>
						<? include "components/product-card.php" ?>
					</div>
				<? } ?>
			</div>
		</div>
	</div>
</section>
<!-- end product Area -->

<!-- Start exclusive deal Area -->
<section class="exclusive-deal-area">
	<div class="container-fluid">
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-6 exclusive-left">
				<div class="row clock_sec clockdiv" id="clockdiv">
					<div class="col-lg-12">
						<h1>Exclusive Hot Deal Ends Soon!</h1>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>
					<div class="col-lg-12">
						<div class="row clock-wrap">
							<div class="col clockinner1 clockinner">
								<h1 class="days">150</h1>
								<span class="smalltext">Days</span>
							</div>
							<div class="col clockinner clockinner1">
								<h1 class="hours">23</h1>
								<span class="smalltext">Hours</span>
							</div>
							<div class="col clockinner clockinner1">
								<h1 class="minutes">47</h1>
								<span class="smalltext">Mins</span>
							</div>
							<div class="col clockinner clockinner1">
								<h1 class="seconds">59</h1>
								<span class="smalltext">Secs</span>
							</div>
						</div>
					</div>
				</div>
				<a href="" class="primary-btn">Shop Now</a>
			</div>
			<div class="col-lg-6 p-0 exclusive-right">
				<div class="active-exclusive-product-slider">
					<? $sql = "SELECT * FROM product WHERE ishide <> 1 AND isupcoming = 1"; ?>
					<? $rs = mq($sql); ?>
					<!-- single product -->
					<? while ($r = mfa($rs)) { ?>
						<!-- single exclusive carousel -->
						<div class="single-exclusive-slider">
							<img class="img-fluid mx-auto" src="<?= $site_url . '/' . getimg($r['img1']) ?>" alt="">
							<div class="product-details">
								<div class="price">
									<h6><?= $currency ?><?= dfd($r['price']) ?></h6>
									<? if ($r['price2'] > 0 && $r['price2'] > $r['price']) { ?>
										<h6 class="l-through"><?= $currency ?><?= dfd($r['price2']) ?></h6>
									<? } ?>
								</div>
								<h4><?= $r['name'] ?></h4>
								<div class="add-bag d-flex align-items-center justify-content-center">
									<a class="add-btn" href=""><span class="ti-bag"></span></a>
									<span class="add-text text-uppercase">Add to Bag</span>
								</div>
							</div>
						</div>
					<? } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End exclusive deal Area -->

<!-- Start brand Area -->
<section class="brand-area section_gap">
	<div class="container">
		<div class="row">
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/1.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/2.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/3.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/4.png" alt="">
			</a>
			<a class="col single-img" href="#">
				<img class="img-fluid d-block mx-auto" src="img/brand/5.png" alt="">
			</a>
		</div>
	</div>
</section>
<!-- End brand Area -->

<? include "product-related.php" ?>

<? include "footer.php"; ?>