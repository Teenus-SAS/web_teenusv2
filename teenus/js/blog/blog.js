$(document).ready(function () {
  /* Cargar los tres ultimos articulos publicados */
  fetchindata = async () => {
    data = await getArticles();
    loadRecentArticles(data.recentArticles);
  };

  fetchindata();

  loadRecentArticles = (data) => {
    data.length > 3 ? (count = 3) : (count = data.length);

    for (i = 0; i < count; i++) {
      // Id articulo
      var article = document.getElementById(`idArticle-${i + 1}`);
      article.id = `${data[i].id_article}_${data[i].title.replace(/ /g, '-').toLowerCase()}`;

      // Imagen
      $(`.blog-image-${i + 1}`).html(`
          <img src="${data[i].img}" alt="image"/>
      `);
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
      $(`#view-${i + 1}`).html(data[i].views.toLocaleString());

      // Titulo
      $(`#title-${i + 1}`).html(data[i].title);

      // Contenido
      content = data[i].content;
      content.length > 86 ? (content = `${content.substr(0, 86)}...`) : content;
      $(`#content-${i + 1}`).html(content);
    }
  };

  $(document).on('click', '.blog-item', function (e) {
    id_article = this.id;

    if (id_article.includes('idArticle')) {
      toastr.error('No es posible acceder a este articulo');
      return false;
    } else {
      let partes = id_article.split("_"); 
      let title = partes[1];
      // localStorage.setItem('id_article', id_article);
      location.href = `/articulo/${title}`;
    }
  });
});
