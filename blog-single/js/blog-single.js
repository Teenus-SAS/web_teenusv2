$(document).ready(function () {
  idArticle = sessionStorage.getItem('id_article');
  fetch(`/api/article/${idArticle}`)
    .then((response) => response.text())
    .then((data) => {
      data = JSON.parse(data);
      loadArticle(data);
    });
});

/* Cargar Articulo */
loadArticle = (data) => {
  // Imagen
  $('.image').html(`
        <img src="${data[0].img}" style="width:350px;height:287.77px" alt="image"/>
    `);
  // Autor
  $('#author').html(` ${data[0].author}`);

  // Fecha Publicación
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
  date = new Date(data[0].publication_date);
  day = data.substr(8, 8);
  month = date.getMonth() + 1;
  month = months[month];
  year = data.substr(0, 4);

  publication_date = `${date.day} ${date.month} ${date.year}`;

  $('#date').html(` ${publication_date}`);

  // Titulo
  $('#title').html(data[0].title);

  // Contenido
  $('#content').html(data[0].content);
};
