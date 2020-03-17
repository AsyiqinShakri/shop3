<? require_once "common.php"; ?>
<? $breadcrumb = 1; ?>
<? $page = frm("name") ? frm("name") : $page ?>
<? include "header.php"; ?>
<style>
	.form-control {
		height: unset;
	}
</style>

<!--================Blog Area =================-->
<section class="blog_area single-post-area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 posts-list">
				<div class="single-post row">
					<div class="col-lg-12">
						<div class="feature-img">
							<img class="img-fluid" src="img/blog/feature-img1.jpg" alt="">
						</div>
					</div>
					<div class="col">
						<div class="blog_info d-flex">
							<ul class="blog_meta d-flex list">
								<li><a href="#"><i class="lnr lnr-user mr-2"></i>Mark wiens</a></li>
								<li><a href="#"><i class="lnr lnr-calendar-full mr-2"></i>12 Dec, 2018</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 blog_details">
						<h2>Astronomy Binoculars A Great Alternative</h2>
						<p class="excert">
							MCSE boot camps have its supporters and its detractors. Some people do not understand
							why you should have to spend money on boot camp when you can get the MCSE study
							materials yourself at a fraction.
						</p>
						<p>
							Boot camps have its supporters and its detractors. Some people do not understand why
							you should have to spend money on boot camp when you can get the MCSE study materials
							yourself at a fraction of the camp price. However, who has the willpower to actually
							sit through a self-imposed MCSE training. who has the willpower to actually sit through
							a self-imposed
						</p>
						<p>
							Boot camps have its supporters and its detractors. Some people do not understand why
							you should have to spend money on boot camp when you can get the MCSE study materials
							yourself at a fraction of the camp price. However, who has the willpower to actually
							sit through a self-imposed MCSE training. who has the willpower to actually sit through
							a self-imposed
						</p>
					</div>
					<div class="col-lg-12">
						<div class="quotes">
							MCSE boot camps have its supporters and its detractors. Some people do not understand
							why you should have to spend money on boot camp when you can get the MCSE study
							materials yourself at a fraction of the camp price. However, who has the willpower to
							actually sit through a self-imposed MCSE training.
						</div>
						<div class="row">
							<div class="col-6">
								<img class="img-fluid" src="img/blog/post-img1.jpg" alt="">
							</div>
							<div class="col-6">
								<img class="img-fluid" src="img/blog/post-img2.jpg" alt="">
							</div>
							<div class="col-lg-12 mt-25">
								<p>
									MCSE boot camps have its supporters and its detractors. Some people do not
									understand why you should have to spend money on boot camp when you can get the
									MCSE study materials yourself at a fraction of the camp price. However, who has
									the willpower.
								</p>
								<p>
									MCSE boot camps have its supporters and its detractors. Some people do not
									understand why you should have to spend money on boot camp when you can get the
									MCSE study materials yourself at a fraction of the camp price. However, who has
									the willpower.
								</p>
							</div>
						</div>
					</div>
				</div>
				<div class="navigation-area">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
							<div class="thumb">
								<a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
							</div>
							<div class="arrow">
								<a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
							</div>
							<div class="detials">
								<p>Prev Post</p>
								<a href="#">
									<h4>Space The Final Frontier</h4>
								</a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
							<div class="detials">
								<p>Next Post</p>
								<a href="#">
									<h4>Telescopes 101</h4>
								</a>
							</div>
							<div class="arrow">
								<a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
							</div>
							<div class="thumb">
								<a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
							</div>
						</div>
					</div>
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