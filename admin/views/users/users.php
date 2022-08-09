<body>
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
    <script src="/admin/js/user/tblUser.js"></script>
    <script src="/admin/js/user/user.js"></script>
</body>