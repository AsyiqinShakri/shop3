<? $breadcrumb = 1; ?>
<? $page = "Shopping Cart"; ?>
<? include "header.php"; ?>

<!--================Cart Area =================-->
<section class="cart_area">
	<div class="container">
		<div class="cart_inner">
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col" width="70%">Product</th>
							<th scope="col" width="10%">Price</th>
							<th scope="col" width="10%">Quantity</th>
							<th scope="col" width="10%">Total</th>
						</tr>
					</thead>
					<tbody>
						<? for ($i = 0; $i < sizeof($cart); $i++) { ?>
							<? $name = $cart[$i]['name']; ?>
							<? $img = $site_url . '/' . getimg($cart[$i]['img']); ?>
							<? $price = $cart[$i]["price"]; ?>
							<? $qty = $cart[$i]["qty"]; ?>
							<tr>
								<td>
									<div class="media">
										<div class="d-flex">
											<img src="<?= $img ?>" alt="">
										</div>
										<div class="media-body">
											<p><?= $name ?></p>
										</div>
									</div>
								</td>
								<td>
									<h5><?= $currency ?><?= $price ?></h5>
								</td>
								<td>
									<div class="product_count">
										<input type="text" name="qty" id="qty" maxlength="12" value="<?= $qty ?>" title="Quantity:" class="input-text qty">
										<button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
										<button onclick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) && qty > 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
									</div>
								</td>
								<td>
									<h5><?= $currency ?><?= dfd($qty * $price) ?></h5>
								</td>
							</tr>
						<? } ?>
						<tr class="bottom_button">
							<td colspan="2">
								<a class="gray_btn" href="#">Update Cart</a>
							</td>
							<td colspan="2">
								<div class="cupon_text d-flex align-items-center">
									<input type="text" placeholder="Coupon Code">
									<a class="primary-btn" href="#">Apply</a>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<hr>
			<div class="row justify-content-end">
				<div class="col-auto">
					<h5>Subtotal</h5>
				</div>
				<div class="col col-md-5">
					<h5 class="total"><?= $currency ?><?= $total ?></h5>
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
							<li><a href="#">Flat Rate: $5.00</a></li>
							<li><a href="#">Free Shipping</a></li>
							<li><a href="#">Flat Rate: $10.00</a></li>
							<li class="active"><a href="#">Local Delivery: $2.00</a></li>
						</ul>
						<!-- <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i></h6>
						<select class="shipping_select" id="country">
						</select> -->
						<div class="">
							<select class="shipping_select">
								<option value="">Select a State</option>
								<? for ($i = 0; $i < sizeof($lklist["state"]); $i++) { ?>
									<option value="<?= $i ?>"><?= $lklist["state"][$i] ?></option>
								<? } ?>
							</select>
						</div>
						<input type="text" placeholder="Postcode/Zipcode">
						<a class="gray_btn" href="#">Update Details</a>
					</div>
				</div>
			</div>
			<hr>
			<div class="row out_button_area">
				<div class="col">
					<div class="checkout_btn_inner d-flex align-items-center">
						<a class="gray_btn" href="#">Continue Shopping</a>
						<a class="primary-btn" href="#">Proceed to checkout</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Cart Area =================-->

<? include "footer.php"; ?>