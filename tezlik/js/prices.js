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

  $(document).on('click', '.typePrice', function () {
    let op = this.value;

    if (op == 1 && $('#COP').is(':checked')) {
      $('#COP').prop('checked', true);
      $('#USD').prop('checked', false);
      $('.usd').hide(400);
      $('.cop').show(400);
    } else {
      $('#USD').prop('checked', true);
      $('#COP').prop('checked', false);
      $('.cop').hide(400);
      $('.usd').show(400);
    }
  });
});
