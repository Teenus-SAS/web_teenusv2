$(document).ready(function () {
  /* Cargar editor */
  $('#compose-editor').trumbowyg({
    btns: [
      ['viewHTML'],
      ['historyUndo', 'historyRedo'],
      ['formatting'],
      ['fontfamily', 'fontsize'],
      ['strong', 'em', 'del'],
      ['link'],
      ['insertImage', 'table'],
      ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
      ['unorderedList', 'orderedList'],
      ['horizontalRule'],
      ['removeformat'],
    ],
    plugins: {
      resizimg: {
        minSize: 64,
        step: 16,
      },
    },
  });
  // $('#compose-editor').trumbowyg();
});
