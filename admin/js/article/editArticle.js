$(document).ready(function () {
  localStorage.removeItem("id_article");

  /* Modificar Fecha de publicación */
  updatePublication = (id_article, publication_date) => {
    var date = new Date();
    var dateString;
    date.setDate(date.getDate());
    dateString =
      date.getFullYear() +
      "-" +
      ("0" + (date.getMonth() + 1)).slice(-2) +
      "-" +
      ("0" + date.getDate()).slice(-2);

    bootbox.confirm({
      title: "Modificación de Articulo",
      message: `<p>Ingrese fecha de publicación:</p>
            <input id="publicationDate" class="bootbox-input bootbox-input-date form-control" autocomplete="off" type="date" min="${dateString}" value="${publication_date}">`,
      buttons: {
        confirm: {
          label: "Guardar",
          className: "btn-success",
        },
        cancel: {
          label: "Cancelar",
          className: "btn-danger",
        },
      },
      callback: function (result) {
        if (result == true) {
          publication_date = $("#publicationDate").val();

          data = {};
          data["publicationDate"] = publication_date;
          data["idArticle"] = id_article;

          $.post(
            "/api/updatePublication",
            data,
            function (data, textStatus, jqXHR) {
              message(data);
              setTimeout(() => {
                location.href = "/admin/blogs-detalles";
              }, 2000);
            }
          );
        }
      },
    });
  };

  /* Visualizar Articulo */
  viewArticle = (id) => {
    localStorage.setItem("id_article", id);
    window.open("/articulo", "_blank");
  };

  /* Actualizar Articulos */
  $(document).on("click", ".updateArticles", function (e) {
    idArticle = this.id;
    sessionStorage.setItem("id_article", idArticle);

    let row = $(this).parent().parent()[0];
    let data = tblArticles.fnGetData(row);

    sessionStorage.setItem("data", JSON.stringify(data));
  });

  /* Eliminar Articulos */

  deleteFunction = () => {
    let row = $(this.activeElement).parent().parent()[0];
    let data = tblArticles.fnGetData(row);

    let idArticle = data.id_article;

    bootbox.confirm({
      title: "Eliminar",
      message:
        "Está seguro de eliminar este articulo? Esta acción no se puede reversar.",
      buttons: {
        confirm: {
          label: "Si",
          className: "btn-success",
        },
        cancel: {
          label: "No",
          className: "btn-danger",
        },
      },
      callback: function (result) {
        if (result == true) {
          $.get(
            `/api/deleteArticle/${idArticle}`,
            function (data, textStatus, jqXHR) {
              message(data);

              setTimeout(() => {
                location.href = "/admin/blogs-detalles";
              }, 2000);
            }
          );
        }
      },
    });
  };

  /* Mensaje de exito */
  message = (data) => {
    if (data.success == true) {
      toastr.success(data.message);
      return false;
    } else if (data.error == true) toastr.error(data.message);
    else if (data.info == true) toastr.info(data.message);
  };
});
