<? $breadcrumb = 1; ?>
<? $page = "Checkout" ?>
<? include "header.php" ?>

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
	<div class="container">
		<? if ($user == "") { ?>
			<div class="returning_customer">
				<div class="check_title">
					<h2>Returning Customer?</h2>
				</div>
				<p>If you have shopped with us before, please enter your details in the boxes below. If you are a new
					customer, please proceed to the Billing & Shipping section.</p>
				<form class="row contact_form" action="#" method="post" novalidate="novalidate">
					<div class="col-md-6 form-group p_star">
						<input type="text" class="form-control" id="name" name="name">
						<span class="placeholder" data-placeholder="Username or Email"></span>
					</div>
					<div class="col-md-6 form-group p_star">
						<input type="password" class="form-control" id="password" name="password">
						<span class="placeholder" data-placeholder="Password"></span>
					</div>
					<div class="col-md-12 form-group">
						<button type="submit" value="submit" class="genric-btn primary">login</button>
						<div class="creat_account">
							<input type="checkbox" id="f-option" name="selector">
							<label for="f-option">Remember me</label>
						</div>
						<a class="lost_pass" href="#">Lost your password?</a>
					</div>
				</form>
			</div>
		<? } ?>
		<div class="cupon_area">
			<form action="" method="get" onsubmit="event.preventDefault(); applyCoupon();">
				<div class="check_title">
					<h2>Have a coupon?</h2>
				</div>
				<input type="text" id="coupon" name="coupon" placeholder="Enter coupon code" value="<?= $coupon ?>">
				<input type="submit" class="genric-btn primary text-uppercase" value="Apply Coupon" />
			</form>
		</div>
		<div class="billing_details">
			<div class="row">
				<div class="col-lg-8">
					<h3>Billing / Shipping Details</h3>
					<form class="row contact_form" action="#" method="post" novalidate="novalidate">
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="first" name="name">
							<span class="placeholder" data-placeholder="First name"></span>
						</div>
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="last" name="name">
							<span class="placeholder" data-placeholder="Last name"></span>
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="company" name="company" placeholder="Company name">
						</div>
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="number" name="number">
							<span class="placeholder" data-placeholder="Phone number"></span>
						</div>
						<div class="col-md-6 form-group p_star">
							<input type="text" class="form-control" id="email" name="compemailany">
							<span class="placeholder" data-placeholder="Email Address"></span>
						</div>
						<div class="col-md-12 form-group p_star">
							<input type="text" class="form-control" id="add1" name="add1">
							<span class="placeholder" data-placeholder="Address line 01"></span>
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="add2" name="add2" placeholder="Address line 02">
						</div>
						<div class="col-md-12 form-group p_star">
							<input type="text" class="form-control" id="city" name="city">
							<span class="placeholder" data-placeholder="Town/City"></span>
						</div>
						<div class="col-md-12 form-group p_star">
							<select class="country_select">
								<option value="">State *</option>
								<? for ($i = 0; $i < sizeof($lklist["state"]); $i++) { ?>
									<option value="<?= $i ?>"><?= $lklist["state"][$i] ?></option>
								<? } ?>
							</select>
						</div>
						<div class="col-md-12 form-group p_star">
							<input type="text" class="form-control" id="zip" name="zip">
							<span class="placeholder" data-placeholder="Postcode/ZIP"></span>
						</div>
						<div class="col-md-12 form-group p_star">
							<select class="country_select" required>
								<option value="">Country *</option>
								<? for ($i = 0; $i < sizeof($lklist["country"]); $i++) { ?>
									<option value="<?= $i ?>"><?= $lklist["country"][$i] ?></option>
								<? } ?>
							</select>
						</div>
						<? if ($user == "") { ?>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector" checked>
									<label for="f-option2">Create an account?</label>
								</div>
							</div>
						<? } ?>
						<div class="col-md-12 form-group">
							<textarea class="form-control" name="message" id="message" rows="1" placeholder="Order Notes"></textarea>
						</div>
					</form>
				</div>
				<div class="col-lg-4">
					<div class="order_box">
						<h2>Your Order</h2>
						<ul class="list">
							<li>Product <span>Total</span></li>
							<? $total = 0; ?>
							<? foreach ($cart as $key => $value) { ?>
								<? $sub = $value["qty"] * $value["price"]; ?>
								<? $total += $sub; ?>
								<li>
									<span class="name"><?= $value["name"] ?></span>
									<span class="middle">x <?= $value["qty"] ?></span>
									<span class="last"> <?= $currency . dfd($sub) ?> </span>
								</li>
							<? } ?>
							<? if ($coupon != "") {
								$sql = "SELECT * FROM voucher WHERE code = '" . $coupon . "' AND expiry_date > '" . date('Y-m-d') . "' AND ((once = 1 AND used = 0) || once = 0)";
								$c = mfa(mq($sql));
								if (!empty($c)) {
									if ($c["disc_type"] == 1) {
										$discount = $c["amount"];
									} else if ($c["disc_type"] == 2) {
										$discount = $c["amount"] / 100 * $total;
									}
								}
								$total -= $discount;
							} ?>
						</ul>
						<ul class="list list_2">
							<li>Discount <span>- <?= $currency ?><span class="cart-discount"><?= dfd($discount) ?></span></span></li>
							<li>Shipping <span><?= $shippingType ?> <?= $currency ?><?= dfd($shipping);
																					$total += $shipping; ?></span></li>
							<li>Total <span><?= $currency ?><span class="cart-total"><?= dfd($total) ?></span></span></li>
						</ul>
						<div class="payment_item">
							<div class="radion_btn">
								<input type="radio" id="f-option5" name="selector">
								<label for="f-option5">Payments</label>
								<div class="check"></div>
							</div>
							<p>Please send a check to Store Name, Store Street, Store Town, Store State / County,
								Store Postcode.</p>
						</div>
						<div class="payment_item active">
							<div class="radion_btn">
								<input type="radio" id="f-option6" name="selector">
								<label for="f-option6">Paypal </label>
								<img src="img/product/card.jpg" alt="">
								<div class="check"></div>
							</div>
							<p>Pay via PayPal; you can pay with your credit card even if you don’t have a PayPal
								account.</p>
						</div>
						<div class="creat_account">
							By checking out, you agree to our
							<a href="#">terms & conditions*</a>
						</div>
						<a class="primary-btn" href="#">Proceed to Payment</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Checkout Area =================-->


<? include "footer.php" ?>