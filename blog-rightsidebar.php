<div class="blog_right_sidebar">
	<aside class="single_sidebar_widget search_widget">
		<form action="" method="get" class="">
			<div class="input-group">
				<input type="text" name="search" class="form-control" placeholder="Search Posts" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Posts'">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
				</span>
			</div><!-- /input-group -->
		</form>
		<div class="br"></div>
	</aside>
	<aside class="single_sidebar_widget author_widget">
		<img class="author_img rounded-circle" src="img/blog/author.png" alt="">
		<h4>Charlie Barber</h4>
		<p>Senior blog writer</p>
		<div class="social_icon">
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-github"></i></a>
			<a href="#"><i class="fa fa-behance"></i></a>
		</div>
		<p>Boot camps have its supporters andit sdetractors. Some people do not understand why you
			should have to spend money on boot camp when you can get. Boot camps have itssuppor
			ters andits detractors.</p>
		<div class="br"></div>
	</aside>
	<aside class="single_sidebar_widget popular_post_widget">
		<h3 class="widget_title">Popular Posts</h3>
		<? for ($i = 0; $i < sizeof($blog); $i++) { ?>
			<? $name = $blog[$i]["name"]; ?>
			<? $cdt = $blog[$i]['cdt']; ?>
			<? $img = $site_url . '/' . getimg($blog[$i]['img']); ?>
			<? $link = $site_url . '/blog-single.php?name=' . rawurlencode($blog[$i]['name']); ?>
			<? include "components/blog-card-sm.php" ?>
		<? } ?>
		<div class="br"></div>
	</aside>
	<aside class="single_sidebar_widget ads_widget">
		<a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
		<div class="br"></div>
	</aside>
	<aside class="single_sidebar_widget post_category_widget">
		<h4 class="widget_title">Post Catgories</h4>
		<ul class="list cat-list">
			<li>
				<a href="#" class="d-flex justify-content-between">
					<p>Technology</p>
					<p>37</p>
				</a>
			</li>
		</ul>
		<div class="br"></div>
	</aside>
	<aside class="single-sidebar-widget newsletter_widget">
		<h4 class="widget_title">Newsletter</h4>
		<p>
			Here, I focus on a range of items and features that we use in life without
			giving them a second thought.
		</p>
		<div class="form-group d-flex flex-row">
			<div class="input-group">
				<div class="input-group-prepend">
					<div class="input-group-text"><i class="fa fa-envelope" aria-hidden="true"></i></div>
				</div>
				<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
			</div>
			<a href="#" class="bbtns">Subcribe</a>
		</div>
		<p class="text-bottom">You can unsubscribe at any time</p>
		<div class="br"></div>
	</aside>
	<aside class="single-sidebar-widget tag_cloud_widget">
		<h4 class="widget_title">Tags</h4>
		<ul class="list">
			<li><a href="#">Technology</a></li>
		</ul>
	</aside>
</div>