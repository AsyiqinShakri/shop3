<? $name = $name; ?>
<? $img = $img; ?>
<? $link = $link; ?>
<? $old_price = $old_price; ?>
<? $new_price = $new_price; ?>
<div class="single-related-product d-flex">
	<a href="<?= $link ?>" class="stretched-link"><img src="<?= $img ?>" alt="<?= $name ?>" class=""></a>
	<div class="desc w-100 text-center text-md-left d-flex flex-column">
		<a href="<?= $link ?>" class="title small"><?= $name ?></a>
		<div class="price">
			<h5 class="small mb-0"><?= $currency ?><?= dfd($new_price) ?></h5>
			<? if ($old_price > 0 && $old_price > $new_price) { ?>
				<h6 class="l-through small"><?= $currency ?><?= dfd($old_price) ?></h6>
			<? } ?>
		</div>
	</div>
</div>