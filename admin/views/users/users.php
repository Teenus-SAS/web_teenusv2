<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" type="image/png" href="/teenus/assets/img/favicon.png">
    <!-- <link rel="icon" href="/admin/assets/images/favicon-32x32.png" type="image/png" /> -->
    <title>Teenus</title>
    <?php include_once dirname(dirname(__DIR__)) . '/partials/scriptsCSS.php'; ?>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--start header wrapper-->
        <div class="header-wrapper">
            <!--start header -->
            <header>
                <?php include_once dirname(dirname(__DIR__)) . '/partials/header.php' ?>
            </header>
            <!--end header -->

            <!--navigation-->
            <?php include_once dirname(dirname(__DIR__)) . '/partials/nav.php' ?>
            <!--end navigation-->

        </div>
        <!--end header wrapper-->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!-- Start Preloader Area -->
                <div class="preloader">
                    <div class="loader">
                        <div class="shadow"></div>
                        <div class="box"></div>
                    </div>
                </div>
                <!-- End Preloader Area -->

                <div class="page-title-box">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-sm-5 col-xl-6">
                                <div class="page-title">
                                    <h3 class="mb-1 font-weight-bold text-dark">Usuarios y Accesos</h3>
                                    <ol class="breadcrumb mb-3 mb-md-0">
                                        <li class="breadcrumb-item active">Creación de Usuario y Configuración de accesos</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="col-sm-7 col-xl-6">
                                <div class="form-inline justify-content-sm-end">
                                    <button class="btn btn-warning" id="btnNewUser" style="margin-left:490px;">Nuevo Usuario</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-content-wrapper mt--45 mb-5 cardCreateUsers">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form id="formCreateUser">
                                            <div class="row">
                                                <div class="col-3" style="margin-bottom:0px">
                                                    <label>Nombres</label>
                                                    <input type="text" class="form-control text-center" id="nameUser" name="nameUser">

                                                </div>
                                                <div class="col-3" style="margin-bottom:0px"><label for="">Apellidos</label>
                                                    <input type="text" class="form-control text-center" id="lastnameUser" name="lastnameUser">


                                                </div>
                                                <div class="col-4" style="margin-bottom:0px"><label for="">Email</label>
                                                    <input type="text" class="form-control text-center" id="emailUser" name="emailUser">


                                                </div>
                                                <div class="col" style="margin-bottom:0px;margin-top:21px">
                                                    <button class="btn btn-info" id="btnCreateUser" name="btnCreateUser">Actualizar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- page content -->
                <div class="page-content-wrapper mt--45">
                    <div class="container-fluid">
                        <!-- Row 5 -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="tblUsers">

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end page wrapper -->

        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <?php include_once dirname(dirname(__DIR__)) . '/partials/footer.php' ?>
    </div>
    <!--end wrapper-->
    <?php include_once dirname(dirname(__DIR__)) . '/partials/scriptsJS.php'; ?>
    <!--start switcher-->
    <?php include_once dirname(dirname(__DIR__)) . '/partials/swicher.php' ?>
    <!--end switcher-->
    <script src="/admin/js/user/tblUser.js"></script>
    <script src="/admin/js/user/user.js"></script>
</body>

</html>