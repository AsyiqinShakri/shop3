<? $page = "Voucher"; ?>
<? include "header.php"; ?>
<? include "__settings.php"; ?>
<? $sql_table = "voucher"; ?>
<?
$c_flux = array(
	//list			name				align		type			sort
	"id",			"",					"m",		"",				"0",
	"code",			"Code",				"m",		"",				"1",
	"member_id",	"Member",			"m",		"lk_member",	"1",
	"disc_type",	"Discount Type",	"m",		"lk_disc-type",	"1",
	"amount",		"Amount",			"m",		"dbl",			"1",
	"expiry_date",	"Expiry Date",		"m",		"date",			"1",
	"used",			"Used",				"m",		"int",			"1",
	"once",			"Once Only",		"m",		"bool",			"1",
);

// $pre_fld['dura'] = " max. ";
// $post_fld['dura'] = " day(s) ";

// $l_order_by = "name";
// $l_direction = "ASC";
$lklist["member"] = array();
$rs = mq("SELECT id, CONCAT(fname, ' ', lname) FROM member");
while ($r = mfa($rs)) {
	$lklist["member"][$r[0]] = $r[1];
}
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