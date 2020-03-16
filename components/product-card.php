<? $name = $name; ?>
<? $img = $img; ?>
<? $old_price = $old_price; ?>
<? $new_price = $new_price; ?>
<? $link = $link; ?>
<div class="single-product">
	<div class="img-container">
		<a href="<?= $link ?>" class="stretched-link"></a>
		<img class="img-fluid" src="<?= $img ?>" alt="">
	</div>
	<div class="product-details">
		<a href="<?= $link ?>" class="">
			<h6><?= $name ?></h6>
		</a>
		<div class="price">
			<h6><?= $currency ?><?= $new_price ?></h6>
			<? if ($old_price > 0 && $old_price > $new_price) { ?>
				<h6 class="l-through"><?= $currency ?><?= $old_price ?></h6>
			<? } ?>
		</div>
		<div class="prd-bottom">
			<a href="" class="social-info">
				<span class="ti-bag"></span>
				<p class="hover-text">add to bag</p>
			</a>
			<a href="<?= $link ?>" class="social-info">
				<span class="lnr lnr-move"></span>
				<p class="hover-text">view more</p>
			</a>
		</div>
	</div>
</div>