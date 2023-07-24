$(document).ready(function () {
  $('#btnForgotPass').on('click', function (e) {
    let email = $('#email').val();

    if (!email || email == '') {
      toastr.error('Ingrese email');
      return false;
    }

    $.ajax({
      type: 'POST',
      url: '/api/forgotPassword',
      data: { data: email },
      success: function (data, textStatus, xhr) {
        if (data.success == true) {
          toastr.success(data.message);
          setTimeout(() => {
<<<<<<< HEAD
            location.href = '/admin/blogs-detalles';
=======
            location.href = '/admin/';
>>>>>>> d9cff1903c3c223bfadc0e1a5a5214675231b67d
          }, 2000);
        } else if (data.error == true) toastr.error(data.message);
         else if (data.info == true) toastr.info(data.message);
      },
    });
  });
});
