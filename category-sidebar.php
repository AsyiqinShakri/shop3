<div class="sidebar-filter">
	<div class="top-filter-head">Product Filters</div>
	<div class="common-filter">
		<div class="head">Brands</div>
		<form action="#">
			<ul>
				<? for ($i = 0; $i < sizeof($category); $i++) { ?>
					<li class="filter-list">
						<input class="pixel-radio" type="radio" id="<?= strtolower($category[$i]) ?>" name="brand" /><label for="<?= strtolower($category[$i]) ?>"><?= $category[$i] ?><span>(<?= $i + 1 ?>)</span></label>
					</li>
				<? } ?>
			</ul>
		</form>
	</div>
	<div class="common-filter">
		<div class="head">Color</div>
		<form action="#">
			<ul>
				<li class="filter-list">
					<input class="pixel-radio" type="radio" id="black" name="color" /><label for="black">Black<span>(29)</span></label>
				</li>
				<li class="filter-list">
					<input class="pixel-radio" type="radio" id="balckleather" name="color" /><label for="balckleather">Black Leather<span>(29)</span></label>
				</li>
				<li class="filter-list">
					<input class="pixel-radio" type="radio" id="blackred" name="color" /><label for="blackred">Black with red<span>(19)</span></label>
				</li>
				<li class="filter-list">
					<input class="pixel-radio" type="radio" id="gold" name="color" /><label for="gold">Gold<span>(19)</span></label>
				</li>
				<li class="filter-list">
					<input class="pixel-radio" type="radio" id="spacegrey" name="color" /><label for="spacegrey">Spacegrey<span>(19)</span></label>
				</li>
			</ul>
		</form>
	</div>
	<div class="common-filter">
		<div class="head">Price</div>
		<div class="price-range-area">
			<div id="price-range"></div>
			<div class="value-wrapper d-flex">
				<div class="price">Price:</div>
				<span>$</span>
				<div id="lower-value"></div>
				<div class="to">to</div>
				<span>$</span>
				<div id="upper-value"></div>
			</div>
		</div>
	</div>
</div>