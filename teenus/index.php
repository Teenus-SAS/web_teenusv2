<!DOCTYPE html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="Soluciones de software personalizadas, Desarrollo web a medida, Tecnología empresarial, Consultoría de TI,Servicios de desarrollo de software,Soluciones de negocio en línea,Eficiencia empresarial,Rentabilidad empresarial,Diseño web,Optimización SEO" />
	<meta name="description" content="Teenus es una empresa de tecnología especializada en soluciones de software y desarrollo web personalizadas para pequeñas y medianas empresas. Ofrecemos servicios de alta calidad para mejorar la eficiencia y la rentabilidad de tu negocio. Contáctanos para obtener una consulta gratuita." />
	<!-- Title -->
	<title>Teenus - Aplicaciones web</title>
	<?php include_once __DIR__ . '/partials/scriptsHeader.php' ?>
	<!-- notifications -->
	<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"> -->

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-50746429-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-50746429-1');
	</script>

	<!-- meta-tag code -->
	<meta name="facebook-domain-verification" content="aet8ulin5sinz6k5do4rkp31bk4syq" />
	<!-- Meta Pixel Code -->
	<!-- <script>
		! function(f, b, e, v, n, t, s) {
			if (f.fbq) return;
			n = f.fbq = function() {
				n.callMethod ?
					n.callMethod.apply(n, arguments) : n.queue.push(arguments)
			};
			if (!f._fbq) f._fbq = n;
			n.push = n;
			n.loaded = !0;
			n.version = '2.0';
			n.queue = [];
			t = b.createElement(e);
			t.async = !0;
			t.src = v;
			s = b.getElementsByTagName(e)[0];
			s.parentNode.insertBefore(t, s)
		}(window, document, 'script',
			'https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '488699820106746');
		fbq('track', 'PageView');
	</script>
	<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=488699820106746&ev=PageView&noscript=1" /></noscript> -->
	<!-- End Meta Pixel Code -->

	<!-- script Apollo -->
	<script>
		function initApollo() {
			var n = Math.random().toString(36).substring(7),
				o = document.createElement("script");
			o.src = "https://assets.apollo.io/micro/website-tracker/tracker.iife.js?nocache=" + n, o.async = !0, o.defer = !0,
				o.onload = function() {
					window.trackingFunctions.onLoad({
						appId: "6631641244358801c763fb74"
					})
				},
				document.head.appendChild(o)
		}
		initApollo();
	</script>

</head>

<body>

	<!-- Social Bar -->
	<div class="social-bar">
		<a href="https://www.facebook.com/teenus.com.co" class="icon icon-facebook" target="_blank"></a>
		<a href="https://www.instagram.com/teenussas/" class="icon icon-instagram" target="_blank"></a>
		<a href="https://www.tiktok.com/@teenussas" class="icon icon-tiktok" target="_blank"></a>
		<a href="https://www.linkedin.com/company/teenus/" class="icon icon-linkedin" target="_blank"></a>
		<a href="https://www.youtube.com/@teenuss.a.s4396" class="icon icon-youtube" target="_blank"></a>
		<a href="https://twitter.com/teenus_sas" class="icon icon-twitter" target="_blank"></a>
	</div>

	<!--wrapper-->
	<div class="wrapper">
		<div class="page-content">
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
			<?php //include_once __DIR__ . '/modules/about.php' 
			?>
			<!-- End About Section -->

			<!-- Start Services Section -->
			<?php include_once __DIR__ . '/modules/services.php' 
			?>
			<!-- End Services Section -->

			<!-- Start Project Section -->
			<?php include_once __DIR__ . '/modules/projects.php' 
			?>
			<!-- End Project Section -->

			<!-- Start Counter Section -->
			<?php //include_once __DIR__ . '/modules/counter.php' 
			?>
			<!-- End Counter Section -->

			<!-- Start Overview Section -->
			<?php //include_once __DIR__ . '/modules/about2.php' 
			?>
			<!-- End Overview Section -->

			<!-- Start Team Section -->
			<?php //include_once __DIR__ . '/modules/team.php' 
			?>

			<!-- End Team Section -->

			<!-- Start Hire Section -->
			<?php //include_once __DIR__ . '/modules/banner.php' 
			?>
			<!-- End Hire Section -->

			<!-- Start Testimonial Section -->
			<?php //include_once __DIR__ . '/modules/testimonials.php' 
			?>
			<!-- End Testimonial Section -->

			<!-- Start Partner section -->
			<?php //include_once __DIR__ . '/modules/partners.php' 
			?>
			<!-- End Partner section -->

			<!-- Start Blog Section -->
			<?php include_once __DIR__ . '/modules/blog.php' ?>
			<!-- End Blog Section -->

			<!-- Start Contact Section -->
			<?php //include_once __DIR__ . '/modules/contact.php' 
			?>
			<!-- End Contact Section -->

			<!-- Start policy -->
			<?php include_once __DIR__ . '/modals/policy.php' ?>
			<!-- End policy -->

			<!-- Start Footer & Subscribe Section -->
			<?php include_once __DIR__ . '/modules/footerSubscribe.php' ?>
			<!-- End Footer & Subscribe Section -->

			<!-- Start Copy Right Section -->
			<?php include_once __DIR__ . '/modules/copyright.php' ?>
			<!-- End Copy Right Section -->
		</div>
	</div>

	<!-- Start Go Top Section -->
	<div class="go-top">
		<i class="fas fa-chevron-up"></i>
		<i class="fas fa-chevron-up"></i>
	</div>
	<!-- End Go Top Section -->
	<img class="btn-whatsapp" src="https://clientes.dongee.com/whatsapp.png" width="64" height="64" alt="Whatsapp" onclick="window.location.href='https://wa.me/573002983150?text=Hola! Me gustaría ver un Demo'">

	<?php include_once __DIR__ . '/partials/scriptsJS.php' ?>

</body>

</html>