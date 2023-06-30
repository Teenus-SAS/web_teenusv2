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
    <style>
        .image-upload>input {
            display: none;
        }

        .image-upload img {
            width: 80px;
            cursor: pointer;
        }
    </style>
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
                <div class="page-title-box">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-sm-5 col-xl-6">
                                <div class="page-title">
                                    <h3 class="mb-1 font-weight-bold text-dark">Articulo</h3>
                                    <ol class="breadcrumb mb-3 mb-md-0">
                                        <li class="breadcrumb-item active"></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-content-wrapper mt--45">
                    <div class="container-fluid">
                        <div class="row align-items-stretch">
                            <div class="col-md-8 col-lg-12">
                                <div class="inbox-rightbar card">
                                    <div class="card-body">
                                        <form id="formCreateArticles">
                                            <div class="form-group pt-4">
                                                <input type="text" class="form-control" placeholder="Titulo" id="title" name="title" />
                                            </div>
                                            <div class="form-group pt-4">
                                                <input type="text" class="form-control" placeholder="Autor" id="author" name="author" />
                                            </div>

                                            <div class="form-group pt-4">
                                                <div class="message">
                                                    <div id="compose-editor" name="content"></div>
                                                </div>
                                            </div>
                                            <div class="form-group pt-4">
                                                <div class="image-upload">
                                                    <input accept="image/*" type="file" id="file" onchange="loadFile(event)">
                                                    <label for="file">
                                                        <div class="img">
                                                            <img src="https://www.dzoom.org.es/wp-content/uploads/2017/07/seebensee-2384369-810x540.jpg" style="width:200px;height:180px" alt="" id="img" class="img-thumbnail">
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group pt-4">
                                                <div class="text-right">
                                                    <button class="btn btn-primary chat-send-btn" data-effect="wave" id="btnCreateArticles">
                                                        <span class="d-none d-sm-inline-block mr-2 align-middle">Crear</span>
                                                        <i class="bx bxs-send fs-sm align-middle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
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

    <script src="/admin/js/article/compose-editor.js"></script>
    <script src="/admin/js/article/saveArticle.js"></script>
</body>

</html>