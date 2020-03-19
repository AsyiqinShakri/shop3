<?
$js = array(
	"/assets/js/core/jquery.min.js",
	"/assets/js/core/popper.min.js",
	"/assets/js/core/bootstrap.min.js",
	"/assets/js/plugins/perfect-scrollbar.jquery.min.js",
	"https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE",
	"/assets/js/plugins/chartjs.min.js",
	"/assets/js/plugins/bootstrap-notify.js",
	"/assets/js/plugins/fileinput.js",
	"/assets/js/black-dashboard.min.js",
	"https://unpkg.com/bootstrap-table@1.15.3/dist/bootstrap-table.min.js",
	// "/assets/demo/demo.js",
	"/assets/js/wz_jsgraphics.js",
	"/assets/js/gijgo.min.js",
	'/lib/script.js',
);
?>

<footer class="footer">
	<div class="container-fluid">
		<!-- <ul class="nav">
			<li class="nav-item">
				<a href="javascript:void(0)" class="nav-link">
					Creative Tim
				</a>
			</li>
			<li class="nav-item">
				<a href="javascript:void(0)" class="nav-link">
					About Us
				</a>
			</li>
			<li class="nav-item">
				<a href="javascript:void(0)" class="nav-link">
					Blog
				</a>
			</li>
		</ul> -->
		<div class="copyright">
			&copy; <?= date('Y') ?>. <?= $site_name ?>. All Rights Reserved.
		</div>
	</div>
</footer>
</div>
</div>
<? for ($i = 0; $i < sizeof($js); $i++) { ?>
	<? $link = strpos($js[$i], "//") !== FALSE ? $js[$i] : $site_url . $js[$i] . "?v=" . $v ?>
	<script src="<?= $link ?>"></script>
<? } ?>
<? include_once "fixed-plugin.php"; ?>
<? if ($this_file == "index.php") { ?>
	<script src="<?= $site_url ?>/assets/demo/demo.js"></script>
	<script>
		$(document).ready(function() {
			// Javascript method's body can be found in assets/js/demos.js
			// demo.initDashboardPageCharts();
		});
	</script>
<? } ?>

<script>
	<?= $post_script ?>
</script>
<? require_once $libbase . "notification.lib"; ?>
</body>

</html>