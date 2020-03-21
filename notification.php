<? if (get("message") != "" && get("messageType") != "") { ?>
	<script>
		generateAlert("Welcome! <?= $user['fname'] ?>", "<?= get('messageType') ?>");
	</script>
	<? set("message", "");
	set("messageType", ""); ?>
<? } ?>