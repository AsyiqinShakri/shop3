<? $id = $_GET["ajax"] == 1 ? $_GET["id"] : $id; ?>
<? $img = $_GET["ajax"] == 1 ? $_GET["img"] : $img; ?>
<? $name = $_GET["ajax"] == 1 ? $_GET["name"] : $name; ?>
<? $qty = $_GET["ajax"] == 1 ? $_GET["qty"] : $qty; ?>
<? $maxQty = $_GET["ajax"] == 1 ? $_GET["maxQty"] : $maxQty; ?>
<? $price = $_GET["ajax"] == 1 ? $_GET["price"] : $price; ?>
<? $currency = $_GET["ajax"] == 1 ? $_GET["currency"] : $currency; ?>
<tr>
	<td>
		<div class="cart-delete" onclick="deleteCartItem('<?= $id ?>')">
			<span class="lnr lnr-cross"></span>
		</div>
	</td>
	<td>
		<div class="media">
			<div class="d-flex">
				<img src="<?= $img ?>" alt="">
			</div>
			<div class="media-body">
				<p><?= $name ?></p>
			</div>
		</div>
	</td>
	<td>
		<h5><?= $currency ?><?= number_format($price, 2) ?></h5>
	</td>
	<td>
		<div class="product_count">
			<input type="text" name="qty<?= $id ?>" id="qty<?= $id ?>" maxlength="12" value="<?= $qty ?>" title="Quantity:" class="input-text qty">
			<button onclick="var result = document.getElementById('qty<?= $id ?>'); var qty = result.value; if( !isNaN( qty ) && qty <= parseInt('<?= $maxQty ?>')) result.value++; updateQty('<?= $id ?>', result.value); return false;" class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
			<button onclick="var result = document.getElementById('qty<?= $id ?>'); var qty = result.value; if( !isNaN( qty ) && qty > 1 ) result.value--; updateQty('<?= $id ?>', result.value); return false;" class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
		</div>
	</td>
	<td class="text-right">
		<h5><?= $currency ?><?= number_format(($qty * $price), 2); ?></h5>
	</td>
</tr>