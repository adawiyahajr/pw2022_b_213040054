$(document).ready(function () {
  // menghilangkan tombol cari
  $("#tombol-cari").hide();

  // event ketika keyword ditulis
  $("#keyword").on("keyup", function () {
    $("#container").load("ajax/film.php?keyword=" + $("#keyword").val());
  });
});
