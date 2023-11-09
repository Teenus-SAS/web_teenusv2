$(document).ready(function () {
  /* Cargue tabla de Proyectos */
  tblLeadMagnets = $('#tblLeadMagnets').dataTable({
    pageLength: 50,
    ajax: {
      url: '/api/leadMagnets',
      dataSrc: '',
    },
    dom: '<"datatable-error-console">frtip',
    language: {
      url: '//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json',
    },
    fnInfoCallback: function (oSettings, iStart, iEnd, iMax, iTotal, sPre) {
      if (oSettings.json && oSettings.json.hasOwnProperty('error')) {
        console.error(oSettings.json.error);
      }
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
        title: 'Descripción',
        data: 'description',
        className: 'uniqueClassName',
      },
      {
        title: 'Fecha Creación',
        data: 'date_lead_magnet',
        className: 'uniqueClassName',
      },
      {
        title: 'Visualizar',
        data: 'title',
        className: 'classCenter',
        render: function (data) {
          return ` <a href="javascript:;" <i id="${data}" class="fa-solid fa-eye" data-toggle='tooltip' title='Ver Lead Magnet' style="font-size: 30px;color:blue" onclick="viewLeadMagnet('${data}')"></i></a>`;
        },
      },
      {
        width: '150px',
        title: 'Acciones',
        data: 'id_lead_magnet',
        className: 'uniqueClassName',
        render: function (data) {
          return `<a href="javascript:;" <i id="${data}" class="bx bx-edit-alt updateLeadMagnet" data-toggle='tooltip' title='Actualizar lead Magnet' style="font-size: 30px;"></i></a>
                <a href="javascript:;" <i id="${data}" class="fa-solid fa-trash-can deleteLeadMagnet" data-toggle='tooltip' title='Eliminar lead Magnet' style="font-size: 25px;color:red"></i></a>`;
        },
      },
    ],
  });
});
