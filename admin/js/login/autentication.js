$(document).ready(function () {
  //Initialize form
  $('#loginForm').validate({
    focusInvalid: false,
    rules: {
      'validation-email': {
        required: true,
        email: true,
      },
      'validation-password': {
        required: true,
      },
    },
    errorPlacement: function errorPlacement(error, element) {
      $(element).siblings('.validation-error').removeClass('d-none');
      return true;
    },
    highlight: function (element) {
      var $el = $(element);
      var $parent = $el.parents('.form-group');
      $parent.addClass('invalid-field');
    },
    unhighlight: function (element) {
      var $el = $(element);
      var $parent = $el.parents('.form-group');
      $parent.removeClass('invalid-field');
      $(element).siblings('.validation-error').addClass('d-none');
    },
    submitHandler: function (form) {
      var formdata = $(form).serializeArray();
      var data = {};
      $(formdata).each(function (index, obj) {
        data[obj.name] = obj.value;
      });
      /* alert("Data has been submitted. Please see console log");
                                    console.log("form data ===>", data); */
      login(data);
      $(form).trigger('reset');
      $('.floating-label').removeClass('enable-floating-label');
    },
  });

  const login = (data) => {
    $.ajax({
      type: 'POST',
      url: '/api/userAutentication',
      data: data,
      success: function (data, textStatus, xhr) {
        if (data.error == true) {
          toastr.error(data.message);
          return false;
        } else if (data.success == true) location.href = data.location;
        else {
          toastr.error(
            'Ocurrio un error durante la conexión, Intente nuevamente'
          );
          return false;
        }
      },
    });
  };
});
