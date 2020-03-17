<? $breadcrumb = 1; ?>
<? $page = "Blog"; ?>
<? include "header.php"; ?>
<style>
	.form-control {
		height: unset
	}
</style>

<!--================Blog Area =================-->
<section class="blog_area my-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="blog_left_sidebar">
					<? for ($i = 0; $i < sizeof($blog); $i++) { ?>
						<? $name = $blog[$i]['name']; ?>
						<? $data = $blog[$i]['data']; ?>
						<? $cdt = $blog[$i]['cdt']; ?>
						<? $author = $blog[$i]['author']; ?>
						<? $img = $site_url . '/' . getimg($blog[$i]['img']); ?>
						<? $link = $site_url . '/blog-single.php?name=' . rawurlencode($blog[$i]['name']); ?>
						<? include "components/blog-card.php"; ?>
					<? } ?>
					<nav class="blog-pagination justify-content-center d-flex">
						<ul class="pagination">
							<li class="page-item">
								<a href="#" class="page-link" aria-label="Previous">
									<span aria-hidden="true">
										<span class="lnr lnr-chevron-left"></span>
									</span>
								</a>
							</li>
							<li class="page-item"><a href="#" class="page-link">01</a></li>
							<li class="page-item active"><a href="#" class="page-link">02</a></li>
							<li class="page-item"><a href="#" class="page-link">03</a></li>
							<li class="page-item"><a href="#" class="page-link">04</a></li>
							<li class="page-item"><a href="#" class="page-link">09</a></li>
							<li class="page-item">
								<a href="#" class="page-link" aria-label="Next">
									<span aria-hidden="true">
										<span class="lnr lnr-chevron-right"></span>
									</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
			<div class="col-lg-4">
				<? include "blog-rightsidebar.php" ?>
			</div>
		</div>
	</div>
</section>
<!--================Blog Area =================-->


<? include "footer.php"; ?>