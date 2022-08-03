$(document).ready(function () {
  sessionStorage.removeItem('id_article');

  /* Visualizar Articulo */
  $(document).on('click', '.viewArticle', function (e) {
    idArticle = this.id;
    sessionStorage.setItem('id_article', idArticle);
  });

  /* Actualizar Articulos */
  $(document).on('click', '.updateArticles', function (e) {
    idArticle = this.id;
    sessionStorage.setItem('id_article', idArticle);

    let row = $(this).parent().parent()[0];
    let data = tblArticles.fnGetData(row);

    sessionStorage.setItem('data', JSON.stringify(data));
  });

  /* Eliminar Articulos */

  deleteFunction = () => {
    let row = $(this.activeElement).parent().parent()[0];
    let data = tblArticles.fnGetData(row);

    let idArticle = data.id_article;

    bootbox.confirm({
      title: 'Eliminar',
      message:
        'Está seguro de eliminar este articulo? Esta acción no se puede reversar.',
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
            `/api/deleteArticle/${idArticle}`,
            function (data, textStatus, jqXHR) {
              loadContent('page-content', '../../blog/views/details.php');
              message(data);
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
