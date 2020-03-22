<? $page = "Template Info"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "template"; ?>
<?
$p_flux = array(
	// list			name				type				check
	"id",			"",					"",					"",
	"name",			"Name",				"text",				"req",
	"depar",		"Department",		"lkcbo_depar",		"",
	"cdt",			"Created Date",		"date",				"",
	"ctm",			"Created Time",		"tm",		"",
	"data",			"Remarks",			"cms",				"raw",
	"____",			"Images",			"split",			"",
	"img",			"Image",			"upload_image",		"",
	"img2",			"Image",			"upload_image",		"",
	"img3",			"Image",			"upload_image",		"",
	"mulsel",		"Multi Select",		"lkmulsel_roles",	"",
);
// pr($_POST);
$debug_insert = 1;

$multipart = 1; #must have to upload image 

$id = frm("id");
$uploadFolderPrefix = "../uploads/";
$upload = array("img");
$upload_lbl = array("Image");
// $maxFileSize = 1024 * 1024 * 10;
// $maxFileSizeStr = "10MB";
// $randomizeName = 0;
$acceptUploadExt = array("jpg", "png", "jpeg");
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