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

<? require $libbase . "prefrmbasic.lib"; ?>
<? $id = frm("id"); ?>
<? require $libbase . "sqlmode.lib"; ?>
<? require $libbase . "subheader.lib"; ?>
<form name="f" action="<?= $site_url . "/" . $this_file ?>" method="post" <?= ($multipart ? "enctype=\"multipart/form-data\"" : "") ?>>
	<div class="card-body">
		<? require $libbase . "mergei.lib"; ?>
		<? require $libbase . "sqlbasic.lib"; ?>
		<? for ($i = 0; $i < sizeof($p_list); $i++) { ?>
			<? require $libbase . "frmfield.lib"; ?>
		<? } ?>
	</div>
	<? require $libbase . "frmaction.lib" ?>
</form>
<? require $libbase . "postfrmbasic.lib"; ?>

<? include "footer.php"; ?>