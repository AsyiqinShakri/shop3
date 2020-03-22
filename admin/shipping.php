<? $page = "Shipping"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "shipping"; ?>
<?
$c_flux = array(
	//list			name						align		type			sort
	"id",			"",							"m",		"",				"0",
	"zone",			"Zone",						"m",		"",				"1",
	"basew",		"Base Weight (g)",			"m",		"dbl",			"1",
	"basep",		"Base Price (RM)",			"m",		"dbl",			"1",
	"addw",			"Additional Weight (g)",	"m",		"dbl",			"1",
	"addp",			"Additional Price (RM)",	"m",		"dbl",			"1",
);

$pre_fld['basep'] = " RM";
$pre_fld['addp'] = " RM";
$post_fld['basew'] = "g ";
$post_fld['addw'] = "g ";

?>
<? require_once $libbase . "mergel.lib"; ?>
<? require_once $libbase . "presql.lib"; ?>
<? require_once $libbase . "prefrmbasic.lib"; ?>
<? require_once $libbase . "listaction.lib"; ?>
<? require_once $libbase . "subheader.lib"; ?>
<div class="card-body">
	<div>
		<? require_once $libbase . "sqldelete.lib"; ?>
		<? require_once $libbase . "prelist.lib"; ?>
		<? require_once $libbase . "listing.lib"; ?>
	</div>
</div>
<? require_once $libbase . "postfrmbasic.lib"; ?>

<? include "footer.php"; ?>