<? $breadcrumb = 1; ?>
<? $page = "Login/Register"; ?>
<? include "header.php"; ?>


<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Join Us</h3>
					<form class="row login_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="username" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="primary-btn">Register Now</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Log in to enter</h3>
					<form class="row login_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
						</div>
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="name" name="name" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
						</div>
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="selector">
								<label for="f-option2">Keep me logged in</label>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="primary-btn">Log In</button>
							<a href="#">Forgot Password?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->


<? include "footer.php"; ?>