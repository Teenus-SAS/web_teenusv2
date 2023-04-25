<?php include_once dirname(__DIR__) . '/teenus/modals/login.php' ?>
<!doctype html>
<html lang="es">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title -->
	<title>Teenus - Ebooks</title>
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

	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet">
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
					<div style="color:white" class="mb-4">
						<h3>Todos los Ebooks</h3>
					</div>
					<div class="input-group col-md-6" style="margin:auto">
						<input class="form-control py-2 border-right-0 border" type="search" id="example-search-input" placeholder="Buscar" style="height: 50px">
						<span class="input-group-append" style="height: 50px">
							<button class="btn btn-outline-secondary border-left-0 border" type="button">
								<i class="fa fa-search mt-1" aria-hidden="true"></i>
							</button>
						</span>
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
					<div class="row ebooks">
						<div class="col-lg-6 col-md-6">
							<div class="blog-item" id="idArticle-1">
								<div class="blog-image">
									<a href="javascript:;" class="image-1">
										<img src="/teenus/assets/img/blog/blog-1.jpg" alt="image">
									</a>
								</div>
								<div class="single-blog-item">
									<ul class="blog-list">
										<li><a href="javascript:;"><i class="fa fa-user-alt" id="author-1"></i></a></li>
										<li><a href="javascript:;"><i class="fas fa-calendar-week" id="date-1"></i></a></li>
										<li>
											<a href="javascript:;"> <i class="bi bi-eye-fill" id="view-1"> </i></a>
										</li>
									</ul>
									<div class="blog-content">
										<h3>
											<a href="javascript:;" id="title-1">Planning for a Safe Return to the Workplace IT Solutions</a>
										</h3>
										<p id="content-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt</p>
										<div class="blog-btn"> <a href="javascript:;" class="blog-btn-one">Read More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="blog-item" id="idArticle-2">
								<div class="blog-image">
									<a href="javascript:;" class="image-2">
										<img src="/teenus/assets/img/blog/blog-2.jpg" alt="image">
									</a>
								</div>
								<div class="single-blog-item">
									<ul class="blog-list">
										<li>
											<a href="javascript:;"> <i class="fa fa-user-alt" id="author-2"></i></a>
										</li>
										<li>
											<a href="javascript:;"> <i class="fas fa-calendar-week" id="date-2"></i></a>
										</li>
										<li>
											<a href="javascript:;"> <i class="bi bi-eye-fill" id="view-2"> </i></a>
										</li>
									</ul>
									<div class="blog-content">
										<h3>
											<a href="javascript:;" id="title-2">
												Announcing Our New Smiles for Success Charity
											</a>
										</h3>
										<p id="content-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt</p>
										<div class="blog-btn">
											<a href="javascript:;" class="blog-btn-one">Read More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="blog-item" id="idArticle-3">
								<div class="blog-image">
									<a href="javascript:;" class="image-3">
										<img src="/teenus/assets/img/blog/blog-3.jpg" alt="image">
									</a>
								</div>
								<div class="single-blog-item">
									<ul class="blog-list">
										<li>
											<a href="javascript:;"> <i class="fa fa-user-alt" id="author-3"></i></a>
										</li>
										<li>
											<a href="javascript:;"> <i class="fas fa-calendar-week" id="date-3"></i></a>
										</li>
										<li>
											<a href="javascript:;"> <i class="bi bi-eye-fill" id="view-3"> </i></a>
										</li>
									</ul>
									<div class="blog-content">
										<h3>
											<a href="javascript:;" id="title-3">
												Machine Learning Applications for Every Industry
											</a>
										</h3>
										<p id="content-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt</p>
										<div class="blog-btn"> <a href="javascript:;" class="blog-btn-one">Read More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="blog-item" id="idArticle-4">
								<div class="blog-image">
									<a href="javascript:;" class="image-4">
										<img src="/teenus/assets/img/blog/blog-4.jpg" alt="image">
									</a>
								</div>
								<div class="single-blog-item">
									<ul class="blog-list">
										<li>
											<a href="javascript:;"> <i class="fa fa-user-alt" id="author-4"></i></a>
										</li>
										<li>
											<a href="javascript:;"> <i class="fas fa-calendar-week" id="date-4"></i></a>
										</li>
										<li>
											<a href="javascript:;"> <i class="bi bi-eye-fill" id="view-4"> </i></a>
										</li>
									</ul>
									<div class="blog-content">
										<h3>
											<a href="javascript:;" id="title-4">
												5 Technology Considerations for Office Relocations
											</a>
										</h3>
										<p id="content-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt</p>
										<div class="blog-btn"> <a href="javascript:;" class="blog-btn-one">Read More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="blog-item" id="idArticle-5">
								<div class="blog-image">
									<a href="javascript:;" class="image-5">
										<img src="/teenus/assets/img/blog/blog-5.jpg" alt="image">
									</a>
								</div>
								<div class="single-blog-item">
									<ul class="blog-list">
										<li>
											<a href="javascript:;"> <i class="fa fa-user-alt" id="author-5"></i></a>
										</li>
										<li>
											<a href="javascript:;"> <i class="fas fa-calendar-week" id="date-5"></i></a>
										</li>
										<li>
											<a href="javascript:;"> <i class="bi bi-eye-fill" id="view-5"> </i></a>
										</li>
									</ul>
									<div class="blog-content">
										<h3>
											<a href="javascript:;" id="title-5">
												Everything you need to know about geo-blocking
											</a>
										</h3>
										<p id="content-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt</p>
										<div class="blog-btn">
											<a href="javascript:;" class="blog-btn-one">Read More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="blog-item" id="idArticle-6">
								<div class="blog-image">
									<a href="javascript:;" class="image-6">
										<img src="/teenus/assets/img/blog/blog-6.jpg" alt="image">
									</a>
								</div>
								<div class="single-blog-item">
									<ul class="blog-list">
										<li>
											<a href="javascript:;"> <i class="fa fa-user-alt" id="author-6"></i></a>
										</li>
										<li>
											<a href="javascript:;"> <i class="fas fa-calendar-week" id="date-6"></i></a>
										</li>
										<li>
											<a href="javascript:;"> <i class="bi bi-eye-fill" id="view-6"> </i></a>
										</li>
									</ul>
									<div class="blog-content">
										<h3>
											<a href="javascript:;" id="title-6">
												Internal or outsourced IT: What’s the best choice?
											</a>
										</h3>
										<p id="content-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt</p>
										<div class="blog-btn"> <a href="javascript:;" class="blog-btn-one">Read More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- <div class="col-lg-12 col-md-12">
						<div class="pagination-area"> <a href="javascript:;" class="prev page-numbers"><i class="fas fa-angle-double-left"></i></a>
							<a href="javascript:;" class="page-numbers">1</a>
							<span class="page-numbers current" aria-current="page">2</span>
							<a href="javascript:;" class="page-numbers">3</a>
							<a href="javascript:;" class="page-numbers">4</a>
							<a href="javascript:;" class="next page-numbers"><i class="fas fa-angle-double-right"></i></a>
						</div>
					</div> -->
				</div>
				<div class="col-lg-4 col-md-12">
					<aside class="widget-area" id="secondary">
						<section class="widget widget_search">
							<form class="search-form search-top mb-0">
								<div class="nice-select form-control" tabindex="0" style="height: 50px;"><span class="current">Categoria</span>
									<ul class="list">
										<li data-value="0" class="option selected disabled">Categoria</li>
										<li data-value="1" class="option">Desarrollo</li>
										<li data-value="2" class="option">Tezlik</li>
									</ul>
								</div>
							</form>
						</section>
						<section class="widget widget_techvio_posts_thumb">
							<h3 class="widget-title">Popular Posts</h3>
							<article class="item" id="item-1">
								<a href="javascript:;" class="thumb p-image-1"> <span class="fullimage cover bg1" role="img"></span>
								</a>
								<div class="info">
									<span class="bi bi-eye-fill" id="p-view-1"></span>
									<h4 class="title usmall">
										<a href="javascript:;" id="p-title-1">5 Technology Considerations for Office Relocations</a>
									</h4>
								</div>
							</article>
							<article class="item" id="item-2">
								<a href="javascript:;" class="thumb p-image-2"> <span class="fullimage cover bg2" role="img"></span>
								</a>
								<div class="info">
									<span class="bi bi-eye-fill" id="p-view-2"></span>
									<h4 class="title usmall">
										<a href="javascript:;" id="p-title-2">Everything you need to know about geo-blocking</a>
									</h4>
								</div>
							</article>
							<article class="item" id="item-3">
								<a href="javascript:;" class="thumb p-image-3"> <span class="fullimage cover bg3" role="img"></span>
								</a>
								<div class="info">
									<span class="bi bi-eye-fill" id="p-view-3"></span>
									<h4 class="title usmall">
										<a href="javascript:;" id="p-title-3">Machine Learning Applications for Every Industry</a>
									</h4>
								</div>
							</article>
						</section>
					</aside>
				</div>
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

	<script src="/global/js/login.js"></script>
	<script src="/ebooks/js/ebook.js"></script>
</body>

</html>