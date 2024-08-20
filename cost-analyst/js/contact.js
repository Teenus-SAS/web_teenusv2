$(document).ready(function () {
  $('#contactForm').submit(function (e) {
    e.preventDefault();

    contactForm = $('#contactForm').serialize();
    $.ajax({
      type: 'POST',
      url: '/api/addContact',
      data: contactForm,
      success: function (resp) {},
    });
  });
});
