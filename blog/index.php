<!doctype html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title -->
	<title>Teenus - Blog</title>
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;500;600;700;800&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="/teenus/assets/img/favicon.png">
	<!-- Bootstrap Min CSS -->
	<!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<!-- Animate Min CSS -->
	<link rel="stylesheet" href="/teenus/assets/css/animate.min.css">
	<!-- FlatIcon CSS -->
	<!-- <link rel="stylesheet" href="/teenus/assets/css/flaticon.css"> -->
	<!-- Font Awesome Min CSS -->
	<!-- <link rel="stylesheet" href="/teenus/assets/css/fontawesome.min.css"> -->
	<!-- Mran Menu CSS -->
	<link rel="stylesheet" href="/teenus/assets/css/meanmenu.css">
	<!-- Magnific Popup Min CSS -->
	<link rel="stylesheet" href="/teenus/assets/css/magnific-popup.min.css">
	<!-- Nice Select Min CSS -->
	<link rel="stylesheet" href="/teenus/assets/css/nice-select.min.css">
	<!-- Swiper Min CSS -->
	<link rel="stylesheet" href="/teenus/assets/css/swiper.min.css">
	<!-- Owl Carousel Min CSS -->
	<link rel="stylesheet" href="/teenus/assets/css/owl.carousel.min.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="/teenus/assets/css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="/teenus/assets/css/responsive.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet">

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
	<!-- Start Preloader Area -->
	<div class="preloader">
		<div class="loader">
			<div class="shadow"></div>
			<div class="box"></div>
		</div>
	</div>
	<!-- End Preloader Area -->

	<!-- Start Navbar Area -->
	<?php require_once dirname(__DIR__) . '/teenus/partials/nav.php'; ?>
	<!-- End Navbar Area -->

	<!-- Start Page Title Area -->
	<div class="page-title-area item-bg2">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="page-title-content">
						<h2>«La innovación es lo que distingue al líder de los seguidores». – Steve Jobs</h2>
						<!-- <ul>
							<li><a href="/">Home</a></li>
						</ul> -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Page Title Area -->

	<!-- Start Blog Section -->
	<section class="blog-section pt-100 pb-100">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="row articles">
					</div>
					<div class="col-lg-12 col-md-12">
						<div class="pagination-area"> <a href="javascript:;" class="prev page-numbers"><i class="fas fa-angle-double-left"></i></a>
							<a href="javascript:;" class="page-numbers">1</a>
							<span class="page-numbers current" aria-current="page">2</span>
							<a href="javascript:;" class="page-numbers">3</a>
							<a href="javascript:;" class="page-numbers">4</a>
							<a href="javascript:;" class="next page-numbers"><i class="fas fa-angle-double-right"></i></a>
						</div>
					</div>
				</div>
				<?php include_once dirname(__DIR__) . '/teenus/modules/secondary_widget_area.php' ?>
			</div>
		</div>
	</section>
	<!-- End Blog Section -->

	<!-- Start Footer & Subscribe Section -->
	<?php include_once dirname(__DIR__) . '/teenus/modules/footerSubscribe.php' ?>
	<!-- End Footer & Subscribe Section -->

	<!-- Start Copy Right Section -->
	<?php include_once dirname(__DIR__) . '/teenus/modules/copyright.php' ?>
	<!-- End Copy Right Section -->

	<!-- Start Go Top Section -->
	<div class="go-top">
		<i class="fas fa-chevron-up"></i>
		<i class="fas fa-chevron-up"></i>
	</div>
	<!-- Preloader -->
	<script src="/assets/js/preloader.js"></script>

	<!-- jQuery Min JS -->
	<script src="/teenus/assets/js/jquery.min.js"></script>
	<script>
		$('html, body').animate({
				scrollTop: 0,
			},
			1000
		);
	</script>
	<!-- Popper Min JS -->
	<!-- <script src="/teenus/assets/js/popper.min.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<!-- Bootstrap Min JS -->
	<script src="/teenus/assets/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/169f3bd126.js" crossorigin="anonymous"></script>
	<!-- MeanMenu JS  -->
	<script src="/teenus/assets/js/jquery.meanmenu.js"></script>
	<!-- Appear Min JS -->
	<script src="/teenus/assets/js/jquery.appear.min.js"></script>
	<!-- CounterUp Min JS -->
	<script src="/teenus/assets/js/jquery.waypoints.min.js"></script>
	<script src="/teenus/assets/js/jquery.counterup.min.js"></script>
	<!-- Owl Carousel Min JS -->
	<script src="/teenus/assets/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup Min JS -->
	<script src="/teenus/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- Nice Select Min JS -->
	<script src="/teenus/assets/js/jquery.nice-select.min.js"></script>
	<!-- Isotope Min JS -->
	<script src="/teenus/assets/js/isotope.pkgd.min.js"></script>
	<!-- Swiper Min JS -->
	<!-- <script src="/teenus/assets/js/swiper.min.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	<!-- WOW Min JS -->
	<script src="/teenus/assets/js/wow.min.js"></script>
	<!-- Main JS -->
	<script src="/teenus/assets/js/main.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script src="/global/js/loadArticles.js"></script>
	<script src="/blog/js/blog.js"></script>
</body>

</html>