<?
$sql = "SELECT * FROM noti WHERE employee_id=" . get("id");
$rs = mq($sql);
$rows = mnr($rs);
$got = $rows > 0 ? "notification" : 0;
?>

<li class="dropdown nav-item">
	<a href="javascript:void(0)" class="dropdown-toggle nav-link" data-toggle="dropdown">
		<div class="<?= $got ?> d-none d-lg-block d-xl-block"></div>
		<i class="tim-icons icon-sound-wave"></i>
		<p class="d-lg-none">
			Notifications
		</p>
	</a>
	<ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
		<? while ($r = mfa($rs)) { ?>
			<? $class = $r['status'] ?: "notification"; ?>
			<li class="nav-link">
				<div class=" <?= $class ?>"></div>
				<a href="javascript:void(0)" class="nav-item dropdown-item"><?= $r['data'] ?></a>
			</li>
		<? } ?>
		<? if (!$got) { ?>
			<li class="nav-link">
				<p class="dropdown-item">No Notifications</p>
			</li>
		<? } ?>
	</ul>
</li>