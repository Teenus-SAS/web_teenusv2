ClassicEditor.create(document.querySelector('#compose-editor'))
  .then((editor) => {
    editor.ui.view.editable.element.style.height = '250px';
  })
  .catch((error) => {
    console.error(error);
  });
