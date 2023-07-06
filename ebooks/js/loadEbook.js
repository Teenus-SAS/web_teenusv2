$(document).ready(function () {
  $('#registerEbook').show();

  fetchindata = async () => {
    const response = await fetch(`/api/ebooks`);

    response.ok;
    response.status;
    const text = await response.text();

    data = JSON.parse(text);

    recentEbooks = data.recentEbooks;

    loadEbooks(data.allEbooks);
    loadPopularEbooks(data.popularEbooks);
  };

  fetchindata();

  /* Cargar todos los ebooks */
  loadEbooks = (data) => {
    // Fecha Publicación
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
    $('.ebooks').empty();

    for (i = 0; i < data.length; i++) {
      date = new Date(data[i].creation_date);
      day = data[i].creation_date.substr(8, 8);
      month = date.getMonth() + 1;
      month = months[month];
      year = data[i].creation_date.substr(0, 4);

      creation_date = `${day} ${month} ${year}`;

      // // Contenido
      content = data[i].content;
      content.length > 86 ? (content = `${content.substr(0, 86)}...`) : content;

      $('.ebooks').append(`
      <div class="col-lg-6 col-md-6">
							<div class="blog-item" id="${data[i].id_ebook}">
								<div class="blog-image">
									<a href="javascript:;">
										<img src="${data[i].img}" style="width:350px;height:287.77px" alt="image">
									</a>
								</div>
								<div class="single-blog-item">
									<ul class="blog-list">
										<li><a href="javascript:;"><i class="fa fa-user-alt" id="author-${i + 1}">${
        data[i].author
      }</i></a></li>
										<li><a href="javascript:;"><i class="fas fa-calendar-week" id="date-${
                      i + 1
                    }">${creation_date}</i></a></li>
										<li>
											<a href="javascript:;"> <i class="bi bi bi-download" id="download-${
                        i + 1
                      }">${data[i].downloads.toLocaleString()}</i></a>
										</li>
									</ul>
									<div class="blog-content">
										<h3>
											<a href="javascript:;" id="title-${i + 1}">${data[i].title}</a>
										</h3>
										<p id="content-${i + 1}">${content}</p>
									</div>
								</div>
							</div>
						</div>`);
    }
  };

  /* Cargar ebooks populares */
  loadPopularEbooks = (data) => {
    $('.popularEbooks').empty();
    $('.popularEbooks').append('<h3 class="widget-title">Popular Posts</h3>');

    data.length >= 3 ? (count = 3) : (count = data.length);
    for (i = 0; i < count; i++) {
      title = data[i].title;
      title.length > 50 ? (title = `${title.substr(0, 50)}...`) : title;

      $('.popularEbooks').append(`
      <article class="item blog-item" id="${data[i].id_ebook}">
        <a href="javascript:;" class="thumb">
          <img src="${
            data[i].img
          }" style="width:80px;height:80px"/><span class="fullimage cover bg1" role="img"></span>
        </a>
        <div class="info">
          <span class="bi bi-download">${data[
            i
          ].downloads.toLocaleString()}</span>
          <h4 class="title usmall">
            <a href="javascript:;">${title}</a>
          </h4>
        </div>
      </article>
      `);
    }
  };
});
