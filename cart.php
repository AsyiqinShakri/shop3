<? $breadcrumb = 1; ?>
<? $page = "Shopping Cart"; ?>
<? include "admin/__settings.php"; ?>
<? include "header.php"; ?>
<? $total = $discount = $shipping = 0; ?>
<!--================Cart Area =================-->
<section class="cart_area">
	<div class="container">
		<div class="cart_inner">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th></th>
							<th scope="col" width="70%">Product</th>
							<th scope="col" width="10%">Price</th>
							<th scope="col" width="10%">Quantity</th>
							<th scope="col" width="10%" class="text-right">Total</th>
						</tr>
					</thead>
					<tbody>
						<? foreach ($cart as $item) { ?>
							<? $id = $item['id']; ?>
							<? $name = $item['name']; ?>
							<? $img = $item['img']; ?>
							<? $price = $item["price"]; ?>
							<? $qty = $item["qty"]; ?>
							<? $maxQty = $item["maxQty"]; ?>
							<? $total += ($price * $qty); ?>
							<? include "components/cart-item.php" ?>
						<? } ?>
					</tbody>
					<tfoot>
						<tr class="bottom_button">
							<td colspan="5" class="">
								<div class="cupon_text d-flex align-items-center justify-content-md-end">
									<input type="text" placeholder="Coupon Code">
									<a class="primary-btn" href="#">Apply</a>
								</div>
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
			<hr>
			<div class="row justify-content-end">
				<div class="col-auto">
					<h5>Subtotal</h5>
				</div>
				<div class="col col-md-5 text-right">
					<h5 class="total pr-3"><?= $currency ?><span class="cart-total"><?= dfd($total) ?></span></h5>
				</div>
			</div>
			<hr>
			<div class="row justify-content-end">
				<div class="col-auto">
					<h5>Discount</h5>
				</div>
				<div class="col col-md-5 text-right">
					<h5 class="total pr-3"><?= $currency ?><span class="cart-discount"><?= dfd($discount) ?></span></h5>
				</div>
			</div>
			<hr>
			<div class="row shipping_area justify-content-end">
				<div class="col-auto text-right">
					<h5 class="">Shipping</h5>
				</div>
				<div class="col col-md-5 text-right">
					<div class="shipping_box">
						<ul class="list">
							<li class="self-pick active">Self Pick Up</a></li>
							<li class="delivery">Premium Insured Delivery: <?= $currency ?><span class="cart-shipping-fee"><?= dfd($shipping) ?></span></li>
						</ul>
						<!-- <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
						<select class="shipping_select" id="country">
						</select> -->
						<div class="">
							<select class="shipping_select">
								<option value="">Select a State</option>
								<? for ($i = 1; $i < sizeof($lklist["state"]); $i++) { ?>
									<option value="<?= $i ?>"><?= $lklist["state"][$i] ?></option>
								<? } ?>
							</select>
						</div>
						<!-- <input type="text" placeholder="Postcode/Zipcode"> -->
					</div>
				</div>
			</div>
			<hr>
			<div class="row out_button_area">
				<div class="col-12 col-md-auto">
					<div class="checkout_btn_inner d-flex align-items-center">
						<a class="gray_btn" href="#">Continue Shopping</a>
					</div>
				</div>
				<div class="col-12 col-md-auto text-md-right">
					<div class="checkout_btn_inner d-flex align-items-center">
						<a class="primary-btn <?= sizeof($cart) == 0 ? 'genric-btn default text-muted disabled' : '' ?>" href="#">Proceed to checkout</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Cart Area =================-->

<? include "footer.php"; ?>
<script>
	$(".shipping_box .list li").click(function(e) {
		$(".shipping_box .list li").removeClass("active");
		$(this).addClass("active");
	});


	$(".shipping_select").on("select2:select", function(e) {
		$(".shipping_box .list li").removeClass("active");
		$(".delivery").addClass("active");

		let val = parseFloat(e.target.value);
		val += 1;
		qs(".cart-shipping-fee").innerHTML = val.toFixed(2);
	});
</script>