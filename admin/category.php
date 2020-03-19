<? $page = "Template"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "template"; ?>
<?
$c_flux = array(
	//list			name				align		type			sort
	"id",			"",					"m",		"",				"0",
	"code",			"Code",				"m",		"",				"1",
	"name",			"Name",				"m",		"",				"1",
);

?>
<? require_once $libbase . "mergel.lib"; ?>
<? require_once $libbase . "presql.lib"; ?>
<? require_once $libbase . "list.lib" ?>

<? include "footer.php"; ?>