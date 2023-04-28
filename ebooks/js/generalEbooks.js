$(document).ready(function () {
  /* Buscar Ebook */
  $('#btnSearchEbooks').click(function (e) {
    e.preventDefault();

    let txt = $('#inputSearchEbook').val();

    for (let i = 0; i < recentEbooks.length; i++) {
      let search = false;
      if (
        recentEbooks[i].tittle.includes(txt) ||
        recentEbooks[i].contet.includes(txt) ||
        recentEbooks[i].author.includes(txt)
      )
        search = true;

      if (search == false) recentEbooks.splice(i, 1);
    }

    loadEbooks(recentEbooks);
  });

  /* Filtrar Ebooks x Categoria */
  $(document).on('click', '.option', function () {
    let category = this.id;

    for (let i = 0; i < recentEbooks.length; i++) {
      if (recentEbooks[i].id_category != category) recentEbooks.splice(i, 1);
    }

    loadEbooks(recentEbooks);
  });

  /* Descargar pdf */
  $(document).on('click', '.blog-item', async function (e) {
    id_ebook = this.id;

    if (id_ebook.includes('idEbook')) {
      toastr.error('No es posible acceder a este Ebook');
      return false;
    } else if (active == false) {
      toastr.error('Ingresar sesion antes de descargar Ebook');
      return false;
    } else {
      await $.get(`/api/updateDownloads/${id}`);

      for (let i = 0; i < data.length; i++) {
        if (data[i].id_ebook == id_ebook) {
          url = data[i].url;

          break;
        }
      }

      url = url.replace('../../../', '');

      let link = document.createElement('a');

      link.target = '_blank';

      link.href = url;
      document.body.appendChild(link);
      link.click();

      document.body.removeChild(link);
      delete link;
    }
  });
});
