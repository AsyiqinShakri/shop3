<? $breadcrumb = 1; ?>
<? $page = "Login/Register"; ?>
<? include "header.php"; ?>
<? if (!empty($user)) go($site_url . "/category.php"); ?>
<? $rusr = $usr = "adrian@rubysoft.com.my"; ?>
<? $rpwd = $rcpwd = $pwd = "123456"; ?>

<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_form_inner reg_form">
					<h3>Join Us</h3>
					<form class="row register_form" action="" method="post" id="registerForm" novalidate="novalidate">
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="remail" name="remail" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" value="<?= $rusr ?>">
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" value="<?= $rpwd ?>">
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="rcpassword" name="rcpassword" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" value="<?= $rcpwd ?>">
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" class="primary-btn">Register Now</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>Log in</h3>
					<form class="row login_form" action="" method="post" id="loginForm" novalidate="novalidate">
						<div class="col-md-12 form-group">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" value="<?= $usr ?>">
						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" value="<?= $pwd ?>">
						</div>
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="rememberMe" name="rememberMe">
								<label for="rememberMe">Keep me logged in</label>
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