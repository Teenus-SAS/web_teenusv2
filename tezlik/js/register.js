$(document).ready(function () {
  $("#registerTezlik").click(function (e) {
    e.preventDefault();

    $("#openModal").modal("show");
  });

  $(".closeRegisterTezlik").click(function (e) {
    e.preventDefault();

    $("#openModal").modal("hide");
  });

  /* Register */
  $("#btnRegisterTezlik").click(function (e) {
    e.preventDefault();

    // Selecciona todos los campos a validar
    const fields = {
      firstname: "Nombre",
      lastname: "Apellido",
      email: "Correo electrónico",
      employees: "Número de empleados",
      phone: "Teléfono",
      company: "Empresa",
    };

    // Verifica si algún campo está vacío
    const emptyFields = Object.entries(fields).filter(([id, label]) => {
      const value = $(`#${id}`).val().trim();
      if (!value) {
        $(`#${id}`).addClass("is-invalid"); // Resalta el campo vacío
        return true;
      } else {
        $(`#${id}`).removeClass("is-invalid"); // Limpia el resaltado si no está vacío
        return false;
      }
    });

    // Si hay campos vacíos, muestra el error y detiene la ejecución
    if (emptyFields.length > 0) {
      const fieldNames = emptyFields.map(([id, label]) => label).join(", ");
      toastr.error(`Por favor, complete los siguientes campos: ${fieldNames}`);
      return false;
    }

    // Si todo está correcto, puedes continuar
    toastr.success("Todos los campos están completos y válidos.");

    let data = new FormData(formRegister);

    $.ajax({
      type: "POST",
      url: "https://demo.tezliksoftware.com.co/api/newUserAndCompany",
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function (resp) {
        if (resp.success == true) {
          setTimeout(reloadPage, 5000);

          toastr.success(resp.message);
          console.log(resp.pass);
        } else if (resp.error == true) toastr.error(resp.message);
        else if (resp.info == true) toastr.info(resp.message);
      },
    });

    // fetch(`https://demo.tezliksoftware.com.co/api/newUserAndCompany/${email}`)
    //   // fetch(`http://tezlikv3/api/newUserAndCompany/${email}`)
    //   .then((res) => (res.ok ? res.json() : Promise.reject(res)))
    //   .then((resp) => {
    //     if (resp.success == true) {
    //       setTimeout(reloadPage, 5000);

    //       toastr.success(resp.message);
    //       console.log(resp.pass);
    //     } else if (resp.error == true) toastr.error(resp.message);
    //     else if (resp.info == true) toastr.info(resp.message);
    //   })

    //   .catch((err) => {
    //     console.log(err);
    //   });
  });

  function reloadPage() {
    location.href = "/tezliksoftware";
  }
});
