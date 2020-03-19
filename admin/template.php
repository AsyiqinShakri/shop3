<? $page = "Template"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "template"; ?>
<?
$c_flux = array(
	//list			name				align		type			sort
	"id",			"",					"m",		"",				"0",
	"name",			"Name",				"m",		"",				"1",
	"depar",		"Department",		"m",		"lk_depar",		"1",
);

$pre_fld['dura'] = " max. ";
$post_fld['dura'] = " day(s) ";

// $l_order_by = "name";
// $l_direction = "ASC";
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