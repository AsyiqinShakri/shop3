<!-- Start Filter Bar -->
<form action="" method="get">
	<input type="hidden" name="search" value="<?= frm('search') ?>">
	<div class="filter-bar d-flex flex-wrap align-items-center">
		<div class="sorting">
			<select class="form-control mx-2 border-0" onchange="$(this).closest('form').submit()" name="order">
				<option <?= frm("order") == " ORDER BY price ASC " ? "selected" : "" ?> value=" ORDER BY price ASC ">Price: Low to High</option>
				<option <?= frm("order") == " ORDER BY price DESC " ? "selected" : "" ?> value=" ORDER BY price DESC ">Price: High to Low</option>
				<option <?= frm("order") == " ORDER BY id DESC " ? "selected" : "" ?> value=" ORDER BY id DESC ">Newest</option>
				<option <?= frm("order") == " ORDER BY id DESC " ? "selected" : "" ?> value=" ORDER BY id DESC ">Oldest</option>
			</select>
		</div>
		<div class="sorting mr-auto">
			<select class="form-control mx-2 border-0" onchange="$(this).closest('form').submit()" name="limit">
				<option <?= $limit == '12' ? 'selected' : '' ?> value="12">Show 12</option>
				<option <?= $limit == '24' ? 'selected' : '' ?> value="24">Show 24</option>
				<option <?= $limit == '36' ? 'selected' : '' ?> value="36">Show 36</option>
			</select>
		</div>
		<div class="pagination">
			<?
			$html = "";
			$base = $site_url . "/category.php";
			if ($start > 1) {
				$plink = $base . "?pg=" . ($pg - 1) . "&limit=" . $limit . "&search=" . frm("search");
				$link = $base . "?pg=1&limit=" . $limit . "&search=" . frm("search");
				$html .= '<a href="' . $plink . '" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>';
				$html .= '<a href="' . $link . '">1</a>';
			}
			if ($start > 2) {
				$html .= '<a href="javscript:void(0)" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>';
			}

			for ($i = $start; $i <= $end; $i++) {
				$link = $base . "?pg=" . ($i) . "&limit=" . $limit . "&search=" . frm("search");
				$class  = ($pg == $i) ? "active" : "";
				$html	.= '';
				$html   .= '<a href="' . $link . '" class="' . $class . '">' . $i . '</a>';
			}

			if ($end < $pages) {
				$plink = $base . "?pg=" . ($pg + 1) . "&limit=" . $limit . "&search=" . frm("search");
				$link = $base . "?pg=" . $pages . "&limit=" . $limit . "search=" . frm("search");
				$html .= '<a href="javscript:void(0)" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>';
				$html .= '<a href="' . $plink . '" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>';
			}

			echo $html;
			?>
			<!-- <a href="#">2</a>
		<a href="#">3</a>

		<a href="#">6</a>
		<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> -->
		</div>
	</div>
</form>
<!-- End Filter Bar -->