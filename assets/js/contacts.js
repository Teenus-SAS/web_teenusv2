$(document).ready(function() {

    $(document).on('click', '#btnSendContact', function(e) {
        e.preventDefault()
        debugger
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
                if (resp.success == true)
                    toastr.success(resp.message);
                else
                    toastr.error(resp.message);
            }
        });

    })

});