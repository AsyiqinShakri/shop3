<? include "common.php"; ?>
<?
$data = file_get_contents("php://input");
$req = json_decode($data);

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
		$res["message"] = "Successfully added to cart!";
	}
}
echo json_encode($res);
