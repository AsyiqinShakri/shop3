<? require_once "common.php"; ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title><?= $site_name ?></title>
	<!-- CSS ============================================= -->

	<? $css = array(
		"css/linearicons.css",
		"css/font-awesome.min.css",
		"css/themify-icons.css",
		"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css",
		"//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css",
		"https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css",
		"https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css",
		"css/nouislider.min.css",
		"css/ion.rangeSlider.css",
		"css/ion.rangeSlider.skinFlat.css",
		"css/magnific-popup.css",
		"css/loader.css",
		"css/common.css",
		"css/header.css",
		"css/footer.css",
		"css/index.css",
		"css/blog-card.css",
		"css/blog-rightsidebar.css",
		"css/blog.css",
		"css/breadcrumb.css",
		"css/cart.css",
		"css/category-sidebar.css",
		"css/category.css",
		"css/checkout.css",
		"css/confirmation.css",
		"css/contact.css",
		"css/login.css",
		"css/product-deal.css",
		"css/product-filterbar.css",
		"css/product-single.css",
	); ?>

	<? for ($i = 0; $i < sizeof($css); $i++) { ?>
		<? $link = strpos($css[$i], "//") !== FALSE ? $css[$i] : $site_url . '/' . $css[$i] . '?v=' . $v; ?>
		<link href="<?= $link ?>" rel="stylesheet">
	<? } ?>
</head>

<!-- Start Header Area -->
<header class="header_area sticky-header">
	<div class="main_menu">
		<nav class="navbar navbar-expand-lg navbar-light main_box">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<a class="navbar-brand logo_h" href="<?= $site_url ?>"><img src="img/logo.png" alt="<?= $site_name ?>"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
					<ul class="nav navbar-nav menu_nav ml-auto">
						<li class="nav-item <?= $this_file == 'index.php' ? 'active' : '' ?>"><a class="nav-link" href="<?= $site_url ?>">Home</a></li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/category.php">Shop Category</a></li>
								<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/product-single.php">Product Details</a></li>
								<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/checkout.php">Product Checkout</a></li>
								<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/cart.php">Shopping Cart</a></li>
								<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/confirmation.php">Confirmation</a></li>
							</ul>
						</li>
						<li class="nav-item submenu dropdown <?= $this_file == 'blog.php' || $this_file == 'blog-single.php' ? 'active' : '' ?>">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/blog.php">Blog</a></li>
								<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/blog-single.php">Blog Details</a></li>
							</ul>
						</li>
						<li class="nav-item submenu dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
							<ul class="dropdown-menu">
								<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/login.php">Login</a></li>
								<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/tracking.php">Tracking</a></li>
								<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/elements.php">Elements</a></li>
							</ul>
						</li>
						<li class="nav-item <?= $this_file == 'contact.php' ? 'active' : '' ?>"><a class="nav-link" href="<?= $site_url ?>/contact.php">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="nav-item <?= $this_file == 'cart.php' ? 'active' : '' ?>"><a href="<?= $site_url ?>/cart.php" class="cart"><span class="ti-bag"></span></a></li>
						<li class="nav-item submenu dropdown">
							<a href="javascript:void(0)">
								<span class="ti-user"></span></a>
							</a>
							<ul class="dropdown-menu">
								<? if (!empty($user)) { ?>
									<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/profile.php">My Profile</a></li>
									<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/logout.php">Logout</a></li>
								<? } else { ?>
									<li class="nav-item"><a class="nav-link" href="<?= $site_url ?>/login.php">Login/Register</a></li>
								<? } ?>
							</ul>
						</li>
						<li class="nav-item">
							<button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="search_input" id="search_input_box">
		<div class="container">
			<form class="d-flex justify-content-between">
				<input type="text" class="form-control" id="search_input" placeholder="Search Here">
				<button type="submit" class="btn"></button>
				<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
			</form>
		</div>
	</div>
</header>
<!-- End Header Area -->


<? if ($breadcrumb) { ?>
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-12 col-md-6 col-first text-md-right">
					<h1><?= $page ?></h1>
					<nav class="d-flex align-items-center justify-content-md-end">
						<a href="<?= $site_url ?>">Home<span class="lnr lnr-arrow-right"></span></a>
						<a><?= $page ?></a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
<? } ?>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
	<svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
	</svg>
</div>