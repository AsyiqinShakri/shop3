<? include "common.php"; ?>
<?

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
// header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

$req = "";
$p1 = "";
$p2 = "";
$p3 = "";
$p4 = "";
$p5 = "";
$p6 = "";
$p7 = "";
$p8 = "";
$p9 = "";
$p10 = "";
$p11 = "";
$p12 = "";
$p13 = "";
$p14 = "";
$p15 = "";

if (frm("m") == "get") {
	$req = trim(frm("req"));
	$p1 = trim(frm("p1"));
	$p2 = trim(frm("p2"));
	$p3 = trim(frm("p3"));
	$p4 = trim(frm("p4"));
	$p5 = trim(frm("p5"));
	$p6 = trim(frm("p6"));
	$p7 = trim(frm("p7"));
	$p8 = trim(frm("p8"));
	$p9 = trim(frm("p9"));
	$p10 = trim(frm("p10"));
	$p11 = trim(frm("p11"));
	$p12 = trim(frm("p12"));
	$p13 = trim(frm("p13"));
	$p14 = trim(frm("p14"));
	$p15 = trim(frm("p15"));
} else {
	$request = "";
	$postdata = file_get_contents("php://input");
	if (isset($postdata)) {
		$request = json_decode($postdata);
	} else {
		return;
	}
	$req = trim(isset($request->req) ? hsc($request->req) : "");
	$p1 = trim(isset($request->p1) ? hsc($request->p1) : "");
	$p2 = trim(isset($request->p2) ? hsc($request->p2) : "");
	$p3 = trim(isset($request->p3) ? hsc($request->p3) : "");
	$p4 = trim(isset($request->p4) ? hsc($request->p4) : "");
	$p5 = trim(isset($request->p5) ? hsc($request->p5) : "");
	$p6 = trim(isset($request->p6) ? hsc($request->p6) : "");
	$p7 = trim(isset($request->p7) ? hsc($request->p7) : "");
	$p8 = trim(isset($request->p8) ? hsc($request->p8) : "");
	$p9 = trim(isset($request->p9) ? hsc($request->p9) : "");
	$p10 = trim(isset($request->p10) ? hsc($request->p10) : "");
	$p11 = trim(isset($request->p11) ? hsc($request->p11) : "");
	$p12 = trim(isset($request->p12) ? hsc($request->p12) : "");
	$p13 = trim(isset($request->p13) ? hsc($request->p13) : "");
	$p14 = trim(isset($request->p14) ? hsc($request->p14) : "");
	$p15 = trim(isset($request->p15) ? hsc($request->p15) : "");
}

$arr = array();
$out = array();
$error = "";
$success = "";
$data = array();

if ($req == "getPIC") {
	if ($p1 == "") {
		$error .= "Client cannot be empty";
	}

	if ($error == "") {
		$sql = "SELECT * FROM pic WHERE client_id = '" . $p1 . "' ";
		$rs = mq($sql);
		$rows = mnr($rs);

		while ($r = mfa($rs)) {
			$data[] 	= array(
				"id" => $r["id"],
				"name" => $r["name"],
			);
		}


		if ($rows < 1) {
			$error = "No PIC found";
		} else {
			$success = "Found some PIC";
		}
	}

	$arr["data"] = $data;
	$arr["success"] = $success;
	$arr["error"] = $error;
	$arr["sql"] = $sql;
	$out = $arr;
}

if (frm("m") == "get") {
	print_r($out);
	//$out = json_encode($out);
	//echo $out;
} else {
	echo json_encode($out);
}

?>