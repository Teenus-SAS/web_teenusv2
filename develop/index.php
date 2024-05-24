<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Teenus - Desarrollo de software a medida">
    <meta name="description" content="En Teenus nos especializamos en el desarrollo de software a medida para pymes y emprendedores. Ofrecemos soluciones innovadoras, personalizadas y asequibles para tus necesidades tecnológicas">
    <title>Desarrollo de Software a la Medida</title>
    <?php include_once __DIR__ . '/partials/scriptsCSS.php' ?>

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

    <!--Start Preloader-->
    <!-- <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell align-middle">
                <div class="spinner">
                    <div class="double-bounce1"></div>
                    <div class="double-bounce2"></div>
                </div>
            </div>
        </div>
    </div> -->
    <!--End Preloader-->

    <!--start header-->
    <?php require_once dirname(__DIR__) . '/develop/partials/nav.php'; ?>
    <!--end header-->

    <!--start home area-->
    <?php require_once dirname(__DIR__) . '/develop/modules/banner.php'; ?>
    <!--end home area-->

    <!--start feature area-->
    <?php require_once dirname(__DIR__) . '/develop/modules/features.php'; ?>
    <!--end feature area-->

    <!--start about area-->
    <?php require_once dirname(__DIR__) . '/develop/modules/aboutDevelop.php'; ?>
    <!--end about area-->

    <!--start video area-->
    <?php //require_once dirname(__DIR__) . '/develop/modules/video.php'; 
    ?>
    <!--end video area-->

    <!--start why choose area-->
    <?php require_once dirname(__DIR__) . '/develop/modules/whyChoseArea.php'; ?>
    <!--end why choose area-->

    <!--start product area-->
    <?php //require_once dirname(__DIR__) . '/develop/modules/ProductArea.php'; 
    ?>
    <!--end product area-->

    <!--start testimonial area-->
    <?php //require_once dirname(__DIR__) . '/develop/modules/testimonials.php'; 
    ?>
    <!--end testimonial area-->

    <!--start newsletter area-->
    <?php //require_once dirname(__DIR__) . '/develop/modules/newsletter.php'; 
    ?>
    <!--end newsletter area-->

    <!--start faq area-->
    <?php require_once dirname(__DIR__) . '/develop/modules/faq.php'; ?>
    <!--end faq area-->

    <!--start contact area-->
    <?php require_once dirname(__DIR__) . '/develop/modules/contact.php'; ?>
    <!--end contact area-->

    <!--start footer-->
    <?php require_once dirname(__DIR__) . '/develop/modules/footer.php'; ?>
    <!--end footer-->
    <img class="btn-whatsapp" src="https://clientes.dongee.com/whatsapp.png" width="64" height="64" alt="Whatsapp" onclick="window.location.href='https://wa.me/573002983150?text=Hola! Me gustaría que hablaramos para mejorar mis procesos y ser mas productivo'">

    <?php require_once dirname(__DIR__) . '/develop/partials/scriptsJS.php'; ?>
    <script>
        let zone = 'Desarrollo de Software'
    </script>
</body>

</html>