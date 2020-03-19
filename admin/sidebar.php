<!-- Tip 1: You can change the color of the sidebar using: data="blue | green | orange | red" -->
<div class="sidebar" data="blue">
	<div class="sidebar-wrapper">
		<div class="logo">
			<!-- <a href="javascript:void(0)" class="simple-text logo-mini">
				<?= $short_site_name ?>
			</a> -->
			<a href="javascript:void(0)" class="simple-text logo-normal">
				<?= $site_name ?>
			</a>
		</div>
		<ul class="nav">
			<? for ($i = 0; $i < sizeof($mn_name); $i++) { ?>
				<? if ($mn_perm[$i] != "" && !get($mn_perm[$i])) continue;
				?>
				<? $a = ($this_file == $mn_page[$i] ? "active" : ""); ?>
				<li class="<?= $a ?>">
					<a href="<?= $mn_page[$i] ?>">
						<i class="tim-icons <?= $mn_icon[$i] ?>"></i>
						<p><?= $mn_name[$i] ?></p>
					</a>
				</li>
			<? } ?>
			<li class="active-pro">
				<a href="<?= $site_url . '/logout.php' ?>">
					<i class="tim-icons icon-button-power"></i>
					<p>Logout</p>
				</a>
			</li>
		</ul>
	</div>
</div>