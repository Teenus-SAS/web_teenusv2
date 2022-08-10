$(document).ready(function () {
  id_article = localStorage.getItem('id_article');

  if (id_article) loadContent('page-content', '../../blog-single/index.php');
});
