$(document).ready(function () {
  $('#btnShowModalLogin').click(function (e) {
    e.preventDefault();

    $('#loginModal').modal('show');
  });

  $('.register').click(function (e) {
    e.preventDefault();

    $('#loginModal').modal('hide');
    $('#registerModal').modal('show');
  });

  /* Login */
  $('#btnLogin').click(function (e) {
    e.preventDefault();

    let email = $('#email').val();
    let password = $('#password').val();

    if (email == '' || password == '') {
      toastr.error('Ingrese todos los campos');
      return false;
    }

    let data = $('#formLogin').serialize();

    $.post(
      '/api/userEbooksAutentication',
      data,
      function (data, textStatus, jqXHR) {
        if (data.success == true) {
          toastr.success(data.message);
          window.location.reload();
          return false;
        } else if (data.error == true) toastr.error(data.message);
        else if (data.info == true) toastr.info(data.message);
      }
    );
  });
});
