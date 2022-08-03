<head>
    <!-- Notifications -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" rel="stylesheet">
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

    <div class="page-title-box">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-5 col-xl-6">
                    <div class="page-title">
                        <h3 class="mb-1 font-weight-bold text-dark">Articulos</h3>
                        <ol class="breadcrumb mb-3 mb-md-0">
                            <li class="breadcrumb-item active">Administración de Articulos</li>
                        </ol>
                    </div>
                </div>
                <div class="col-sm-7 col-xl-6">
                    <div class="form-inline justify-content-sm-end">
                        <button class="btn btn-warning" id="btnNewArticles" name="btnNewArticles" style="margin-left:550px;">Crear</button>
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
                        <div class="card-header">
                            <h5 class="card-title">Articulos</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="tblArticles">

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="/blog/js/article/tblArticles.js"></script>
    <script src="/blog/js/article/editArticle.js"></script>

    <!-- Notifications -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</body>