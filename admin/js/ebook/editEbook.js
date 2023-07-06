$(document).ready(function () {
  localStorage.removeItem('id_ebook');

  /* Modificar Fecha de publicación 
  updatePublication = (id_ebook, publication_date) => {
    var date = new Date();
    var dateString;
    date.setDate(date.getDate());
    dateString =
      date.getFullYear() +
      '-' +
      ('0' + (date.getMonth() + 1)).slice(-2) +
      '-' +
      ('0' + date.getDate()).slice(-2);

    bootbox.confirm({
      title: 'Modificación de Ebook',
      message: `<p>Ingrese fecha de publicación:</p>
            <input id="publicationDate" class="bootbox-input bootbox-input-date form-control" autocomplete="off" type="date" min="${dateString}" value="${publication_date}">`,
      buttons: {
        confirm: {
          label: 'Guardar',
          className: 'btn-success',
        },
        cancel: {
          label: 'Cancelar',
          className: 'btn-danger',
        },
      },
      callback: function (result) {
        if (result == true) {
          publication_date = $('#publicationDate').val();

          data = {};
          data['publicationDate'] = publication_date;
          data['idEbook'] = id_ebook;

          $.post(
            '/api/updatePublication',
            data,
            function (data, textStatus, jqXHR) {
              loadContent('page-content', '/admin/blogs-detalles');
              message(data);
            }
          );
        }
      },
    });
  }; */

  /* Visualizar Ebook */
  viewEbook = (url) => {
    url = url.replace('../../../', '');

    let link = document.createElement('a');

    link.target = '_blank';

    link.href = url;
    document.body.appendChild(link);
    link.click();

    document.body.removeChild(link);
    delete link;
  };

  /* Actualizar Ebook */
  $(document).on('click', '.updateEbook', function (e) {
    idEbook = this.id;
    sessionStorage.setItem('id_ebook', idEbook);

    let row = $(this).parent().parent()[0];
    let data = tblEbooks.fnGetData(row);

    sessionStorage.setItem('data', JSON.stringify(data));
  });

  /* Eliminar Ebook */

  deleteFunction = () => {
    let row = $(this.activeElement).parent().parent()[0];
    let data = tblEbooks.fnGetData(row);

    let idEbook = data.id_ebook;

    bootbox.confirm({
      title: 'Eliminar',
      message:
        'Está seguro de eliminar este Ebook? Esta acción no se puede reversar.',
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
          $.get(
            `/api/deleteEbook/${idEbook}`,
            function (data, textStatus, jqXHR) {
              message(data);

              setTimeout(() => {
                location.href = '/admin/ebooks';
              }, 2000);
            }
          );
        }
      },
    });
  };

  /* Mensaje de exito */
  message = (data) => {
    if (data.success == true) {
      // updateTable();
      toastr.success(data.message);
      return false;
    } else if (data.error == true) toastr.error(data.message);
    else if (data.info == true) toastr.info(data.message);
  };
});
