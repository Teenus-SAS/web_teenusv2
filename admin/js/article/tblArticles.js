$(document).ready(function () {
  let data;
  if (data == undefined) getArticles();
  // data == undefined ? getArticles() : data;

  /* Cargar tabla */
  function getArticles() {
    fetch(`/api/articles`)
      .then((response) => response.text())
      .then((data) => {
        data = JSON.parse(data);
        loadTableArticles(data.allArticles);
      });
  }

  loadTableArticles = (data) => {
    tblArticles = $('#tblArticles').dataTable({
      pageLength: 50,
      data: data,
      language: {
        url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json',
      },
      columns: [
        {
          title: 'No.',
          data: null,
          className: 'classCenter',
          render: function (data, type, full, meta) {
            return meta.row + 1;
          },
        },
        {
          title: 'Titulo',
          data: 'title',
          className: 'classCenter',
        },
        {
          title: 'Imagen',
          data: 'img',
          className: 'classCenter',
          render: function (data, type, row) {
            ('use strict');
            return `<img src="${data}" alt="" style="width:80px;height:80px">`;
          },
        },
        {
          title: 'Activa',
          data: 'active',
          className: 'classCenter',
          render: function (data) {
            data == 1 ? (text = 'Si') : (text = 'No');
            return `<p>${text}</p>`;
          },
        },
        {
          title: 'Visitas',
          data: 'views',
          className: 'classCenter',
          render: $.fn.dataTable.render.number('.', ',', 0),
        },
        {
          title: 'Fecha de Publicación',
          data: null,
          className: 'classCenter',
          render: function (data) {
            return `
                  <a href="javascript:;" <i id="${data.id_article}" value="${data.publication_date}" class="fa-solid fa-calendar" data-toggle='tooltip' title='Fecha de Publicación' style="font-size: 30px" onclick="updatePublication('${data.id_article}','${data.publication_date}')"></i></a>`;
          },
        },
        {
          title: 'Visualizar',
          data: 'id_article',
          className: 'classCenter',
          render: function (data) {
            return `
                  <a href="javascript:;" <i id="${data}" class="fa-solid fa-eye viewArticle" data-toggle='tooltip' title='Ver Articulo' style="font-size: 30px;color:blue" onclick="loadContent('page-content', '../../blog-single/index.php')"></i></a>`;
          },
        },
        {
          title: 'Actualizar',
          data: 'id_article',
          className: 'classCenter',
          render: function (data) {
            return `<a href="javascript:;" <i id="${data}" class="fa-solid fa-pencil updateArticles" data-toggle='tooltip' title='Actualizar Articulo' style="font-size: 30px;" onclick="loadContent('page-content', '/admin/views/blog/edit.php')"></i></a>`;
          },
        },
        {
          title: 'Eliminar',
          data: 'id_article',
          className: 'classCenter',
          render: function (data) {
            return `
                  <a href="javascript:;" <i id="${data}" class="fa-solid fa-trash-can" data-toggle='tooltip' title='Eliminar Articulo' style="font-size: 30px;color:red" onclick="deleteFunction()"></i></a>`;
          },
        },
      ],
    });
  };
  /* Abrir vista crear articulo */
  $('#btnNewArticles').click(function (e) {
    e.preventDefault();
    loadContent('page-content', '/admin/views/blog/edit.php');
    $('#btnCreateArticles').html('Crear');
    sessionStorage.removeItem('id_article');
    sessionStorage.removeItem('data');
  });
});
