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
      content = getContent();

      if (
        !title ||
        title == '' ||
        !author ||
        author == '' ||
        !content ||
        content == ''
      ) {
        toastr.error('Ingrese todos los campos');
        return false;
      }

      let imageArticle = $('#file')[0].files[0];

      dataArticles = new FormData(formCreateArticles);
      dataArticles.append('img', imageArticle);
      dataArticles.append('description', content);

      date = new Date();
      month = date.getMonth() + 1;
      day = date.getDate();
      month > 10 ? month : (month = `0${month}`);
      day > 10 ? day : (day = `0${day}`);
      now = `${date.getFullYear()}-${month}-${day}`;

      /* Guardar fecha de publicación */
      bootbox.prompt({
        title: 'Creación de Articulo',
        message: '<p>Ingrese fecha de publicación:</p>',
        inputType: 'date',
        min: now,
        callback: function (result) {
          if (result != null) {
            if (!result || result == '') {
              toastr.error('Ingrese fecha de publicación');
              return false;
            }
            dataArticles.append('publicationDate', result);
            saveArticle(dataArticles, '/api/addArticle');
          }
        },
      });
    } else {
      updateArticles();
    }
  });

  /* Actualizar articulo */
  data = sessionStorage.getItem('data');

  !data ? data : setArticle(data);

  function setArticle(data) {
    debugger;
    data = JSON.parse(data);

    $('#btnCreateArticles').html('Actualizar');

    $('#title').val(data.title);
    $('#author').val(data.author);

    // setContent(data.content);

    $('.img').html(
      `<img id="img" src="${data.img}" style="width:200px;height:180px"/>`
    );

    $('html, body').animate({ scrollTop: 0 }, 1000);
  }

  updateArticles = () => {
    let idArticle = sessionStorage.getItem('id_article');
    content = getContent();
    let imageArticle = $('#file')[0].files[0];

    dataArticles = new FormData(formCreateArticles);
    dataArticles.append('idArticle', idArticle);
    dataArticles.append('description', content);
    dataArticles.append('img', imageArticle);

    saveArticle(dataArticles, '/api/updateArticle');
  };

  /* Guardar articulo */
  saveArticle = (data, url) => {
    $.ajax({
      type: 'POST',
      url: url,
      data: data,
      contentType: false,
      cache: false,
      processData: false,

      success: function (resp) {
        $('#formCreateArticles').trigger('reset');
        loadContent('page-content', '../../blog/views/details.php');
        message(resp);
      },
    });
  };

  /* Mensaje de exito */
  message = (data) => {
    if (data.success == true) {
      toastr.success(data.message);
      return false;
    } else if (data.error == true) toastr.error(data.message);
    else if (data.info == true) toastr.info(data.message);
  };
});
