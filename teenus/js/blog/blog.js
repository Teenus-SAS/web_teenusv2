/* Cargar los tres ultimos articulos publicados */
fetch(`/api/articles`)
  .then((response) => response.text())
  .then((data) => {
    data = JSON.parse(data);
    loadRecentArticles(data.recentArticles);
  });

loadRecentArticles = (data) => {
  data.length > 3 ? (count = 3) : (count = data.length);

  for (i = 0; i < count; i++) {
    // Id articulo
    var article = document.getElementById(`idArticle-${i + 1}`);
    article.id = data[i].id_article;

    // Imagen
    $(`.blog-image-${i + 1}`).html(`
        <img src="${data[i].img}" style="width:350px;height:287.77px" alt="image"/>
    `);
    // Autor
    $(`#author-${i + 1}`).html(` ${data[i].author}`);

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
    date = new Date(data[i].publication_date);
    day = data[i].publication_date.substr(8, 8);
    month = date.getMonth() + 1;
    month = months[month];
    year = data[i].publication_date.substr(0, 4);
    publication_date = `${day} ${month} ${year}`;

    $(`#date-${i + 1}`).html(` ${publication_date}`);

    // Titulo
    $(`#title-${i + 1}`).html(data[i].title);

    // Contenido
    $(`#content-${i + 1}`).html(data[i].content);
  }
};
/* 
    // Guardar id articulo
    document.getElementById('17').addEventListener('click', getIdArticle);

    function getIdArticle() {
        debugger;
        id_article = this.id;
        sessionStorage.setItem('idArticle', id_article);
    }
*/
