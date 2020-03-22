<? $page = "Shipping Info"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "shipping"; ?>
<?
$p_flux = array(
	// list			name					type				check
	"id",			"",						"",					"",
	"zone",			"Zone",					"lkcbo_state",		"requq",
	"____",			"Base Rate",			"split",			"",
	"basew",		"Base Weight",			"text",				"reqint",
	"basep",		"Base Price",			"text",				"reqdbl",
	"____",			"Additional Rate",		"split",			"",
	"addw",			"Additional Weight", 	"text",				"reqint",
	"addp",			"Additional Price",		"text",				"reqdbl",
);
// pr($_POST);
// $debug_insert = 1;
// $debug_update = 1;

$post_lbl["basew"] = $post_lbl["addw"] = " (grams)";
$post_lbl["basep"] = $post_lbl["addp"] = " (RM)";

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