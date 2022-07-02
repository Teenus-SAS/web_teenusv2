$(document).ready(function() {

    $('#contactForm').submit(function(e) {
        e.preventDefault();
        debugger
        contactForm = $('#contactForm').serialize();
        $.ajax({
            type: "POST",
            url: "/api/addContact",
            data: contactForm,
            success: function(resp) {

            }
        });
    });


});