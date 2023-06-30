<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="/admin/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/admin/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="/admin/assets/css/pace.min.css" rel="stylesheet" />
    <script src="/admin/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="/admin/assets/css/app.css" rel="stylesheet">
    <link href="/admin/assets/css/icons.css" rel="stylesheet">
    <title>Teenus - Admin</title>

    <!-- ================== BEGIN APP CSS  ================== -->
    <link rel="stylesheet" href="/admin/assets/css/bootstrap.min.css" />
    <!-- Notifications -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">

</head>

<body class="bg-login">

    <!--wrapper-->
    <div class="wrapper">
        <div class="page-content">
            <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                        <div class="col mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="mb-4 text-center">
                                            <img src="/assets/images/teenus/logo.png" width="180" alt="" />
                                        </div>
                                        <div class="text-center">
                                            <h3 class="">Iniciar Sesión</h3>
                                        </div>

                                        <div class="form-body">
                                            <form class="row g-3" id="loginForm" name="loginForm" novalidate>
                                                <div class="col-12">
                                                    <label for="inputEmailAddress" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" name="validation-email" placeholder="Email">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" class="form-control border-end-0" id="password" name="validation-password" placeholder="Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Recordarme</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-end"> <a href="/admin/olvido-contrasena">Olvido Password ?</a>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary btn-block" data-effect="wave"><i class="bx bxs-lock-open"></i>Ingresar</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="/admin/assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="/admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="assets/libs/jquery-validation/js/jquery.validate.min.js"></script>
    <script src="assets/libs/jquery-validation/js/additional-methods.min.js"></script>
    <!-- ================== BEGIN PAGE JS ================== -->
    <script src="assets/js/app.js"></script>
    <script src="js/login/autentication.js"></script>
    <!-- Notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>

</html>