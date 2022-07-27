$(document).ready(function () {
  tblArticles = $('#tblArticles').dataTable({
    pageLength: 50,
    ajax: {
      url: '../../api/articles',
      dataSrc: '',
    },
    language: {
      url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json',
    },
    columns: [
      {
        title: 'No.',
        data: null,
        className: 'uniqueClassName',
        render: function (data, type, full, meta) {
          return meta.row + 1;
        },
      },
      {
        title: 'Titulo',
        data: 'title',
        className: 'uniqueClassName',
      },
      {
        title: 'Imagen',
        data: 'img',
        className: 'uniqueClassName',
        render: (data, type, row) => {
          'use strict';
          return `<img src="${data}" alt="" style="width:50%;border-radius:100px">`;
        },
      },
      {
        title: 'Activa',
        data: 'active',
        className: 'uniqueClassName',
      },
      {
        title: 'Visitas',
        data: 'views',
        className: 'uniqueClassName',
      },
      {
        title: 'Visualizar',
        data: 'id_article',
        className: 'uniqueClassName',
        render: function (data) {
          return `
                  <a href="javascript:;" <i id="${data}" class="mdi mdi-delete-forever" data-toggle='tooltip' title='Eliminar Articulo' style="font-size: 30px;color:red" onclick="loadContent('page-content','../index.php')"></i></a>`;
        },
      },
      {
        title: 'Actualizar',
        data: 'id_article',
        className: 'uniqueClassName',
        render: function (data) {
          return `<a href="javascript:;" <i id="${data}" class="bx bx-edit-alt" data-toggle='tooltip' title='Actualizar Articulo' style="font-size: 30px;" onclick="loadContent('page-content','../views/editArticles.php')"></i></a>`;
        },
      },
      {
        title: 'Eliminar',
        data: 'id_article',
        className: 'uniqueClassName',
        render: function (data) {
          return `
                  <a href="javascript:;" <i id="${data}" class="mdi mdi-delete-forever" data-toggle='tooltip' title='Eliminar Articulo' style="font-size: 30px;color:red" onclick="deleteFunction()"></i></a>`;
        },
      },
    ],
  });
});
