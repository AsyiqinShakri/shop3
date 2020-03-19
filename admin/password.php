<? $page = "Password"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "employee"; ?>
<?
$p_flux = array(
	// list			name				type				check
	"id",			"",					"",					"",
	"pwd",			"Password",			"pwd",				"req",
	"__pwd",		"Confirm Password",	"pwd",				"req",
);
// pr($_POST);
// $debug_insert = 1;
$next_file = "index.php";
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
		<? require $libbase . "preparam.lib";

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
			if (strlen($p['pwd']) < 4) {
				$error .= epfx($error, "Password must be more than 4 characters!");
			} else if ($p['pwd'] != $p['__pwd']) {
				$error .= epfx($error, "Password and Confirm Password must be same!");
			} else {
				$p['pwd'] = md5($session_pfx . $p['pwd']);
			}
			if ($validated && $error == '') {
				if ($id == "") {
					require $libbase . "sqlinsert.lib";
				} else {
					require $libbase . "sqlupdate.lib";
				}
				set("update", "Record successfully " . $action);
				go($next_file);
			}
		} else if ($id !== "") {
			require $libbase . "sqlselect.lib";
			$p['pwd'] = "";
		} ?>
		<? for ($i = 0; $i < sizeof($p_list); $i++) { ?>
			<? require $libbase . "frmfield.lib"; ?>
		<? } ?>
	</div>
	<? require $libbase . "frmaction.lib" ?>
</form>
<? require $libbase . "postfrmbasic.lib"; ?>
<? include "footer.php"; ?>