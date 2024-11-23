$(document).ready(function () {
  // Variables de configuración
  const articlesPerPage = 8;
  const articlesContainer = $('.articles');
  const paginationContainer = $('.pagination-area');

  // Función para mostrar los artículos de la página seleccionada
  function displayArticles(page = 1) {
    articlesContainer.empty(); // Limpiar el contenedor

    let data = JSON.parse(sessionStorage.getItem('articles'));
    const start = (page - 1) * articlesPerPage;
    const end = page * articlesPerPage;
    const pageArticles = data.slice(start, end);

    let months = [
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

    pageArticles.forEach(article => {
      // Fecha Publicación
      let date = new Date(article.publication_date);
      let day = article.publication_date.substr(8, 8);
      let month = date.getMonth() + 1;
      month = months[month];
      let year = article.publication_date.substr(0, 4);

      publication_date = `${day} ${month} ${year}`;

      // Contenido
      content = article.content;
      content.length > 86 ? (content = `${content.substr(0, 86)}...`) : content;

      articlesContainer.append(`
        <div class="col-lg-6 col-md-6">
          <div class="blog-item" id="${article.id_article}_${article.title.replace(/ /g, '-').toLowerCase()}">
            <div class="blog-image">
              <a href="javascript:;">
                <img src="${article.img}" alt="${article.title}">
              </a>
            </div>
            <div class="single-blog-item">
              <ul class="blog-list">
                <li><a href="javascript:;"><i class="fa fa-user-alt">${article.author}</i></a></li>
                <li><a href="javascript:;"><i class="fas fa-calendar-week">${publication_date}</i></a></li>
                <li><a href="javascript:;"> <i class="bi bi-eye-fill">${article.views.toLocaleString()}</i></a></li>
              </ul>
              <div class="blog-content">
                <h3><a href="javascript:;">${article.title}</a></h3>
                <p>${content}</p>
                <div class="blog-btn"><a href="javascript:;" class="blog-btn-one">Leer Más</a></div>
              </div>
            </div>
          </div>
        </div>
      `);
    });

    // Actualizar el estilo del número de página actual
    paginationContainer.find('.page-numbers').removeClass('current').removeAttr('aria-current');
    paginationContainer.find(`.page-numbers:contains(${page})`).addClass('current').attr('aria-current', 'page');
  }

  // Función para generar los botones de paginación
  function createPagination() {
    paginationContainer.empty(); // Limpiar la paginación
    let data = JSON.parse(sessionStorage.getItem('articles'));

    const totalPages = Math.ceil(data.length / articlesPerPage);

    paginationContainer.append('<a href="javascript:;" class="prev page-numbers"><i class="fas fa-angle-double-left"></i></a>');

    for (let i = 1; i <= totalPages; i++) {
      paginationContainer.append(`<a href="javascript:;" class="page-numbers">${i}</a>`);
    }

    paginationContainer.append('<a href="javascript:;" class="next page-numbers"><i class="fas fa-angle-double-right"></i></a>');
  }

  // Evento para manejar clics en los botones de paginación
  paginationContainer.on('click', '.page-numbers', function () {
    const selectedPage = $(this).text();
    displayArticles(parseInt(selectedPage));
  });

  fetchindata = async () => {
    data = await getArticles();

    sessionStorage.setItem('articles', JSON.stringify(data.recentArticles));
    createPagination();
    displayArticles(1); // Mostrar la primera página al cargar
    // loadArticles(data.recentArticles);
    loadPopularArticles(data.recentArticles);
  };

  fetchindata();

  /* Cargar todos los articulos 
  loadArticles = () => {
    //for (i = 0; i < data.length; i++) {
      // // Fecha Publicación
      // months = [
      //   '',
      //   'January',
      //   'February',
      //   'March',
      //   'April',
      //   'May',
      //   'June',
      //   'July',
      //   'August',
      //   'September',
      //   'Octuber',
      //   'November',
      //   'December',
      // ];
      // date = new Date(data[i].publication_date);
      // day = data[i].publication_date.substr(8, 8);
      // month = date.getMonth() + 1;
      // month = months[month];
      // year = data[i].publication_date.substr(0, 4);

      // publication_date = `${day} ${month} ${year}`;

      // // Contenido
      // content = data[i].content;
      // content.length > 86 ? (content = `${content.substr(0, 86)}...`) : content;

      // $('.articles').append(`
      // <div class="col-lg-6 col-md-6">
      // 				<div class="blog-item" id="${data[i].id_article}_${data[i].title.replace(/ /g, '-').toLowerCase()}">
      // 					<div class="blog-image">
      // 						<a href="javascript:;">
      // 							<img src="${data[i].img}" alt="${data[i].title}">
      // 						</a>
      // 					</div>
      // 					<div class="single-blog-item">
      // 						<ul class="blog-list">
      // 							<li><a href="javascript:;"><i class="fa fa-user-alt" id="author-${i + 1}">${data[i].author}</i></a></li>
      // 							<li><a href="javascript:;"><i class="fas fa-calendar-week" id="date-${i + 1}"> ${publication_date}</i></a></li>
      // 							<li><a href="javascript:;"> <i class="bi bi-eye-fill" id="view-${i + 1}">${data[i].views.toLocaleString()}</i></a></li>
      // 						</ul>
      // 						<div class="blog-content">
      // 							<h3>
      // 								<a href="javascript:;" id="title-${i + 1}">${data[i].title}</a>
      // 							</h3>
      // 							<p id="content-${i + 1}">${content}</p>
      // 							<div class="blog-btn"> <a href="javascript:;" class="blog-btn-one">Leer Mas</a>
      // 							</div>
      // 						</div>
      // 					</div>
      // 				</div>
      // 			</div>`);
    //}
  }; */

  /* Cargar articulos populares */
  loadPopularArticles = (data) => {
    data.length > 3 ? (count = 3) : (count = data.length);
    for (i = 0; i < count; i++) {
      // Id articulo
      var article = document.getElementById(`item-${i + 1}`);
      article.id = `${data[i].id_article}_${data[i].title.replace(/ /g, '-').toLowerCase()}`;

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

  $(document).on('click', '.blog-item', function (e) {
    let id = this.id;

    let partes = id.split("_");
    let id_article = partes[0];
    let title = partes[1];

    if (id_article.includes('idArticle')) {
      toastr.error('No es posible acceder a este articulo');
      return false;
    } else {
      // localStorage.setItem('id_article', id_article);

      location.href = `/articulo/${title}`;
    }
  });
});
