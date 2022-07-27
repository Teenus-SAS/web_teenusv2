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
                        <form id="formSendSupport">
                            <div class="form-group pt-4">
                                <input type="text" class="form-control" placeholder="Titulo" id="title" name="title" />
                            </div>
                            <div class="form-group pt-4">
                                <input type="text" class="form-control" placeholder="Autor" id="author" name="author" />
                            </div>

                            <div class="form-group pt-4">
                                <div class="message" id="compose-editor" name="content">Hey</div>
                            </div>
                            <div class="form-group pt-4">
                                <div class="image-upload">
                                    <input accept="image/*" type="file" id="file" onchange="loadFile(event)">
                                    <label for="file">
                                        <img src="https://www.dzoom.org.es/wp-content/uploads/2017/07/seebensee-2384369-810x540.jpg" style="width:180px;" alt="" id="img" class="img-thumbnail">
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
<style>
    .image-upload>input {
        display: none;
    }

    .image-upload img {
        width: 80px;
        cursor: pointer;
    }
</style>
<script src="/blog/js/compose-editor.js"></script>