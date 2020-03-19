<? $page = "General Info"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "general"; ?>
<?
$p_flux = array(
	// list			name				type				check
	"id",			"",					"",					"",
	"name",			"Name",				"text_50",			"req",
	// "url",			"Site URL",			"text_100",			"req",
	"addr1",		"Address Line ",	"text_50",			"",
	"addr2",		"Address Line 2",	"text_50",			"",
	"city",			"City",				"text_30",			"",
	"state",		"State",			"text_30",			"",
	"country",		"Country",			"lkcbo_country",	"",
	"email",		"Email",			"text_50",			"email",
	"phone1",		"Phone 1",			"text_30",			"",
	"phone2",		"Phone 2",			"text_30",			"",
	"fax",			"Fax",				"text_30",			"",
);
// pr($_POST);

// $debug_update = 1;
$next_file = "setup.php";

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