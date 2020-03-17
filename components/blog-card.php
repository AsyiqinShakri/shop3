<? $name = $name; ?>
<? $data = $data; ?>
<? $cdt = $cdt; ?>
<? $img = $img; ?>
<? $author = $author; ?>
<? $link = $link; ?>
<article class="row blog_item">
	<div class="col-md-3">
		<div class="blog_info text-right">
			<ul class="blog_meta list">
				<li><a href="#"><?= $author ?><i class="lnr lnr-user"></i></a></li>
				<li><a href="#"><?= $cdt ?><i class="lnr lnr-calendar-full"></i></a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-9">
		<div class="blog_post">
			<img src="<?= $img ?>" alt="">
			<div class="blog_details">
				<a href="<?= $link ?>">
					<h2><?= $name ?></h2>
				</a>
				<p><?= substr($data, 0, 100); ?></p>
				<a href="<?= $link ?>" class="white_bg_btn">View More</a>
			</div>
		</div>
	</div>
</article>