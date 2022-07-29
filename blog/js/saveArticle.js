$(document).ready(function () {
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
      author = $('#author').val();
      content = $('.ck-editor__editable').html();

      if (
        !title ||
        title == '' ||
        !author ||
        author == '' ||
        !content ||
        content == '<p><br data-cke-filler="true"></p>'
      ) {
        toastr.error('Ingrese todos los campos');
        return false;
      }

      let imageArticle = $('#file')[0].files[0];

      dataArticles = new FormData(formCreateArticles);
      dataArticles.append('img', imageArticle);
      dataArticles.append('description', content);

      bootbox.prompt({
        title: 'Creación Articulos',
        message: '<p>Ingrese fecha de publicación:</p>',
        inputType: 'date',
        callback: function (result) {
          if (result != null) {
            if (!result || result == '') {
              toastr.error('Ingrese fecha de publicación');
              return false;
            }
            dataArticles.append('publicationDate', result);
            saveArticle(dataArticles);
          }
        },
      });
    } else {
      updateArticles();
    }
  });

  /* Guardar articulo */
  saveArticle = (data) => {
    $.ajax({
      type: 'POST',
      url: '/api/addArticles',
      data: data,
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

  /* Mensaje de exito */

  message = (data) => {
    if (data.success == true) {
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
