<? $page = "Voucher Info"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "voucher"; ?>
<?
$p_flux = array(
	// list			name				type				check
	"id",			"",					"",					"",
	"code",			"Code",				"text",				"requq",
	"member_id",	"Member",			"lkcbo_member",		"",
	"____",			"Details",			"split",			"",
	"disc_type",	"Discount Type",	"lkcbo_disc-type",	"req",
	"amount",		"Amount",			"text",				"reqdbl",
	"expiry_date",	"Expiry Date",		"date_today",		"date",
	"used",			"Used",				"display",			"",
	"once",			"Once Only",		"cbx",				"",
	"info",			"Information",		"memo",				"",
);
// $debug_update = 1;

$lklist["member"] = array();
$rs = mq("SELECT id, CONCAT(fname, ' ', lname) FROM member");
while ($r = mfa($rs)) {
	$lklist["member"][$r[0]] = $r[1];
}
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