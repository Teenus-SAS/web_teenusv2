<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Precios, Costos y Rentabilidad | Tezlik</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="keywords" content="tezlik, precios, costos, manufactura, fabricacion, aplicaciones, software" />
    <meta name="description" content="Tezlik-C es una plataforma para generar y analizar los precios de los productos a partir de los costos de fabricacion" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    
    <?php include_once dirname(__DIR__) . '/tezlik/partials/scriptsCSS.php' ?>
</head>

<body>

    <!-- Preloader -->
    <div class="preloader">
        <div class="loader">
            <div class="shadow"></div>
            <div class="box"></div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Page Wrapper Start -->
    <div class="page-wrapper">

        <?php include_once dirname(__DIR__) . '/tezlik/partials/nav.php' ?>
        <?php include_once dirname(__DIR__) . '/tezlik/modules/banner.php' ?>
        <?php include_once dirname(__DIR__) . '/tezlik/modules/works.php' ?>
        <?php include_once dirname(__DIR__) . '/tezlik/modules/about.php' ?>
        <?php include_once dirname(__DIR__) . '/tezlik/modules/overview.php' ?>     
        <?php //include_once dirname(__DIR__) . '/tezlik/modules/interfaces.php' ?>
        <?php //include_once dirname(__DIR__) . '/tezlik/modules/video.php' ?>
        <?php include_once dirname(__DIR__) . '/tezlik/modules/pricing.php' ?>
        <?php //include_once dirname(__DIR__) . '/tezlik/modules/testimonials.php' ?>
        <?php //include_once dirname(__DIR__) . '/tezlik/modules/faq.php' ?>
        <?php //include_once dirname(__DIR__) . '/tezlik/modules/team.php' ?>
        <?php include_once dirname(__DIR__) . '/tezlik/modules/download.php' ?>
        <?php include_once dirname(__DIR__) . '/tezlik/modules/contact.php' ?>
        <?php //include_once dirname(__DIR__) . '/tezlik/modules/map.php' ?>
        
    </div>
    <!-- Page Wrapper End -->
    <?php include_once dirname(__DIR__) . '/tezlik/modules/footer.php' ?>
    

    <!-- Back to Top -->
    <a href="#" class="back-to-top back-to-top-pulse"><i class="fa fa-caret-up"></i></a>

    <!--Jquery js-->
    <script src="/tezlik/assets/js/jquery-3.5.1.min.js"></script>
    <script src="/tezlik/assets/js/bootstrap.min.js"></script>
    <script src="/tezlik/assets/js/plugins.js"></script>
    <!-- Gmap3 Min JS -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDJ_mGhah8EApmFiXYYBsdBuygviP2M2EE"></script> -->
    <!-- <script src="/tezlik/assets/js/map.js"></script>
    <script src="/tezlik/assets/js/gmap3.min.js"></script> -->
    <!--validator js-->
    <script src="/tezlik/assets/js/validator.min.js"></script>
    <!--contact js-->
    <script src="/tezlik/js/contact.js"></script>
    <script src="/tezlik/js/prices.js"></script>
    <!--Site Main js-->
    <script src="/tezlik/assets/js/main.js"></script>
</body>

</html>
<!-- <div class="c-area">
    <span>Email</span>
    <p>
        <a href="#">info@example.com</a><br />
        <a href="#">fax@example.com</a>
    </p>
</div>
</div>
</div>
<div class="col-md-4">
    <div class="d-flex">
        <div class="icon">
            <div class="works-icon">
                <span class="pulse-o"><i class="fa fa-phone"></i></span>
            </div>
        </div>
        <div class="c-area">
            <span>Phone</span>
            <p>
                <a href="#">+1 1234 12345</a><br />
                <a href="#">+2 1234 12345</a>
            </p>
        </div>
    </div>
</div>
</div>
</div>
</div>
<div class="col-md-12">
    <div class="form-container-box">
        <form class="contact-form form" id="ajax-contact" method="post" action="/tezlik/assets/php/contact.php">
            <div class="controls">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name*" required="required" data-error="Name is required." />
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email*" required="required" data-error="Valid email is required." />
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required="required" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control" id="message" name="message" rows="10" placeholder="Write Your Message*" required="required" data-error="Please, leave us a message."></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="button" data-text="Send Message">
                            Send Message
                        </button>
                    </div>
                    <div class="messages">
                        <div class="alert alert alert-success alert-dismissable alert-dismissable hidden" id="msgSubmit">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                &times;
                            </button> Thank You! your message has been sent.
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
</section> -->
<!-- Contact Section End -->

<!-- Map Section Start -->
<!-- <div class="map-area">
    <div class="map-contact">
        <div id="map"></div>
    </div>
</div> -->
<!-- Map Section End -->

<!-- Map Section Start -->
<!-- <div class="map-area">
    <div class="map-canvas" id="contact-map"></div>
</div> -->
<!-- Map Section End -->
</div>
<!-- Page Wrapper End -->

<!-- Footer Section Start -->
<!-- <footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12 footer-content">
                    <div class="footer-colm-1">
                        <a href="#" class="footer-logo">
                            <img class="navbar-brand-dark" src="/tezlik/assets/img/logo-dark.png" alt="brand-logo-dark" />
                        </a>
                        <p>
                            Parim helps Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.
                        </p>
                        <ul class="footer-social-icon">
                            <li>
                                <a href="#"><i class="fa fa-facebook facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-linkedin linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube youtube"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-google-plus google-plus"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 footer-content">
                    <div class="footer-colm-2">
                        <h5 class="footer-colm-title">Quick Link</h5>
                        <ul class="footer-nav">
                            <li>
                                <a href="#">About Parim</a>
                            </li>
                            <li>
                                <a href="#">Pricing</a>
                            </li>
                            <li>
                                <a href="#">Contact us</a>
                            </li>
                            <li>
                                <a href="#">Article</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12 footer-content">
                    <div class="footer-colm-3">
                        <h5 class="footer-colm-title">Support</h5>
                        <ul class="footer-nav">
                            <li>
                                <a href="#">Terms of service</a>
                            </li>
                            <li>
                                <a href="#">Privacy Policies</a>
                            </li>
                            <li>
                                <a href="#">Faq</a>
                            </li>
                            <li>
                                <a href="#">Help Center</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 footer-content contact-box">
                    <div class="footer-colm-4">
                        <h5 class="footer-colm-title">Contact</h5>

                        <p>Phone: <a href="tel:1234-12345">+1 1234 12345</a></p>
                        <p>Fax: <a href="tel:1234-12345">+2 1234 12345</a></p>
                        <p>
                            Email: <a href="mailto:demo@example.com">info@example.com</a>
                        </p>
                    </div>
                </div>
            </div>
            <hr />
            <div class="row justify-content-md-center mt-20">
                <div class="col-lg-4 col-md-6 col-sm-12 footer-subscribe">
                    <form>
                        <input type="Email" name="email" placeholder="Type Your Email" />
                        <a href="#" class="subscribe-btn">Suscribite</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>Copyright &copy; 2022 - All Right Reserved.</p>
                    <p>Designed by Teenus SAS.</p>
                </div>
            </div>
        </div>
    </div>
</footer> -->
<!-- Footer Section End -->

<!-- Back to Top -->
<a href="#" class="back-to-top back-to-top-pulse"><i class="fa fa-caret-up"></i></a>

<?php include_once dirname(__DIR__) . '/tezlik/partials/scriptsJS.php' ?>

</body>

</html>