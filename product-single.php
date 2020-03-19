<? require_once "common.php"; ?>
<? $breadcrumb = 1; ?>
<? $page = frm("name") ? frm("name") : $page; ?>
<? $sql = "SELECT p.id, p.name, p.price, p.qty, p.img1, p.img2, p.img3, p.meta_desc, p.data, c.name as cname FROM product p, category c WHERE p.name = '" . $page . "' AND p.cat_id = c.id"; ?>
<? $p = mfa(mq($sql)); ?>
<? include "header.php"; ?>

<!--================Single Product Area =================-->
<div class="product_image_area">
	<div class="container">
		<div class="row s_product_inner">
			<div class="col-lg-6">
				<div class="s_Product_carousel">
					<? for ($i = 1; $i <= 3; $i++) { ?>
						<? if ($p['img' . $i] != "") { ?>
							<? $img = $site_url . '/' . getimg($p['img' . $i]); ?>
							<div class="single-prd-item">
								<img class="img-fluid" src="<?= $img ?>" alt="<?= $p['name'] ?>">
							</div>
						<? } ?>
					<? } ?>
				</div>
			</div>
			<div class="col-lg-5 offset-lg-1">
				<div class="s_product_text">
					<h3><?= $p['name'] ?></h3>
					<h2><?= $currency ?><?= dfd($p['price']) ?></h2>
					<ul class="list">
						<li><a class="active" href="javascript:void(0)"><span>Category</span> : <?= $p['cname'] ?></a></li>
						<li><a href="javascript:void(0)"><span>Availibility</span> : <?= $p['qty'] ?> left </a></li>
					</ul>
					<p><?= $p['meta_desc'] ?></p>
					<div class="product_count">
						<label for="qty">Quantity:</label>
						<input type="number" name="qty" id="qty" maxlength="12" value="1" title="Quantity:" class="input-text qty">
						<button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty < parseInt('<?= $p['qty'] ?>') ) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
						<button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 1 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
					</div>
					<div class="card_area d-flex align-items-center">
						<a class="primary-btn" href="#">Add to Cart</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
	<div class="container">
		<ul class="nav nav-tabs" id="myTab" role="tablist">
			<li class="nav-item">
				<a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
				<?= $p['data'] ?>
			</div>
			<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
				<div class="row">
					<div class="col">
						<? include "product-review.php"; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Product Description Area =================-->

<? include "product-related.php" ?>
<? include "footer.php"; ?>