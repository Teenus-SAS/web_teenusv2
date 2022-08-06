fetch(`/api/articles`)
  .then((response) => response.text())
  .then((data) => {
    data = JSON.parse(data);
    loadArticles(data.recentArticles);
    loadPopularArticles(data.popularArticles);
    // loadRecentArticles(data.recentArticles);
  });

/* Cargar todos los articulos */
loadArticles = (data) => {
  for (i = 0; i < data.length; i++) {
    // Id articulo
    var article = document.getElementById(`idArticle-${i + 1}`);
    article.id = data[i].id_article;
    // Imagen
    $(`.image-${i + 1}`).html(`
        <img src="${data[i].img}" style="width:350px;height:287.77px" alt="image"/>
    `);
    // Autor
    $(`#author-${i + 1}`).html(` ${data[i].author}`);

    // Fecha Publicación
    date = getPublicationDate(data[i].publication_date);

    publication_date = `${date.day} ${date.month} ${date.year}`;

    $(`#date-${i + 1}`).html(` ${publication_date}`);

    // Titulo
    $(`#title-${i + 1}`).html(data[i].title);

    // Contenido
    $(`#content-${i + 1}`).html(data[i].content);
  }
};

/* Cargar articulos populares */
loadPopularArticles = (data) => {
  data.length > 3 ? (count = 3) : (count = data.length);
  for (i = 0; i < count; i++) {
    // Imagen
    $(`.p-image-${i + 1}`).html(`
            <img src="${data[i].img}" style="width:80px;height:80px"/>
        `);

    // Fecha Publicación
    date = getPublicationDate(data[i].publication_date);

    publication_date = `${date.month} ${date.day}, ${date.year}`;

    $(`#p-date-${i + 1}`).html(`${publication_date}`);

    // Titulo
    $(`#p-title-${i + 1}`).html(data[i].title);
  }
};

/* Cargar articulos recientes
loadRecentArticles = (data) => {
  data.length > 5 ? (count = 5) : (count = data.length);

  for (i = 0; i < count; i++) {
    $(`#r-title-${i + 1}`).html(data[i].title);
  }
}; */

// Obtener fecha publicación
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
