$(document).ready(function () {
  /* Ocultar panel para crear Usuario */

  $('.cardCreateUsers').hide();

  /* Abrir panel para crear Usuario */

  $('#btnNewUser').click(function (e) {
    e.preventDefault();
    $('.cardCreateUsers').toggle(800);
    $('#btnCreateUser').html('Crear');

    sessionStorage.removeItem('id_user');

    $('#formCreateUser').trigger('reset');
  });

  /* Crear producto */

  $('#btnCreateUser').click(function (e) {
    debugger;
    e.preventDefault();
    let idUser = sessionStorage.getItem('id_user');
    if (idUser == '' || idUser == null) {
      nam = $('#nameUser').val();
      last = $('#lastnameUser').val();
      email = $('#emailUser').val();

      if (
        nam == '' ||
        nam == null ||
        last == '' ||
        last == null ||
        email == '' ||
        email == null
      ) {
        toastr.error('Ingrese todos los campos');
        return false;
      }

      data = $('#formCreateUser').serialize();

      $.post('/api/addUser', data, function (data, textStatus, jqXHR) {
        message(data);
      });
    } else {
      updateUser();
    }
  });

  /* Actualizar productos */

  $(document).on('click', '.updateUser', function (e) {
    $('.cardCreateUsers').show(800);
    $('#btnCreateUser').html('Actualizar');
    idUser = this.id;
    idUser = sessionStorage.setItem('id_user', idUser);

    let row = $(this).parent().parent()[0];
    let data = tblUser.fnGetData(row);

    $('#nameUser').val(data.firstname);
    $('#lastnameUser').val(data.lastname);
    $('#emailUser').val(data.email);

    $('html, body').animate(
      {
        scrollTop: 0,
      },
      1000
    );
  });

  updateUser = () => {
    let data = $('#formCreateUser').serialize();
    idUser = sessionStorage.getItem('id_user');

    data = data + '&idUser=' + idUser;
    $.post('/api/updateUser', data, function (data, textStatus, jqXHR) {
      message(data);
    });
  };

  /* Eliminar productos */

  deleteFunction = () => {
    let row = $(this.activeElement).parent().parent()[0];
    let data = tblUser.fnGetData(row);

    let id_user = data.id_user;
    data = data + '&idUser=' + id_user;

    bootbox.confirm({
      title: 'Eliminar',
      message:
        'Está seguro de eliminar este usuario? Esta acción no se puede reversar.',
      buttons: {
        confirm: {
          label: 'Si',
          className: 'btn-success',
        },
        cancel: {
          label: 'No',
          className: 'btn-danger',
        },
      },
      callback: function (result) {
        if (result == true) {
          $.post('/api/deleteUser', data, function (data, textStatus, jqXHR) {
            message(data);
          });
        }
      },
    });
  };

  /* Mensaje de exito */

  message = (data) => {
    if (data.success == true) {
      $('.cardCreateUsers').hide(800);
      $('#formCreateUser')[0].reset();
      toastr.success(data.message);
      updateTable();
      return false;
    } else if (data.error == true) toastr.error(data.message);
    else if (data.info == true) toastr.info(data.message);
  };

  /* Actualizar tabla */

  function updateTable() {
    $('#tblUsers').DataTable().clear();
    $('#tblUsers').DataTable().ajax.reload();
  }
});
