<? $page = "Product"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "product"; ?>
<?
$c_flux = array(
	//list			name				align		type			sort
	"id",			"",					"m",		"",				"0",
	"cat_id",		"Category",			"m",		"lk_cat",		"1",
	"name",			"Name",				"m",		"",				"1",
);

$list = "cat";
$lklist[$list] = array();
$sql = mq("SELECT id, name FROM category");
while ($r = mfa($sql)) {
	$lklist[$list][$r[0]] = $r[1];
}

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