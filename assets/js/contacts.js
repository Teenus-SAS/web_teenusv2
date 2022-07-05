$(document).ready(function() {

    $(document).on('click', '#btnSendContact', function(e) {
        e.preventDefault()

        subject = $('#subject').val();

        if (subject == 0) {
            toastr.error('Seleccione el Asunto');
            return false
        }

        data = $('#contact-form').serialize();
        if (!subject)
            data = `${data}&subject=${zone}`

        $.ajax({
            type: "POST",
            url: "/api/addContact",
            data: data,
            success: function(resp) {
                if (resp.success == true) {
                    $('.alert-success').show(500);
                    $('.message').html(resp.message);
                    document.getElementById("contact-form").reset();
                } else {
                    $('.alert-danger').show(500);
                    $('.message').html(resp.message);
                }
            }
        });

    })

});