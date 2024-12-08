<div class="modal fade" id="openModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Registrate y comienza a usar TezlikSoftware en ¡segundos!</h5>
                <button type="button" class="closeRegisterTezlik" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="page-content-wrapper mt--45">
                    <div class="container-fluid">
                        <div class="vertical-app-tabs" id="rootwizard">
                            <div class="col-md-12 col-lg-12 InputGroup">
                                <form id="formRegister">
                                    <div class="row">
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group floating-label enable-floating-label show-label mb-0">
                                                <label for="firstname">Nombres<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="nameUser" id="firstname">
                                                <div class="validation-error d-none font-size-13">Requerido</div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <div class="form-group floating-label enable-floating-label show-label mb-0">
                                                <label for="lastname">Apellidos<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="lastnameUser" id="lastname">
                                                <div class="validation-error d-none font-size-13">Requerido</div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="form-group floating-label enable-floating-label show-label mb-0 mt-3">
                                                <label for="email">Email<span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" name="emailUser" id="email">
                                                <div class="validation-error d-none font-size-13">Requerido</div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4">
                                            <div class="form-group floating-label enable-floating-label show-label mb-0 mt-3">
                                                <label for="email">WhatsApp<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="phone" id="phone">
                                                <div class="validation-error d-none font-size-13">Requerido</div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-8 titlePayroll mt-2">
                                            <div class="form-group floating-label enable-floating-label show-label mb-0 mt-3">
                                                <label>Empresa<span class="text-danger">*</span></label></label>
                                                <input type="text" class="form-control" name="company" id="company">
                                                <div class="validation-error d-none font-size-13">Requerido</div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-4 mt-2">
                                            <div class="form-group floating-label enable-floating-label show-label mb-0 mt-3">
                                                <label for="employees">No Empleados<span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" name="quantity_user" id="employees">
                                                <div class="validation-error d-none font-size-13">Requerido</div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger closeRegisterTezlik" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success" id="btnRegisterTezlik">Crear</button>
            </div>
        </div>
    </div>
</div>