<? $page = "Template Info"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "template"; ?>
<?
$p_flux = array(
	// list			name				type				check
	"id",			"",					"",					"",
	"name",			"Name",				"text_5",			"req",
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

<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<? require "lib/frmbasic.lib"; ?>
			</div>
		</div>
	</div>
</div>
<? include "footer.php"; ?>