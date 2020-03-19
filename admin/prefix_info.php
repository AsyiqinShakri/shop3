<? $page = "Prefix Info"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "prefix"; ?>
<?
$p_flux = array(
	// list			name				type				check
	"id",			"",					"",					"",
	"code",			"Code",				"textx_15",			"requq",
	"name",			"Name",				"text_50",			"req",
	"prefix",		"Prefix",			"text_10",			"req",
);
// pr($_POST);

// $debug_insert = 1;

?>

<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<? $id = frm("id"); ?>
				<? require "lib/sqlmode.lib"; ?>
				<form name="f" action="<?= $site_url . "/" . $this_file ?>" method="post" <?= ($multipart ? "enctype=\"multipart/form-data\"" : "") ?>>
					<div class="card-header">
						<h5 class="title"><?= $modet ?> Prefix</h5>
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
								} else {
									require "lib/sqlupdate.lib";
								}
								set("update", "Record successfully " . $action);
								go($next_file);
							}
						} else if ($id !== "") {
							require "lib/sqlselect.lib";
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