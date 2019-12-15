<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Sublime project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
<link rel="styles" type="text/css" href="styles/bootstrap4/sua.css">

</head>
<body>
<?php 
ob_start();
include_once('config/connect.php');
session_start(); ?>
<div class="super_container">

	<!-- Header -->
	<?php include_once('header/header.php'); ?>
	
	<!-- Home -->
	
	<?php
		if(isset($_GET['page_layout'])){
			$page_layout = $_GET['page_layout'];
			switch($page_layout){
				case 'categories':
					include_once('product/categories.php');
					break;
					case 'brand':
						include_once('product/brand.php');
						break;
				case 'product':
					include_once('product/product.php');
				break;
				case 'cart':
					include_once('cart/cart.php');
					break;
				case 'add_cart':
					include_once('cart/add_cart.php');
					break;
				case 'clear_cart':
					include_once('cart/clear_cart.php');
					break;
				case 'check_out':
					include_once('cart/checkout.php');
					break;
				case 'contact':
					include_once('header/contact.php');
				break;
				case 'complete':
					include_once('cart/complete.php');
			break;
			case 'sendct':
				include_once('cart/sendct.php');
		break;
			}}
				
			
else{
	?>
	<?php include_once('ads/home.php'); ?>
	<!-- Ads -->
	<?php include_once('ads/ads.php'); ?>
	

	<!-- Products -->
	<?php include_once('product/product_home.php'); ?>

	
	<!-- Ad -->
	<?php include_once('ads/ads_foot.php'); ?>
	
	<!-- Icon Boxes -->
	<?php include_once('ads/iconbx.php'); ?>
	

	<!-- Newsletter -->

	<?php include_once('ads/newlet.php'); ?>
<?php } ?>
	<!-- Footer -->
	<?php include_once('footer/footer.php'); ?>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>