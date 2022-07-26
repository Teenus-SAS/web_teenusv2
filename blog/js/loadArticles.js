$(document).ready(function () {
  fetch('/api/articles')
    .then((response) => response.text())
    .then((data) => {
      debugger;
      data = JSON.parse(data);
    });
});
