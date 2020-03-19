<? include "common.php"; ?>
<? include "__menu.php"; ?>
<?
$css = array(
	"https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800",
	"https://use.fontawesome.com/releases/v5.0.6/css/all.css",
	"https://unpkg.com/bootstrap-table@1.15.3/dist/bootstrap-table.min.css",
	"assets/css/nucleo-icons.css",
	"assets/css/black-dashboard.css",
	// "assets/demo/demo.css",
	"assets/css/custom.css",
	"assets/css/jasny-bootstrap.min.css",
	"assets/css/gijgo.css",
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/favicon.png">
	<title>
		<?= $page; ?>
	</title>
	<? for ($i = 0; $i < sizeof($css); $i++) { ?>
		<? $link = strpos($css[$i], "//") !== FALSE ? $css[$i] : $site_url . $css[$i] . "?v=" . $v ?>
		<link href="<?= $css[$i] ?>" rel="stylesheet" />
	<? } ?>
</head>

<body class="white-content">
	<div class="wrapper">
		<? if ($sidebar) {
			include "sidebar.php";
		} ?>
		<div class="main-panel" data="blue">
			<!-- Navbar -->
			<? if ($navbar) {
				include "navbar.php";
			}
			?>
			<!-- End Navbar -->