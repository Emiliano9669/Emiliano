var MovieIndex = 0;

Check_IfNeedTo_Hide_BackButton();

$("select").change(function() {
  MovieIndex = 0;
  GetMovies();
});

function GetMovies() {
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
      }
    }
  });
}

$("#Buscador").keyup(function() {
  var searchBoxValue = $(this).val();
  console.log("se tecleo en el buscador: " + searchBoxValue);
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
      }
    }
  });
});

$("#Next").click(function() {
  console.log("Next was clicked");
  $("#Back").show();
});

$("#Back").click(function() {
  console.log("Back was clicked");
  Check_IfNeedTo_Hide_BackButton();
});

function Check_IfNeedTo_Hide_BackButton() {
  if (MovieIndex == 0) {
    $("#Back").hide();
  }
}
