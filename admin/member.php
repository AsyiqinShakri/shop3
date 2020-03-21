<? $page = "Members"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "member"; ?>
<?
$c_flux = array(
	//list			name				align		type			sort
	"id",			"",					"m",		"",				"0",
	"fname",		"First Name",		"m",		"",				"1",
	"lname",		"Last Name",		"m",		"",				"1",
	"email",		"Email",			"m",		"",				"1",
	"cdt",			"Created",			"m",		"",				"1",

);

$l_order_by = "cdt";
$l_direction = "DESC";
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