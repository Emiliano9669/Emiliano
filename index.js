var MovieIndex = 0;

Check_IfNeedTo_Hide_BackButton();

$("select").change(function() {
  MovieIndex = 0;
  GetMovies("no direction");
});

function GetMovies(direccion) {
  if (direccion == "sig") {
    MovieIndex += 5;
  } else if (direccion == "ant") {
    MovieIndex -= 5;
  }
  var parametros = {
    Genero: $("select").val(),
    MovieNro: MovieIndex
  };
  $.ajax({
    data: parametros,
    url: "indexAux.php",
    type: "post",
    success: function(response) {
      if (response != "") {
        $("main").html(response);
        ClickMovieHandler();
      } else {
        MovieIndex -= 5;
      }
    }
  });
}

function ClickMovieHandler() {
  $(".pelicula").click(function() {
    var H2Title = $(this).children("h2");
    var MovieTitle = H2Title.html();
    console.log(MovieTitle);
    $.ajax({
      data: { MovieName: MovieTitle },
      url: "indexAux.php",
      type: "post",
      success: function(response) {
        if (response != "") {
          $("main").html(response);
          ClickMovieHandler();
          //direccionarse hacia la pagina de peliculas
          var url = "pelicula/pelicula.php";
          $(location).prop("href", url);
          console.log("redireccion..");
        }
      }
    });
  });
}

$("#Buscador").keyup(function() {
  var searchBoxValue = $(this).val();
  var parametros = {
    Genero: $("select").val(),
    MovieNro: MovieIndex,
    Search: searchBoxValue
  };
  $.ajax({
    data: parametros,
    url: "indexAux.php",
    type: "post",
    success: function(response) {
      if (response != "") {
        $("main").html(response);
        ClickMovieHandler();
      }
    }
  });
});

$("#Next").click(function() {
  $("#Back").show();
});

$("#Back").click(function() {
  Check_IfNeedTo_Hide_BackButton();
});

$("#Salir").click(function() {
  $.ajax({
    url: "Salir.php",
    success: function() {
      var url = "index.php";
      $(location).prop("href", url);
    },
    error: function() {
      console.log("se ha producido un error");
    }
  });
});

ClickMovieHandler();

function Check_IfNeedTo_Hide_BackButton() {
  if (MovieIndex == 0) {
    $("#Back").hide();
  }
}
