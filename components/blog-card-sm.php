<? $name = $name; ?>
<? $link = $link; ?>
<? $img = $img; ?>
<? $cdt = $cdt; ?>
<div class="media post_item">
	<img src="<?= $img ?>" alt="<?= $name ?>">
	<div class="media-body">
		<a href="<?= $link ?>">
			<h3><?= $name ?></h3>
		</a>
		<p><?= $cdt ?></p>
	</div>
</div>