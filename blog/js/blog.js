$(document).ready(function () {
  fetchindata = async () => {
    data = await getArticles();
    loadArticles(data.recentArticles);
    loadPopularArticles(data.recentArticles);
  };

  fetchindata();

  /* Cargar todos los articulos */
  loadArticles = (data) => {
    for (i = 0; i < data.length; i++) {
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

      // // Contenido
      content = data[i].content;
      content.length > 86 ? (content = `${content.substr(0, 86)}...`) : content;

      $('.articles').append(`
      <div class="col-lg-6 col-md-6">
							<div class="blog-item" id="${data[i].id_article}">
								<div class="blog-image">
									<a href="javascript:;">
										<img src="${data[i].img}" alt="${data[i].title}">
									</a>
								</div>
								<div class="single-blog-item">
									<ul class="blog-list">
										<li><a href="javascript:;"><i class="fa fa-user-alt" id="author-${i + 1}">${data[i].author}</i></a></li>
										<li><a href="javascript:;"><i class="fas fa-calendar-week" id="date-${i + 1}"> ${publication_date}</i></a></li>
										<li><a href="javascript:;"> <i class="bi bi-eye-fill" id="view-${i + 1}">${data[i].views.toLocaleString()}</i></a></li>
									</ul>
									<div class="blog-content">
										<h3>
											<a href="javascript:;" id="title-${i + 1}">${data[i].title}</a>
										</h3>
										<p id="content-${i + 1}">${content}</p>
										<div class="blog-btn"> <a href="javascript:;" class="blog-btn-one">Leer Mas</a>
										</div>
									</div>
								</div>
							</div>
						</div>`);
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

  $(document).on('click', '.blog-item', function (e) {
    id_article = this.id;

    if (id_article.includes('idArticle')) {
      toastr.error('No es posible acceder a este articulo');
      return false;
    } else {
      localStorage.setItem('id_article', id_article);

      location.href = '/articulo';
    }
  });
});
