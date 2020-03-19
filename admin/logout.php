<? session_start(); ?>
<? session_destroy(); ?>
<html>

<head>
	<title>Please Wait...</title>
	<? if (!isset($_GET["error"])) { ?>
		<meta http-equiv='REFRESH' content='0; URL=login.php'><? } ?>
</head>

<body style='font-family:Arial'>

	<? if (isset($_GET["error"]) && $_GET["error"] == 1) { ?>
		<b>You have been logged out because we detected a concurrent login from another PC.<br>
			Click <a href='login.php'>here</a> to login again.
		<? } ?>

</body>

</html>