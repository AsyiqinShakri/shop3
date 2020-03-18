<? $breadcrumb = 1; ?>
<? $page = "Contact Us"; ?>
<? include "header.php"; ?>


<!--================Contact Area =================-->
<section class="contact_area section_gap_bottom">
	<div class="container">
		<div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia." data-mlat="40.701083" data-mlon="-74.1522848">
		</div>
		<div class="row">
			<div class="col-lg-3">
				<div class="contact_info">
					<div class="info_item">
						<i class="lnr lnr-home"></i>
						<h6><?= $site_address ?></h6>
						<p>Santa monica bullevard</p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-phone-handset"></i>
						<h6><a href="tel://<?= $site_phone ?>"><?= $site_phone ?></a></h6>
						<p>Mon to Fri 9am to 6 pm</p>
					</div>
					<div class="info_item">
						<i class="lnr lnr-envelope"></i>
						<h6><a href="mailto:<?= $site_email ?>"><?= $site_email ?></a></h6>
						<p>Send us your query anytime!</p>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name *'" required>
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address *'" required>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject *'" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message *" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message *'" required></textarea>
						</div>
					</div>
					<div class="col-md-12 text-right">
						<button type="submit" value="submit" class="primary-btn">Send Message</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<!--================Contact Area =================-->


<? include "footer.php"; ?>