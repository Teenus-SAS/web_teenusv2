$(document).ready(function () {
  /* Actualizar Articulos */
  $(document).on('click', '.updateArticles', function (e) {
    debugger;
    setTimeout(
      loadContent('page-content', '../../blog/views/editArticles.php'),
      5000
    );
    idArticle = this.id;
    sessionStorage.setItem('id_article', idArticle);

    let row = $(this).parent().parent()[0];
    let data = tblArticles.fnGetData(row);

    $('#btnCreateArticles').html('Actualizar');

    title = $('#title').val(data.title);
    author = $('#author').val(data.author);
    content = $('.ck-editor__editable').html(data.content);
    $('#file').html(
      `<img id="img" src="${data.img}" style="width:20%;padding-bottom:15px"/>`
    );

    $('html, body').animate({ scrollTop: 0 }, 1000);
  });

  updateArticles = () => {
    let idArticle = sessionStorage.getItem('id_article');
    let imageArticle = $('#formFile')[0].files[0];

    dataArticles = new FormData(formCreateArticles);
    dataArticles.append('idArticle', idArticle);
    dataArticles.append('img', imageArticle);

    $.ajax({
      type: 'POST',
      url: '/api/updateArticle',
      data: dataArticle,
      contentType: false,
      cache: false,
      processData: false,

      success: function (resp) {
        $('#formCreateArticles').trigger('reset');
        loadContent('page-content', '../../blog/views/adminArticles.php');
        message(resp);
      },
    });
  };

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
              message(data);
            }
          );
        }
      },
    });
  };
});
