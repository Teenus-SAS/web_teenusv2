$(document).ready(function () {
  $(document).on('click', '.btnPlan', function (e) {
    plan = this.id;
    $(this).addClass('active');
    $(this).prop('href', '#contact');
    $('#subject').val(`plan: ${plan}`);
    $('#message').val(
      `Me gustaría ser contactado por un vendedor para obtener mas información sobre el plan ${plan}`
    );
  });

  $('#typePrice').change(function (e) {
    e.preventDefault();
    if ($('#typePrice').is(':checked')) {
      $('.usd').hide(400);
      $('.cop').show(400);
    } else {
      $('.cop').hide(400);
      $('.usd').show(400);
    }
  });
});
