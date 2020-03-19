<? $page = "Employee"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "employee"; ?>
<?
$p_flux = array(
	// list			name				type				check
	"id",			"",					"",					"",
	"usr",			"Username",			"text_15",			"requq",
	"name",			"Name",				"text_30",			"req",
	"designation",	"Designation",		"text_30",			"",
	"isadmin",		"Admin",			"cbx",				"",
	"isactive",		"Active",			"cbx_1",			"",
	"last_login",	"Last Login",		"display",			"datetime",
);
// pr($_POST);

// $debug_insert = 1;
$post_fld["last_login"] = "";
$post_fld["last_login"] .= "";
$post_fld["last_login"] .= "</div>";
$post_fld["last_login"] .= "<div class='col-md-12 px-md-3'";
$post_fld["last_login"] .= "<span style='color: red;'> * Default password will be the same as username.</span>";

?>

<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<? $id = frm("id"); ?>
				<? require "lib/sqlmode.lib"; ?>
				<form name="f" action="<?= $site_url . "/" . $this_file ?>" method="post" <?= ($multipart ? "enctype=\"multipart/form-data\"" : "") ?>>
					<div class="card-header">
						<h5 class="title"><?= $modet ?> Employee</h5>
					</div>
					<div class="card-body">
						<?
						require "lib/mergei.lib";
						require "lib/preparam.lib";

						if ($submitted) {
							require_once "lib/validation.lib";
							if ($validated) {
								if ($id == "") {
									require "lib/sqlinsert.lib";
									$sql = "SELECT id FROM " . $sql_table . " WHERE usr = '" . $_POST['usr'] . "'";
									$r = mfa(mq($sql));

									$pwd = md5($session_pfx . $_POST['usr']);
									$sql = "UPDATE " . $sql_table . " SET pwd = '" . $pwd . "' WHERE id=" . $r[0];
									mq($sql);
								} else {
									require "lib/sqlupdate.lib";
								}
								set("update", "Record successfully " . $action);
								go($next_file);
							}
						} else if ($id !== "") {
							require "lib/sqlselect.lib";
						} else {
							$p["last_login"] = now();
						}

						for ($i = 0; $i < sizeof($p_list); $i++) {
							require "lib/frmfield.lib";
						}
						?>
					</div>
					<div class="card-footer">
						<? require "lib/frmaction.lib" ?>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<? include "footer.php"; ?>
<? require "lib/notification.lib"; ?>