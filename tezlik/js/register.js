$(document).ready(function () {
  /* Register */
  $('#btnRegister').click(function (e) {
    e.preventDefault();

    let email = $('#emailUser').val();

    if (email == '') {
      toastr.error('Ingrese todos los campos');
      return false;
    }

    fetch(`https://demo.tezliksoftware.com.co/api/newUserAndCompany/${email}`)
      // fetch(`http://tezlikv3/api/newUserAndCompany/${email}`)
      .then((res) => (res.ok ? res.json() : Promise.reject(res)))
      .then((resp) => {
        if (resp.success == true) {
          setTimeout(reloadPage, 5000);

          toastr.success(resp.message);
          console.log(resp.pass);
        } else if (resp.error == true) toastr.error(resp.message);
        else if (resp.info == true) toastr.info(resp.message);
      })

      .catch((err) => {
        console.log(err);
      });
  });

  function reloadPage() {
    location.href = '/tezliksoftware';
  }
});
