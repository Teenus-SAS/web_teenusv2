<?php require_once __DIR__ . '/modals/modalContact.php' ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="keywords" content="tezliksoftware, precios, costos, manufactura, fabricacion, aplicaciones, software" />
    <meta name="description" content="Tecnología para transformar tu negocio. TezlikSoftware es una aplicación web que ofrece soluciones de software personalizadas para pequeñas y medianas empresas. Nuestros servicios incluyen el análisis de materias primas, la fijación de precios, el costeo y el manejo de economías de escala para optimizar la rentabilidad de tu negocio. Contáctanos para obtener una consulta gratuita y descubre cómo nuestra aplicación web puede ayudarte a aumentar tu eficiencia y rentabilidad." />
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests" /> -->
    <title>Precios, Costos y Rentabilidad | Tezlik</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

    <?php include_once __DIR__ . '/partials/scriptsCSS.php' ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-50746429-1"></script>

    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=488699820106746&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body>

    <!-- Social Bar -->
    <div class="social-bar">
        <a href="https://www.facebook.com/profile.php?id=100089428009182" class="icon icon-facebook" target="_blank"></a>
        <a href="https://www.instagram.com/leadMagnetsoftware/" class="icon icon-instagram" target="_blank"></a>
        <a href="https://www.tiktok.com/@tezliksofware" class="icon icon-tiktok" target="_blank"></a>
        <a href="https://www.linkedin.com/showcase/3704958/admin/" class="icon icon-linkedin" target="_blank"></a>
        <a href="https://www.youtube.com/@teenuss.a.s4396" class="icon icon-youtube" target="_blank"></a>
        <a href="https://twitter.com/teenus_sas" class="icon icon-twitter" target="_blank"></a>
    </div>

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
        <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
            <div class="container">
                <div class="d-lg-none logo">
                    <a href="/">
                        <span class="logo-sm"><img src="/assets/images/teenus/icono_teenus_white.png" style="width: 50px" class="navbar-brand-regular" alt="icon tezlik"></span>
                        <span class="logo-sm"><img src="/assets/images/teenus/icono_teenus.png" style="width: 50px" class="navbar-brand-dark" alt="Lettstart Admin"></span>
                    </a>
                </div>
                <div class="d-none d-lg-block logo">
                    <a href="/">
                        <span class="logo-lg"><img src="/assets/images/teenus/logo_white.png" style="width: 120px" class="navbar-brand-regular" alt="Logo tezlik"></span>
                        <span class="logo-lg"><img src="/assets/images/teenus/logo.png" style="width: 120px" class="navbar-brand-dark" alt="Lettstart Admin"></span>
                    </a>
                </div>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault" aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link js-scroll active" href="#home">Inicio</a></li>
                        <!-- <li class="nav-item"><a class="nav-link js-scroll" href="#about">¿Cómo funciona? </a></li> 
                        <li class="nav-item"><a class="nav-link js-scroll" href="#price">Precios</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll" href="#video">Beneficios</a></li>  -->
                        <li class="nav-item"><a class="nav-link js-scroll mr-5" href="/blogs">Blog</a></li>
                        <!-- <li class="nav-item"><a href="javascript:;" target="_blank" onclick="window.location.href='https://wa.me/573002983150?text=¡Hola! Me gustaría ver un Demo'" class="button btnPlan buttonContact js-scroll apps-store-btn-1" id="contactUs" style="margin-top:0px;border-radius: 10px;">Contactanos</a></li> -->
                        <!-- <li class="nav-item"><a href="#openModal" class="button apps-store-btn-1" id="registerTezlik" style="margin-top:0px;border-radius: 10px;">Registrate</a></li>
                        <li class="nav-item"><a href="#javascript:;" target="_blank" onclick="window.location.href='https://demo.tezliksoftware.com.co'" class="button btnPlan buttonLogin js-scroll apps-store-btn-1" id="login" style="margin-top:0px;border-radius: 10px;">Ingresar</a></li> -->
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Home Section Start -->
        <header id="home" class="home-area hero-equal-height section-padding overflow-hidden d-flex align-items-center">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-md-7 col-lg-6">
                        <div class="text-left home-content z-index position-relative">
                            <h1 class="text-uppercase" id="titleLeadMagnet" style="color:white">Costea y cotiza en 5 minutos o te devolvemos tu dinero</h1>
                            <div class="d-lg-none text-center z-index position-relative home-image">
                                <img src="/tezlik/assets/img/calcular-precio-producto.png" class="img-fluid" alt="" />
                            </div>

                            <div class="pricing-footer">
                                <!-- <a href="javascript:;" target="_blank" onclick="window.location.href='https://wa.me/573002983150?text=¡Hola! Me gustaría ver un Demo'" class="button btnPlan js-scroll" id="emprendedor">Registrate Gratis</a> -->
                                <a href="javascript:;" class="button apps-store-btn-1" id="openModalForm" style="margin-top:0px;border-radius: 10px;">Registrate Gratis</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-block col-12 col-md-5 col-lg-6">
                        <div class="text-center z-index position-relative home-image contenedor-image" id="imgLeadMagnet">
                        </div>
                        <!-- <div class="text-center z-index position-relative home-image">
                    <img src="/leadMagnet/assets/img/calcular-precio-producto.png" class="img-fluid" alt="" />
                </div> -->
                    </div>
                </div>
            </div>
            <div class="svg-shape-bottom">
                <img src="/leadMagnet/assets/img/home-bottom-shape.png" class="bottom-shape img-fluid" alt="" />
            </div>
        </header>
    </div>
    <!-- Page Wrapper End -->
    <?php include_once dirname(__DIR__) . '/leadMagnet/modules/footer.php' ?>


    <!-- Back to Top -->
    <a href="#" class="back-to-top back-to-top-pulse"><i class="fa fa-caret-up"></i></a>

    <?php include_once dirname(__DIR__) . '/leadMagnet/partials/scriptsJS.php' ?>
    <script src="/leadMagnet/js/contact.js"></script>
    <script>
        title = "<?= $_GET['url'] ?>";
    </script>
    <script src="/leadMagnet/js/leadMagnet.js"></script>
    <script>
        let zone = 'Tezlik'
    </script>
</body>

</html>