<? $page = "Product Info"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "product"; ?>
<?
$p_flux = array(
	// list			name				type				check
	"id",			"",					"",					"",
	"code",			"Code",				"textx",			"requqcode",
	"name",			"Name",				"text_5",			"req",
	"cat_id",		"Category",			"lkcbo_cat",		"",
	"____",			"Info",				"split",			"",
	"qty",			"Quantity",			"text",				"int",
	"price2",		"Old Price",		"text",				"dbl",
	"price",		"New Price",		"text",				"reqdbl",
	"weight",		"Weight",			"text",				"reqdbl",
	"____",			"Status",			"split",			"",
	"ishomebanner",	"Home Banner",		"cbx",				"",
	"islatest",		"Latest",			"cbx",				"",
	"isupcoming",	"Upcoming",			"cbx",				"",
	"isexclu",		"Exclusive",		"cbx",				"",
	"isdeal",		"Deal",				"cbx",				"",
	"ishide",		"Hidden",			"cbx",				"",
	"____",			"SEO Data",			"split",			"",
	"keyword",		"Keywords",			"text",				"",
	"meta_desc",	"Meta Description",	"memo",				"",
	"data",			"Data",			"cms",				"raw",
	"img1",			"Image 1",			"upload_image",		"",
	"img2",			"Image 2",			"upload_image",		"",
	"img3",			"Image 3",			"upload_image",		"",
);
// pr($_POST);
// $debug_insert = 1;
$post_lbl["weight"] = "(grams) ";
$post_fld["keyword"] = " separate each keyword by a comma ( , ) ";

$list = "cat";
$lklist[$list] = array();
$sql = mq("SELECT id, name FROM category");
while ($r = mfa($sql)) {
	$lklist[$list][$r[0]] = $r[1];
}

$multipart = 1; #must have to upload image 

$id = frm("id");
$uploadFolderPrefix = "../uploads/";
$upload = array("img1", "img2", "img3");
$upload_lbl = array("Image 1", "Image 2", "Image 3");
$acceptUploadExt = array("jpg", "png", "jpeg");
?>


<? require $libbase . "prefrmbasic.lib"; ?>
<? $id = frm("id"); ?>
<? require $libbase . "sqlmode.lib"; ?>
<? require $libbase . "subheader.lib"; ?>
<form name="f" action="<?= $site_url . "/" . $this_file ?>" method="post" <?= ($multipart ? "enctype=\"multipart/form-data\"" : "") ?>>
	<div class="card-body">
		<? require $libbase . "mergei.lib"; ?>
		<? //require $libbase . "sqlbasic.lib"; 
		?>
		<?
		require $libbase . "preparam.lib";

		if ($submitted) {
			require_once $libbase . "validation.lib";
			if ($multipart) {
				for ($i = 0; $i < sizeof($upload); $i++) {
					if ($validated) {
						$upload_path = "ul_" . $upload[$i];
						$target_field = $upload[$i];
						$upload_label = $upload_lbl[$i];
						require $libbase . "fileupload.lib";
						if ($error != "") {
							$validated = 0;
							break;
						}
					} else {
						break;
					}
				}
			}
			if ($validated) {
				if ($id == "") {
					require $libbase . "sqlinsert.lib";
				} else {
					require $libbase . "sqlupdate.lib";
				}
				if ($p["code"] == "(auto)") {
					$code = "P-" . pad($id, 0, 6);
					$sql = "UPDATE " . $sql_table . " SET code = '" . $code . "' WHERE id = " . $id;
					mq($sql);
				}
				set("update", "Record successfully " . $action);
				go($next_file);
			}
		} else if ($id !== "") {
			require $libbase . "sqlselect.lib";
		} else {
			$p["code"] = "(auto)";
		}
		?>
		<? for ($i = 0; $i < sizeof($p_list); $i++) { ?>
			<? require $libbase . "frmfield.lib"; ?>
		<? } ?>
	</div>
	<? require $libbase . "frmaction.lib" ?>
</form>
<? require $libbase . "postfrmbasic.lib"; ?>

<? include "footer.php"; ?>