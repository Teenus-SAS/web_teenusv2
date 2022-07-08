<section id="contact-area" data-scroll-index="6">
    <div class="container">
        <div class="row">
            <!--start section heading-->
            <div class="col-lg-6 col-md-8">
                <div class="section-heading">
                    <h2>Esta a pocos pasos del Éxito</h2>
                    <h5>Estamos seguros de maximizar y entregarle resultados contundentes.</h5>
                </div>
            </div>
            <!--end section heading-->
        </div>

        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

        <div class="row">
            <!--start contact form-->
            <div class="col-md-7">

                <div class="alert alert-success d-flex align-items-center" role="alert" style="display:none !important">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div class="message"></div>
                </div>

                <div class="alert alert-danger d-flex align-items-center" role="alert" style="display:none !important">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                        <use xlink:href="#exclamation-triangle-fill" />
                    </svg>
                    <div class="message"></div>
                </div>


                <div class="contact-form">
                    <form id="contact-form">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nombres*" required="required" data-error="Name is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email*" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Teléfono*" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-8">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Empresa*" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <!-- <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Asunto*" required="required" data-error="Valid email is required.">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div> -->

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Mensaje*" required="required" data-error="Please, leave us a message."></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <button type="submit" id="btnSendContact">Enviar</button>
                                <!-- <div class="messages mt-3">
                                    <div class="alert alert alert-success alert-dismissable alert-dismissable hidden" id="msgSubmit"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Muchas gracias! su mensaje se envio correctamente. Muy pronto nos estaremos contactando. </div>
                                </div> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!--end contact form-->
            <!--start contact image-->
            <div class="col-md-5">
                <div class="contact-img text-center">
                    <img src="assets/images/contact.png" class="img-fluid animation-jump" alt="">
                </div>
            </div>
            <!--end contact image-->
        </div>
    </div>
</section>