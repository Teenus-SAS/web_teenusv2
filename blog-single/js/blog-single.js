$(document).ready(function () { 
  // let idArticle = localStorage.getItem('id_article');
  loadArticleByTitle = async () => {
    try {
      data = await $.ajax({ url: `/api/article/${titleArticle.replace(/-/g, ' ')}` });
      if (!data) {
        toastr.error('Articulo no existe en la base de datos');
        setTimeout(() => {
          location.href = '/blogs'
        }, 1000);
      }
      else
        idArticle = data.id_article;

      // Actualizar visita
      $.ajax({
        url: `/api/updateArticleView/${idArticle}`,
      });

      // Cargar articulo
      // fetch(`/api/article/${idArticle}`)
      //   .then((response) => response.text())
      //   .then((data) => {
      //     data = JSON.parse(data);
      //     loadArticle(data);
      //   }); 

      loadArticle = (data) => { 
        // Imagen
        $('.image').html(`<img src="${data.img}" alt="image"/>`);
        // Autor
        $('#author').html(` ${data.author}`);

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
        date = new Date(data.publication_date);
        day = data.publication_date.substr(8, 8);
        month = date.getMonth() + 1;
        month = months[month];
        year = data.publication_date.substr(0, 4);
        publication_date = `${day} ${month} ${year}`;

        $('#date').html(` ${publication_date}`);

        // Titulo
        $('#title').html(data.title);

        // Contenido
        $('#content').html(data.content);
      };

      loadArticle(data);

      // Cargar Post populares
      fetch(`/api/articles`)
        .then((response) => response.text())
        .then((data) => {
          data = JSON.parse(data);
          loadPopularArticles(data.recentArticles);
        });

      loadPopularArticles = (data) => {
        data.length > 3 ? (count = 3) : (count = data.length);
        for (i = 0; i < count; i++) {
          // Id articulo
          var article = document.getElementById(`item-${i + 1}`);
          article.id = `${data[i].id_article}_${data[i].title.replace(/ /g, '-').toLowerCase()}`;

          // Imagen
          $(`.p-image-${i + 1}`).html(`<img src="${data[i].img}" style="width:80px;heigth:80px" />`);

          // Vista
          $(`#p-view-${i + 1}`).html(` ${data[i].views.toLocaleString()}`);

          // Titulo
          title = data[i].title;
          title.length > 50 ? (title = `${title.substr(0, 50)}...`) : title;
          $(`#p-title-${i + 1}`).html(title);
        }
        $(`#${idArticle}`).css('pointer-events', 'none');
      };
    } catch (error) {
      console.error(error);
    }
  };
  
  loadArticleByTitle();
  /* Compartir articulo */
  $(document).on('click', '.share', function () {
    // localStorage.setItem('id_article', idArticle);
    let share = `${this.id}${location.href}`;
    location.href = share;
  });
  
  $(document).on('click', '.nav-links', function () {
    let id = this.id

    $.ajax({ 
      url: `/api/navigationArticle/${idArticle}/${id}`, 
      success: function (response) {
        if (response == false) {
          if (id == 'previous')            
            toastr.error('No existe articulo anterior a este');
          else
            toastr.error('No existe articulo posterior a este');
          
          return false;
        }
 
        // localStorage.setItem('id_article', response.id_article);
        location.href = `/articulo/${response.title.replace(/ /g, '-').toLowerCase()}`;
      }
    });
  });
});
