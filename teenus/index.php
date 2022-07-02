<!DOCTYPE html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title -->
	<title>Teenus - Aplicaciones web</title>
	<?php include_once __DIR__ . '/partials/scriptsHeader.php' ?>

	<style>
		img.btn-whatsapp {
			display: block !important;
			position: fixed;
			z-index: 9999999;
			bottom: 580px;
			right: 20px;
			cursor: pointer;
			border-radius: 100px !important;
		}

		img.btn-whatsapp:hover {
			border-radius: 100px !important;
			-webkit-box-shadow: 0px 0px 15px 0px rgba(7, 94, 84, 1);
			-moz-box-shadow: 0px 0px 15px 0px rgba(7, 94, 84, 1);
			box-shadow: 0px 0px 15px 0px rgba(7, 94, 84, 1);
			transition-duration: 1s;
		}
	</style>
</head>

<body>

	<!-- Start Preloader Area -->
	<div class="preloader">
		<div class="loader">
			<div class="shadow"></div>
			<div class="box"></div>
		</div>
	</div>
	<!-- End Preloader Area -->

	<!-- Start Navbar Area -->
	<?php include_once __DIR__ . '/partials/nav.php' ?>
	<!-- End Navbar Area -->

	<!-- Start Slider Are -->
	<?php include_once __DIR__ . '/modules/slider.php' ?>
	<!-- End Slider Area -->

	<!-- Start About Section -->
	<?php include_once __DIR__ . '/modules/about.php' ?>
	<!-- End About Section -->

	<!-- Start Services Section -->
	<?php //include_once __DIR__ . '/modules/services.php' 
	?>
	<!-- End Services Section -->

	<!-- Start Project Section -->
	<?php //include_once __DIR__ . '/modules/projects.php' ?>
	<!-- End Project Section -->

	<!-- Start Counter Section -->
	<?php include_once __DIR__ . '/modules/counter.php' ?>
	<!-- End Counter Section -->

	<!-- Start Overview Section -->
	<?php include_once __DIR__ . '/modules/about2.php' ?>
	<!-- End Overview Section -->

	<!-- Start Team Section -->
	<?php //include_once __DIR__ . '/modules/team.php' 
	?>

	<!-- End Team Section -->

	<!-- Start Hire Section -->
	<?php include_once __DIR__ . '/modules/banner.php' ?>
	<!-- End Hire Section -->

	<!-- Start Testimonial Section -->
	<?php //include_once __DIR__ . '/modules/testimonials.php' 
	?>
	<!-- End Testimonial Section -->

	<!-- Start Partner section -->
	<?php include_once __DIR__ . '/modules/partners.php' ?>
	<!-- End Partner section -->

	<!-- Start Blog Section -->
	<?php //include_once __DIR__ . '/modules/blog.php' 
	?>
	<!-- End Blog Section -->

	<!-- Start Contact Section -->
	<?php include_once __DIR__ . '/modules/contact.php' ?>
	<!-- End Contact Section -->

	<!-- Start Footer & Subscribe Section -->
	<?php include_once __DIR__ . '/modules/footerSubscribe.php' ?>
	<!-- End Footer & Subscribe Section -->

	<!-- Start Copy Right Section -->
	<?php include_once __DIR__ . '/modules/copyright.php' ?>
	<!-- End Copy Right Section -->

	<!-- Start Go Top Section -->
	<div class="go-top">
		<i class="fas fa-chevron-up"></i>
		<i class="fas fa-chevron-up"></i>
	</div>
	<!-- End Go Top Section -->
	<img class="btn-whatsapp" src="https://clientes.dongee.com/whatsapp.png" width="64" height="64" alt="Whatsapp" onclick="window.location.href='https://wa.me/573214989109?text=Hola! Me gustaría que hablaramos y saber más'">
	<?php include_once __DIR__ . '/partials/scriptsJS.php' ?>

</body>

</html>