<? $page = "Employee"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "employee"; ?>
<?

$c_flux = array(
	//list			name				align		type			sort
	"id",			"",					"m",		"",				"0",
	"usr",			"Username",			"m",		"",				"1",
	"name",			"Name",				"m",		"",				"1",
	"designation",	"Designation",		"m",		"",				"1",
	"isadmin",		"Admin",			"m",		"bool",			"1",
);

?>

<? require_once $libbase . "mergel.lib"; ?>
<? require_once $libbase . "presql.lib"; ?>
<? require_once $libbase . "prefrmbasic.lib"; ?>
<? require_once $libbase . "listaction.lib"; ?>
<? require_once $libbase . "subheader.lib"; ?>
<div class="card-body">
	<div>
		<? require_once $libbase . "sqldelete.lib"; ?>
		<? $sql_where .= " AND usr <> 'admin'"; ?>
		<? require_once $libbase . "prelist.lib"; ?>
		<? require_once $libbase . "listing.lib"; ?>
	</div>
</div>
<? require_once $libbase . "postfrmbasic.lib"; ?>

<? include "footer.php"; ?>