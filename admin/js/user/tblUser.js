$(document).ready(function () {
  tblUser = $('#tblUsers').dataTable({
    pageLength: 50,
    ajax: {
      url: '../../api/users',
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
        title: 'Nombre',
        data: 'firstname',
        className: 'uniqueClassName',
      },
      {
        title: 'Apellido',
        data: 'lastname',
        className: 'uniqueClassName',
      },
      {
        title: 'Correo',
        data: 'email',
        className: 'uniqueClassName',
      },
      {
        title: 'Acciones',
        data: 'id_user',
        className: 'uniqueClassName',
        render: function (data) {
          return `
                <a href="javascript:;" <i id="${data}" class="fa-solid fa-pen-to-square updateUser" data-toggle='tooltip' title='Actualizar Usuario' style="font-size: 30px;margin-right:15px"></i></a>
                <a href="javascript:;" <i id="${data}" class="fa-solid fa-trash-can" data-toggle='tooltip' title='Eliminar Usuario' style="font-size: 30px;color:red" onclick="deleteFunction()"></i></a>`;
        },
      },
    ],
  });
});
