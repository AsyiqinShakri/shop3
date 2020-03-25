<? include "common.php"; ?>
<?
$data = file_get_contents("php://input");
$req = json_decode(base64_decode($data));
// pr($req);
$res = array("status" => false, "message" => "Uh Oh! Failed");

if ($req->req == "addToCart") {
	$id = $req->id;
	$qty = $req->qty;

	$sql = "SELECT * FROM product WHERE id = " . $id;
	$r = mfa(mq($sql));
	if (empty($r)) {
		$res["message"] = "Product not found!";
	} else if ($r['qty'] < 1 || $r["qty"] < $qty || (isset($cart[$id]) && (($cart[$id]["qty"] + $qty) > $r['qty']))) {
		$res["message"] = "Product quantity lower than requested!";
	} else {
		$arrx = array();
		if (!isset($cart[$id])) {
			$cart[$id] = array("qty" => 0);
		}
		$cart[$id] = array(
			"id" => $id,
			"name" => $r['name'],
			"qty" => $qty + $cart[$id]["qty"],
			"maxQty" => $r['qty'],
			"currency" => $currency,
			"price" => $r['price'],
			"img" => $site_url . '/' . img($r["img1"]),
		);
		set("cart", $cart);

		$res["cart"] = json_encode($cart);
		$res["status"] = true;
		$res["message"] = "Successfully " . $qty . " nos of <b>" . $r['name'] . "</b> added to cart!";
	}
}

if ($req->req == 'updateQty') {
	$id = $req->id;
	$qty = $req->qty;

	if (isset($cart[$id])) {
		$cart[$id]["qty"] = $qty;
		$res["status"] = true;
		$res["message"] = "Update <b>" . $cart[$id]["name"] . "</b>'s quantity!";
		$res["cart"] = json_encode($cart);
	} else {
		$res["message"] = "Product not found in cart!";
	}
	set("cart", $cart);
}

if ($req->req == "deleteCartItem") {
	$id = $req->id;

	if (isset($cart[$id])) {
		$res["message"] = "Removed <b>" . $cart[$id]["name"] . "</b> from cart.";
		unset($cart[$id]);
		$res["status"] = true;
		$script = "";
		$html = "";
		$res["cart"] = json_encode($cart);
	} else {
		$res["message"] = "Product not found in cart!";
	}

	set("cart", $cart);
}

if ($req->req == "register") {
	$usr = $req->usr;
	$pwd = md5($session_pfx . $req->pwd);

	if ($usr == "") {
		$res["message"] = "Email cannot be empty!";
	} else if ($pwd == "" || strlen($pwd) < 6) {
		$res["message"] = "Password cannot be empty or less than 6 characters!";
	} else {
		$sql = "SELECT * FROM member WHERE email = '" . $usr . "'";
		$u = mfa(mq($sql));
		if (!empty($u)) {
			$res["message"] = "This email has been registered before! Please login instead!";
		} else {
			$code = rnd(8);
			$sql = "INSERT INTO member (email, pwd, verify, code, cdt) VALUES ('" . $usr . "', '" . $pwd . "', 0, '" . $code . "', '" . now() . "')";
			mq($sql);

			$link = $site_url . "/verify.php?code=" . $code;

			$arr = array(
				"[[email]]" => $usr,
				"[[link1]]" => $link,
			);
			sendEmail($usr, 1, $arr);

			$message = "Thank you for registering with us. We have sent you an email to verify your account. :-)";
			set("message", $message);
			set("messageType", "success");
			$res["status"] = true;
		}
	}
}

if ($req->req == "login") {
	$usr = $req->usr;
	$pwd = md5($session_pfx . $req->pwd);
	$remember = $req->remember;

	if ($usr == "") {
		$res["message"] = "Email cannot be empty!";
	} else if ($pwd == "" || strlen($pwd) < 6) {
		$res["message"] = "Password cannot be empty or less than 6 characters!";
	} else {
		$sql = "SELECT * FROM member WHERE email = '" . $usr . "'";
		$u = mfa(mq($sql));
		if (empty($u)) {
			$res["message"] = "User not found!";
		} else if ($u["verify"] == 0) {
			$res["message"] = "User is not active! Please check your email for verification steps!";
		} else if ($u["block"] == 1) {
			$res["message"] = "User has been blocked! Please contact admin to unblock your account!";
		} else if ($u["pwd"] != $pwd) {
			$res["message"] = "Please ensure you have entered your email and password correctly!";
		} else {
			unset($u["pwd"]);

			set("user", $u);
			if ($remember == 1) {
				setc("user", $u);
			}

			$message = "Welcome, " . $u["fname"];
			set("message", $message);
			set("messageType", "success");
			$res["status"] = true;
		}
	}
}

if ($req->req == "applyCoupon") {
	$coupon = "";
	$code = $req->code;
	$sql = "SELECT * FROM voucher WHERE code = '" . $code . "'";
	$c = mfa(mq($sql));
	if (empty($c)) {
		$res["message"] = "Coupon not found!";
	} else if ($c["once"] && $c["used"] > 0) {
		$res["message"] = "Invalid Coupon!";
	} else if ($c["member_id"] > 0 && $c["member_id"] != $user["id"]) {
		$res["message"] = "You're not allow to use this coupon!";
	} else if ($c["expiry_date"] != "0000-00-00" && $c["expiry_date"] < date("Y-m-d")) {
		$res["message"] = "This coupon has expired!";
	} else {
		$coupon = $code;
		$res["cart"] = json_encode($cart);
		$res["disc_type"] = $c["disc_type"];
		$res["discount"] = $c["amount"];
		$res["status"] = true;
		$res["message"] = "Coupon <b>" . $coupon . "</b> has been applied!";
	}
	set("coupon", $coupon);
}

if ($req->req == "updateShipping") {
	$location = $req->location;
}

echo json_encode($res);
