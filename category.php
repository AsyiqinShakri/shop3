<? $breadcrumb =  1; ?>
<? $page =  "Category"; ?>
<? require_once "common.php"; ?>
<? $page = frm("category") ? frm("category") : $page ?>
<? include "header.php" ?>
<?
$pg = frm("pg") == "" ? 1 : frm("pg");

$w = "";
$w .= " AND ishide <> 1 ";
$w .= frm("search") == "" ? "" : " name LIKE '%" . frm("search") . "%'";

$o = " ";
$o .= frm("order") == "" ? " ORDER BY price ASC " : frm("order");

$limit = frm("limit") == "" ? 1 : frm("limit");

$l = " ";
$l .= " LIMIT " . ($pg - 1) . ", " . $limit;

$tsql = "SELECT COUNT(*) as count FROM product WHERE id > 0 " . $w . $o;
$tr = mfa(mq($tsql));
$total = $tr['count'];

$pages = ceil($total / $limit);
$more_pages = 2;

$start      = (($pg - $more_pages) > 0) ? $pg - $more_pages : 1;
$end        = (($pg + $more_pages) < $pages) ? $pg + $more_pages : $pages;

$sql = "SELECT * FROM product WHERE id > 0 " . $w . $o . $l;
$products = mq($sql);

?>

<div class="container my-5">
	<div class="row">
		<div class="col-xl-3 col-lg-4 col-md-5">
			<? include "category-sidebar.php"; ?>

		</div>
		<div class="col-xl-9 col-lg-8 col-md-7">
			<? include "product-filterbar.php"; ?>
			<!-- Start Best Seller -->
			<section class="lattest-product-area pb-40 category-list">
				<div class="row">
					<? while ($p = mfa($products)) { ?>
						<? $id = $p['id']; ?>
						<? $name = $p["name"]; ?>
						<? $img = $site_url . '/' . getimg($p["img1"]); ?>
						<? $link = $site_url . '/product-single.php?name=' . rawurlencode($p["name"]); ?>
						<? $old_price = $p["price2"]; ?>
						<? $new_price = $p["price"]; ?>
						<!-- single product -->
						<div class="col-lg-4 col-md-6">
							<? include "components/product-card.php"; ?>
						</div>
					<? } ?>
				</div>
			</section>
			<!-- End Best Seller -->
			<? include "product-filterbar.php"; ?>
		</div>
	</div>
</div>

<!-- Start related-product Area -->
<section class="related-product-area section_gap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 text-center">
				<div class="section-title">
					<h1>Deals of the Week</h1>
					<p>
						Lorem ipsum dolor sit amet, consectetur
						adipisicing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua.
					</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-9">
				<div class="row">
					<? for ($i = 0; $i < sizeof($product); $i++) { ?>
						<div class="col-lg-4 col-md-4 col-sm-6 mb-20">
							<? $name = $product[$i]['name']; ?>
							<? $old_price = $product[$i]['old_price']; ?>
							<? $new_price = $product[$i]['new_price']; ?>
							<? $img = $site_url . '/' . getimg($product[$i]['img']); ?>
							<? $link = $site_url . '/product-single.php?name=' . urlencode($product[$i]['name']); ?>
							<? include "components/product-deal.php"; ?>
						</div>
					<? } ?>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="ctg-right">
					<a href="#" target="_blank">
						<img class="img-fluid d-block mx-auto" src="img/category/c5.jpg" alt="" />
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End related-product Area -->


<? include "footer.php" ?>
<script>
	//----- Active No ui slider --------//
	$(function() {

		if (document.getElementById("price-range")) {

			var nonLinearSlider = document.getElementById('price-range');

			noUiSlider.create(nonLinearSlider, {
				connect: true,
				behaviour: 'tap',
				start: [500, 4000],
				range: {
					// Starting at 500, step the value by 500,
					// until 4000 is reached. From there, step by 1000.
					'min': [0],
					'10%': [500, 500],
					'50%': [4000, 1000],
					'max': [10000]
				}
			});


			var nodes = [
				document.getElementById('lower-value'), // 0
				document.getElementById('upper-value') // 1
			];

			// Display the slider value and how far the handle moved
			// from the left edge of the slider.
			nonLinearSlider.noUiSlider.on('update', function(values, handle, unencoded, isTap, positions) {
				nodes[handle].innerHTML = values[handle];
			});

		}

	});
</script>