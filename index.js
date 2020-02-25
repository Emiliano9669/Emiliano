var MovieIndex = 0;

$("select").change(function() {
  MovieIndex = 0;
  console.log($("select").val());
  GetMovies();
});

function GetMovies() {
  console.log("MovieIndex vale: " + MovieIndex);
  var parametros = {
    Genero: $("select").val(),
    MovieNro: MovieIndex
  };
  $.ajax({
    data: parametros,
    url: "indexAux.php",
    type: "post",
    success: function(response) {
      $("main").html(response);
    }
  });
}
