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
			"price" => $r['price'],
			"img" => $r["img1"],
		);
		set("cart", $cart);

		$res["status"] = true;
		$res["message"] = "Successfully " . $qty . " nos of <b>" . $r['name'] . "</b> added to cart!";
	}
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

echo json_encode($res);
