$(document).ready(function () {
  $('#openModalForm').click(function (e) { 
    e.preventDefault();

    $('#contactForm').trigger('reset');
    $('#modalContact').modal('show');
  });
  
  $('.closeModal').click(function (e) { 
    e.preventDefault();
    
    $('#modalContact').modal('hide');
  });

  $('#btnSendContact').click(async function (e) {
    e.preventDefault();

    let name = $('#name').val();
    let email = $('#email').val();
    let phone = $('#phone').val();
    let company = $('#company').val();
    
    if (
      name.trim() == '' || !name.trim() ||
      email.trim() == '' || !email.trim() ||
      phone.trim() == '' || !phone.trim() ||
      company.trim() == '' || !company.trim()
    ) {
      toastr.error('Ingrese todos los campos');
      return false;
    }

    let data = new FormData(contactForm);

    try {
      let resp = await $.ajax({
        url: '/api/addContactLeadMagnet',
        type: 'POST',
        data: data,
        contentType: false,
        cache: false,
        processData: false,
      });
      if (resp.success == true) {
        toastr.success(resp.message);

        const a = document.createElement('a');
        a.style.display = 'none';
        a.href = dataLeadMagnet.file;
 
        const partes = dataLeadMagnet.file.split("/");
        const name = partes[partes.length - 1];
        const extension = name.split('.').pop();
 
        const allowedTypes = ['pdf', 'doc', 'docx', 'txt', 'xls', 'xlsx', 'ppt', 'pptx'];

        if (allowedTypes.includes(extension.toLowerCase())) { 
          a.download = `${name}`;
          document.body.appendChild(a);
          a.click();
        } else { 
          console.log('Tipo de archivo no permitido.');
        }

        $('#modalContact').modal('hide');

        return false;
      } else if (resp.error == true) toastr.error(resp.message);
      else if (resp.info == true) toastr.info(resp.message);
    } catch (error) {
      console.error(error);
    }
  });
});
