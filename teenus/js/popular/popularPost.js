$(document).ready(function () {
  $(document).on('click', '.item', function (e) {
    id_article = this.id;

    if (id_article.includes('item')) {
      toastr.error('No es posible acceder a este articulo');
      return false;
    } else {
      // localStorage.setItem('id_article', id_article);
      location.href = `/articulo/${title}`;
    }
  });
});
