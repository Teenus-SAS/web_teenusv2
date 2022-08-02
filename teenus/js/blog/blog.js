/* Cargar los tres ultimos articulos publicados */
fetch(`/api/globalArticles`)
  .then((response) => response.text())
  .then((data) => {
    data = JSON.parse(data);
    loadRecentArticles(data.recentArticles);
  });

loadRecentArticles = (data) => {
  data.length > 3 ? (count = 3) : (count = data.length);

  for (i = 0; i < count; i++) {
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
