$(document).ready(function () {
  $('#login').click(function (e) {
    e.preventDefault();

    $('#loginModal').modal('show');
  });

  $('.register').click(function (e) {
    e.preventDefault();

    $('#loginModal').modal('hide');
    $('#registerModal').modal('show');
  });
});
