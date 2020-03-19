<? $page = "Template Info"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "template"; ?>
<?
$p_flux = array(
	// list			name				type				check
	"id",			"",					"",					"",
	"code",			"Code",				"textx",			"req",
	"name",			"Name",				"text",				"req",
	"data",			"Remarks",			"cms",				"raw",
	"ishide",		"Hidden",			"cbx",				"",
	"img",			"Image",			"upload_image",		"",
);

$multipart = 1; #must have to upload image 

$id = frm("id");
$uploadFolderPrefix = "../uploads/";
$upload = array("img");
$upload_lbl = array("Image");
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