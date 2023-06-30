$(document).ready(function () {
  /* Cargar tabla */
  fetchindata = async () => {
    data = await getEbooks();
    loadTableEbooks(data.allEbooks);
    // loadRecentEbooks(data.recentEbooks);
  };
  fetchindata();

  loadTableEbooks = (data) => {
    tblEbooks = $('#tblEbooks').dataTable({
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
        // {
        //   title: 'Fecha de Publicación',
        //   data: null,
        //   className: 'classCenter',
        //   render: function (data) {
        //     return `
        //         <div class="row">
        //           <div class="col-lg-5">
        //             <p>${data.publication_date}</p>
        //           </div>
        //           <div class="col">
        //             <a href="javascript:;" <i id="${data.id_ebook}" value="${data.publication_date}" class="fa-solid fa-calendar" data-toggle='tooltip' title='Fecha de Publicación' style="font-size: 30px" onclick="updatePublication('${data.id_ebook}','${data.publication_date}')"></i></a>
        //           </div>
        //         </div>`;
        //   },
        // },
        {
          title: 'Visualizar',
          data: 'id_ebook',
          className: 'classCenter',
          render: function (data) {
            return `
                  <a href="javascript:;" <i id="${data}" class="fa-solid fa-eye" data-toggle='tooltip' title='Ver Articulo' style="font-size: 30px;color:blue" onclick="viewArticle(${data})"></i></a>`;
          },
        },
        {
          title: 'Actualizar',
          data: 'id_ebook',
          className: 'classCenter',
          render: function (data) {
            return `<a href="/admin/editar-ebook" <i id="${data}" class="fa-solid fa-pencil updateEbooks" data-toggle='tooltip' title='Actualizar Articulo' style="font-size: 30px;"></i></a>`;
          },
        },
        {
          title: 'Eliminar',
          data: 'id_ebook',
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
  $('#btnNewEbooks').click(function (e) {
    e.preventDefault();
    location.href = '/admin/editar-ebook';

    $('#btnCreateEbooks').html('Crear');
    sessionStorage.removeItem('id_ebook');
    sessionStorage.removeItem('data');
  });
});
