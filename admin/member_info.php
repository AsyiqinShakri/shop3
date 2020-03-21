<? $page = "Member Info"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "member"; ?>
<?
$p_flux = array(
	// list			name				type				check
	"id",			"",					"",					"",
	"email",		"Email",			"text",				"requqemail",
	"fname",		"First Name",		"text",				"req",
	"lname",		"Last Name",		"text",				"",
	"cdt",			"Created Date",		"display",			"",
	"____",			"Status",			"split",			"",
	"verify",		"Verified",			"cbx",				"",
	"block",		"Block",			"cbx",				"",
	"____",			"Details",			"split",			"",
	"dob",			"Date of Birth",	"date",				"",
	"addr",			"Address Line 1",	"text",				"",
	"addr2",		"Address Line 2",	"text",				"",
	"state",		"State",			"lkcbo_state",		"",
	"country",		"Country",			"lkcbo_country",	"",
);
// pr($_POST);
// $debug_insert = 1;
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
					$pwd = md5($session_pfx . "123456");
					$sql = "UPDATE " . $sql_table . " SET pwd = '" . $pwd . "' WHERE id = " . $id;
					mq($sql);
				} else {
					require $libbase . "sqlupdate.lib";
				}
				set("update", "Record successfully " . $action);
				go($next_file);
			}
		} else if ($id !== "") {
			require $libbase . "sqlselect.lib";
		} else {
			$p["cdt"] = now();
			$post_fld["email"] = "<small style='color: red; font-weight: bold;'> * Default password for new user is 123456</small>";
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