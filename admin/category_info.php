<? $page = "Category"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "category"; ?>
<?
$p_flux = array(
	// list			name				type				check
	"id",			"",					"",					"",
	"code",			"Code",				"textx",			"requqcode",
	"name",			"Name",				"text",				"req",
	"data",			"Data",				"cms",				"raw",
	"ishide",		"Hidden",			"cbx",				"",
	"img",			"Image",			"upload_image",		"",
);

$multipart = 1; #must have to upload image 

$id = frm("id");
$uploadFolderPrefix = "../uploads/";
$upload = array("img");
$upload_lbl = array("Image");
$acceptUploadExt = array("jpg", "png", "jpeg");
?>

<? require $libbase . "prefrmbasic.lib"; ?>
<? $id = frm("id"); ?>
<? require $libbase . "sqlmode.lib"; ?>
<? require $libbase . "subheader.lib"; ?>
<form name="f" action="<?= $site_url . "/" . $this_file ?>" method="post" <?= ($multipart ? "enctype=\"multipart/form-data\"" : "") ?>>
	<div class="card-body">
		<? require $libbase . "mergei.lib"; ?>
		<? // require $libbase . "sqlbasic.lib"; 
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
				if ($p['code'] == "(auto)") {
					$code = "CAT-" . pad($id, 0, 6);
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