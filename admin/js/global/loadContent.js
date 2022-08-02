$(document).ready(function () {
  loadContent = (contenedor, contenido) => {
    $(`.${contenedor}`).load(contenido);
  };

  $('#menu li').click(function (event) {
    // check if window is small enough so dropdown is created
    $('#nav-collapse').removeClass('in').addClass('collapse');
  });
});
