$(document).ready(function () {
  let newEditor;
  /* Cargar editor */
  ClassicEditor.create(document.querySelector('#compose-editor'))
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
