$(document).ready(function () {
  idArticle = sessionStorage.getItem('id_article');
  // Actualizar visita
  $.ajax({
    type: 'GET',
    url: `/api/updateArticleView/${idArticle}`,
  });

  // Cargar articulo
  fetch(`/api/article/${idArticle}`)
    .then((response) => response.text())
    .then((data) => {
      data = JSON.parse(data);
      loadArticle(data);
    });

  loadArticle = (data) => {
    // Imagen
    $('.image').html(`
        <img src="${data.img}" style="width:100%;
        height:500px; margin: auto;
         display: block;"/>
    `);
    // Autor
    $('#author').html(` ${data.author}`);

    // Fecha Publicación
    date = getPublicationDate(data.publication_date);

    publication_date = `${date.day} ${date.month} ${date.year}`;

    $('#date').html(` ${publication_date}`);

    // Titulo
    $('#title').html(data.title);

    // Contenido
    $('#content').html(data.content);
  };

  // Cargar Post populares
  fetch(`/api/articles`)
    .then((response) => response.text())
    .then((data) => {
      data = JSON.parse(data);
      loadPopularArticles(data.popularArticles);
    });

  loadPopularArticles = (data) => {
    data.length > 3 ? (count = 3) : (count = data.length);
    for (i = 0; i < count; i++) {
      // Imagen
      $(`.p-image-${i + 1}`).html(`
        <img src="${data[i].img}" style="width:80px;heigth:80px" />
      `);

      // Vista
      $(`#p-view-${i + 1}`).html(` ${data[i].views.toLocaleString()}`);

      // Titulo
      $(`#p-title-${i + 1}`).html(data[i].title);
    }
  };

  // Obtener fecha de publicación
  getPublicationDate = (data) => {
    months = [
      'January',
      'February',
      'March',
      'April',
      'May',
      'June',
      'July',
      'August',
      'September',
      'Octuber',
      'November',
      'December',
    ];
    date = new Date(data);
    day = data.substr(8, 8);
    month = date.getMonth() + 1;
    month = months[month];
    year = data.substr(0, 4);

    publication_date = { day: day, month: month, year: year };

    return publication_date;
  };

  sessionStorage.removeItem('id_article');
});
