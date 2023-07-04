$(document).ready(function () {
  /* Mostrar imagen */
  loadFile = (data) => {
    var output = document.getElementById('img');
    output.src = URL.createObjectURL(data.target.files[0]);
    output.onload = function () {
      URL.revokeObjectURL(output.src);
    };
  };

  /* Crear Ebook */
  $('#btnCreateEbook').click(function (e) {
    e.preventDefault();
    let idEbook = sessionStorage.getItem('id_ebook');

    if (idEbook == '' || idEbook == null) {
      title = $('#title').val();
      author = $('#author').val();
      content = $('#compose-editor').html();

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

      let imageEbook = $('#file')[0].files[0];

      dataEbooks = new FormData(formCreateEbooks);
      dataEbooks.append('img', imageEbook);
      dataEbooks.append('description', content);

      date = new Date();
      month = date.getMonth() + 1;
      day = date.getDate();
      month > 10 ? month : (month = `0${month}`);
      day > 10 ? day : (day = `0${day}`);
      now = `${date.getFullYear()}-${month}-${day}`;
      saveEbook(dataEbooks, '/api/addEbook');

      /* Guardar fecha de publicación 
      bootbox.prompt({
        title: 'Creación de Ebook',
        message: '<p>Ingrese fecha de publicación:</p>',
        inputType: 'date',
        min: now,
        callback: function (result) {
          if (result != null) {
            if (!result || result == '') {
              toastr.error('Ingrese fecha de publicación');
              return false;
            }
            dataEbooks.append('publicationDate', result);
          }
        },
      }); */
    } else {
      updateEbooks();
    }
  });

  /* Actualizar Ebook */
  data = sessionStorage.getItem('data');

  !data ? data : setEbook(data);

  function setEbook(data) {
    data = JSON.parse(data);

    $('#btnCreateEbook').html('Actualizar');

    $('#title').val(data.title);
    $('#author').val(data.author);

    $('#compose-editor').html(data.content);

    $('.img').html(
      `<img id="img" src="${data.img}" style="width:200px;height:180px"/>`
    );

    $('html, body').animate({ scrollTop: 0 }, 1000);
  }

  updateEbooks = () => {
    let idEbook = sessionStorage.getItem('id_ebook');
    content = $('#compose-editor').html();
    let imageEbook = $('#file')[0].files[0];

    dataEbooks = new FormData(formCreateEbooks);
    dataEbooks.append('idEbook', idEbook);
    dataEbooks.append('description', content);
    dataEbooks.append('img', imageEbook);

    saveEbook(dataEbooks, '/api/updateEbook');
  };

  /* Guardar Ebook */
  saveEbook = (data, url) => {
    $.ajax({
      type: 'POST',
      url: url,
      data: data,
      contentType: false,
      cache: false,
      processData: false,

      success: function (resp) {
        $('#formCreateEbooks').trigger('reset');
        location.href = '/admin/ebooks';

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
