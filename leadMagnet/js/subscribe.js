$(document).ready(function() {

    $('#btnSubscribe').click(function(e) {
        e.preventDefault();

        subscribeForm = $('#btnSubscribe').serialize();
        $.ajax({
            type: "POST",
            url: "/api/subscribe",
            data: subscribeForm,
            success: function(resp) {

            }
        });
    });
});