$(document).ready(function () {
  let newEditor;
  debugger;
  /* Cargar editor */
  ClassicEditor.create(document.querySelector('#compose-editor'), {
    simpleUpload: {
      uploadUrl: '/api/image.upload',
    },
    mediaEmbed: {
      previewsInData: true,
    },
  })
    .then((editor) => {
      editor.ui.view.editable.element.style.height = '250px';
      newEditor = editor;
    })
    .catch((error) => {
      console.error(error);
    });

  /* Obtener contenido */
  getContent = () => {
    content = newEditor.getData();
    return content;
  };

  /* Establecer contenido */
  setContent = (content) => {
    newEditor.setData(content);
  };
});
