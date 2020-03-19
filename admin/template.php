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
<? require_once $libbase . "list.lib" ?>

<? include "footer.php"; ?>