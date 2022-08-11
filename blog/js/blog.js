$(document).ready(function () {
  fetchindata = async () => {
    data = await getArticles();
    loadArticles(data.recentArticles);
    loadPopularArticles(data.popularArticles);
    // loadRecentArticles(data.recentArticles);
  };

  fetchindata();

  /* Cargar todos los articulos */
  loadArticles = (data) => {
    for (i = 0; i < data.length; i++) {
      // Id articulo
      var article = document.getElementById(`idArticle-${i + 1}`);
      article.id = data[i].id_article;

      // Imagen
      $(`.image-${i + 1}`).html(`
                <img src="${data[i].img}" style="width:350px;height:287.77px" alt="image"/>`);

      // Autor
      $(`#author-${i + 1}`).html(` ${data[i].author}`);

      // Fecha Publicación
      months = [
        '',
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
      date = new Date(data[i].publication_date);
      day = data[i].publication_date.substr(8, 8);
      month = date.getMonth() + 1;
      month = months[month];
      year = data[i].publication_date.substr(0, 4);

      publication_date = `${day} ${month} ${year}`;

      $(`#date-${i + 1}`).html(` ${publication_date}`);

      // Vista
      $(`#view-${i + 1}`).html(` ${data[i].views.toLocaleString()}`);

      // Titulo
      $(`#title-${i + 1}`).html(data[i].title);

      // Contenido
      content = data[i].content;
      content.length > 86 ? (content = `${content.substr(0, 86)}...`) : content;
      $(`#content-${i + 1}`).html(content);
    }
  };

  /* Cargar articulos populares */
  loadPopularArticles = (data) => {
    data.length > 3 ? (count = 3) : (count = data.length);
    for (i = 0; i < count; i++) {
      // Id articulo
      var article = document.getElementById(`item-${i + 1}`);
      article.id = data[i].id_article;

      // Imagen
      $(`.p-image-${i + 1}`).html(`
        <img src="${data[i].img}" style="width:80px;height:80px"/>
        `);

      // Vista
      $(`#p-view-${i + 1}`).html(data[i].views.toLocaleString());

      // Titulo
      title = data[i].title;
      title.length > 50 ? (title = `${title.substr(0, 50)}...`) : title;
      $(`#p-title-${i + 1}`).html(title);
    }
  };
});
