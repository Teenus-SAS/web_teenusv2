$(document).ready(function () {
  $('#registerTezlik').click(function (e) { 
    e.preventDefault();

    $('#openModal').modal('show');    
  });

  $('.closeRegisterTezlik').click(function (e) { 
    e.preventDefault();

    $('#openModal').modal('hide');    
  });

  /* Register */
  $('#btnRegisterTezlik').click(function (e) {
    e.preventDefault();

    let firstname = $('#firstname').val();
    let lastname = $('#lastname').val();
    let email = $('#email').val();
    let employees = $('#employees').val();

    if (
      firstname == ''||
      lastname == ''||
      email == ''||
      employees == ''
    ) {
      toastr.error('Ingrese todos los campos');
      return false;
    }

    let data = new FormData(formRegister);

    $.ajax({
      type: "POST",
      // url: 'http://tezlikv3/api/newUserAndCompany',
      url: 'https://demo.tezliksoftware.com.co/api/newUserAndCompany',
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
      }
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
    location.href = '/tezliksoftware';
  }
});
