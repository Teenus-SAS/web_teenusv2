$(document).ready(function () {
  /* Ocultar panel crear producto */
  $('.cardCreateArticle').hide();

  /* Abrir panel crear producto */

  $('#btnNewArticle').click(function (e) {
    e.preventDefault();

    $('.cardImportArticle').hide(800);
    $('.cardCreateArticle').toggle(800);
    $('#btnCreateArticle').html('Crear');

    sessionStorage.removeItem('id_article');

    $('#formCreateArticle').trigger('reset');
  });

  /* Crear nuevo proceso */

  $('#btnCreateArticle').click(function (e) {
    e.preventDefault();

    let idArticle = sessionStorage.getItem('id_article');

    if (idArticle == '' || idArticle == null) {
      title = $('#title').val();
      desc = $('#description').val();
      author = $('#author').val();

      if (title == '' || desc == '' || author == '') {
        toastr.error('Ingrese todos los campos');
        return false;
      }

      article = $('#formCreateArticle').serialize();

      $.post(
        '../../api/addArticles',
        article,
        function (data, textStatus, jqXHR) {
          message(data);
        }
      );
    } else {
      updateArticle();
    }
  });

  /* Actualizar procesos */

  $(document).on('click', '.updateArticle', function (e) {
    $('.cardImportArticle').hide(800);
    $('.cardCreateArticle').show(800);
    $('#btnCreateArticle').html('Actualizar');

    let row = $(this).parent().parent()[0];
    let data = loadArticles.fnGetData(row);

    sessionStorage.setItem('id_article', data.id_article);

    // Cargar información
    $('#title').val(data.title);
    $('#description').val(data.desc_article);
    $('#author').val(data.author);
    $('#publication').val(data.publication_date);

    $('html, body').animate(
      {
        scrollTop: 0,
      },
      1000
    );
  });

  updateArticle = () => {
    let data = $('#formCreateArticle').serialize();
    idArticle = sessionStorage.getItem('id_article');
    data = data + '&idArticle=' + idArticle;

    $.post(
      '../../api/updateArticles',
      data,
      function (data, textStatus, jqXHR) {
        message(data);
      }
    );
  };

  /* Eliminar proceso */

  deleteFunction = () => {
    let row = $(this.activeElement).parent().parent()[0];
    let data = articles.fnGetData(row);

    let id_article = data.id_article;

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
            `../../api/deleteArticle/${id_article}`,
            function (data, textStatus, jqXHR) {
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
      $('.cardCreateArticle').hide(800);
      $('#formCreateArticle').trigger('reset');
      loadArticle();
      toastr.success(data.message);
      return false;
    } else if (data.error == true) toastr.error(data.message);
    else if (data.info == true) toastr.info(data.message);
  };
});
