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

<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<? //require "lib/frmbasic.lib"; 
				?>
				<? $id = get("id"); ?>
				<? require "lib/sqlmode.lib"; ?>
				<form name="f" action="<?= $site_url . "/" . $this_file ?>" method="post" <?= ($multipart ? "enctype=\"multipart/form-data\"" : "") ?>>
					<div class="card-header">
						<h5 class="title"><?= $modet ?> <?= $page ?></h5>
					</div>
					<div class="card-body">
						<?
						require "lib/mergei.lib";
						// require "lib/sqlbasic.lib";
						require "lib/preparam.lib";

						if ($submitted) {
							require_once "lib/validation.lib";
							if ($multipart) {
								for ($i = 0; $i < sizeof($upload); $i++) {
									if ($validated) {
										$upload_path = "ul_" . $upload[$i];
										$target_field = $upload[$i];
										$upload_label = $upload_lbl[$i];
										require "lib/fileupload.lib";
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
									require "lib/sqlinsert.lib";
								} else {
									require "lib/sqlupdate.lib";
								}
								set("update", "Record successfully " . $action);
								go($next_file);
							}
						} else if ($id !== "") {
							require "lib/sqlselect.lib";
							$p['pwd'] = "";
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