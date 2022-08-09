$(document).ready(function () {
  sessionStorage.removeItem('id_article');

  /* Modificar Fecha de publicación */
  updatePublication = (id_article, publication_date) => {
    bootbox.confirm({
      title: 'Modificación de Articulo',
      message: `<p>Ingrese fecha de publicación:</p>
            <input id="publicationDate" class="bootbox-input bootbox-input-date form-control" autocomplete="off" type="date" value="${publication_date}">`,
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
          data['idArticle'] = id_article;

          $.post(
            '/api/updatePublication',
            data,
            function (data, textStatus, jqXHR) {
              loadContent('page-content', '/admin/views/blog/details.php');
              message(data);
            }
          );
        }
      },
    });
  };

  /* Visualizar Articulo */
  viewArticle = (id_article) => {
    debugger;
    setArticle(id_article);

    url = 'http://webteenus/';

    link = document.createElement('a');

    link.target = '_blank';

    link.href = url;
    document.body.appendChild(link);
    link.click();
  };

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
              loadContent('page-content', '/admin/views/blog/details.php');
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
