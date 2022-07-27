$(document).ready(function () {
  /* Abrir vista crear articulo */
  $('#btnNewArticles').click(function (e) {
    e.preventDefault();
    $('#btnCreateArticles').html('Crear');
    sessionStorage.removeItem('id_article');
  });

  /* Mostrar imagen */
  loadFile = (data) => {
    var output = document.getElementById('img');
    output.src = URL.createObjectURL(data.target.files[0]);
    output.onload = function () {
      URL.revokeObjectURL(output.src);
    };
  };

  /* Crear articulo */

  $('#btnCreateArticles').click(function (e) {
    e.preventDefault();
    let idArticle = sessionStorage.getItem('id_article');

    if (idArticle == '' || idArticle == null) {
      title = $('#title').val();
      author = $('#content').val();
      content = $('#content').val();

      if (title == '' || content == '' || author == '') {
        toastr.error('Ingrese todos los campos');
        return false;
      }

      let imageProd = $('#formFile')[0].files[0];

      dataArticles = new FormData(formCreateArticles);
      dataArticles.append('img', imageProd);

      $.ajax({
        type: 'POST',
        url: '/api/addArticles',
        data: dataArticles,
        contentType: false,
        cache: false,
        processData: false,

        success: function (resp) {
          message(resp);
          updateTable();
        },
      });
    } else {
      updateArticles();
    }
  });

  /* Actualizar Articulos */

  $(document).on('click', '.updateArticles', function (e) {
    $('.cardImportArticles').hide(800);
    $('.cardCreateArticles').show(800);
    $('#btnCreateArticles').html('Actualizar');

    idArticle = this.id;
    idArticle = sessionStorage.setItem('id_article', idArticle);

    let row = $(this).parent().parent()[0];
    let data = tblArticles.fnGetData(row);

    $('#referenceArticles').val(data.reference);
    $('#Articles').val(data.Articles);
    $('#profitability').val(data.profitability);
    $('#commisionSale').val(data.commission_sale);

    $('html, body').animate({ scrollTop: 0 }, 1000);
  });

  updateArticles = () => {
    let idArticle = sessionStorage.getItem('id_article');
    let imageProd = $('#formFile')[0].files[0];

    dataArticles = new FormData(formCreateArticles);
    dataArticles.append('idArticle', idArticle);
    dataArticles.append('img', imageProd);

    $.ajax({
      type: 'POST',
      url: '/api/updateArticle',
      data: dataArticle,
      contentType: false,
      cache: false,
      processData: false,

      success: function (resp) {
        updateTable();
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

  /* Mensaje de exito */

  const message = (data) => {
    if (data.success == true) {
      $('.cardCreateArticles').hide(800);
      $('#formCreateArticles')[0].reset();
      updateTable();
      toastr.success(data.message);
      return false;
    } else if (data.error == true) toastr.error(data.message);
    else if (data.info == true) toastr.info(data.message);
  };

  /* Actualizar tabla */

  function updateTable() {
    $('#tblArticles').DataTable().clear();
    $('#tblArticles').DataTable().ajax.reload();
  }
});
