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
        title: 'Nombre Usuario',
        data: 'username',
        className: 'uniqueClassName',
      },
      {
        title: 'Correo',
        data: 'email',
        className: 'uniqueClassName',
      },
    ],
  });
});
