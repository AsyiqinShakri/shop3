<!-- start footer Area -->
<footer class="footer-area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-3  col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h6>About Us</h6>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
						magna aliqua.
					</p>
				</div>
			</div>
			<div class="col-lg-4  col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h6>Newsletter</h6>
					<p>Stay update with our latest</p>
					<div class="" id="mc_embed_signup">

						<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

							<div class="d-flex flex-row">

								<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">


								<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
								<div style="position: absolute; left: -5000px;">
									<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
								</div>
							</div>
							<div class="info"></div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-3  col-md-6 col-sm-6">
				<div class="single-footer-widget mail-chimp">
					<h6 class="mb-20">Instragram Feed</h6>
					<ul class="instafeed d-flex flex-wrap">
						<li><img src="img/i1.jpg" alt=""></li>
						<li><img src="img/i2.jpg" alt=""></li>
						<li><img src="img/i3.jpg" alt=""></li>
						<li><img src="img/i4.jpg" alt=""></li>
						<li><img src="img/i5.jpg" alt=""></li>
						<li><img src="img/i6.jpg" alt=""></li>
						<li><img src="img/i7.jpg" alt=""></li>
						<li><img src="img/i8.jpg" alt=""></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h6>Follow Us</h6>
					<p>Let us be social</p>
					<div class="footer-social d-flex align-items-center">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
			<p class="footer-text m-0">
				Copyright &copy;<script>
					document.write(new Date().getFullYear());
				</script> All rights reserved
			</p>
		</div>
	</div>
</footer>
<!-- End footer Area -->
<?
$js = array(
	"https://code.jquery.com/jquery-3.4.1.min.js",
	"https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js",
	"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js",
	"https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js",
	"js/jquery.sticky.js",
	"js/nouislider.min.js",
	"js/countdown.js",
	"js/jquery.magnific-popup.min.js",
	"//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js",
	"https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE",
	"js/bootstrap-notify.min.js",
	"js/gmaps.min.js",
	"js/common.js",
	"js/main.js",
	"js/member.js",
	"js/shop.js",
);
?>
<? for ($i = 0; $i < sizeof($js); $i++) { ?>
	<? $link = strpos($js[$i], "//") !== FALSE ? $js[$i] : $site_url . "/" . $js[$i] . "?v=" . $v; ?>
	<script src="<?= $link ?>"></script>
<? } ?>
<? include "notification.php"; ?>
</body>

</html>