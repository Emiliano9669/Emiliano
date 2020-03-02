var CommentIndex = 0;

$("#submit").click(function() {
  var comment = $("#comment").val();
  var rating = $("#userRating").val();
  var parametros = {
    Comment: comment,
    UserRating: rating
  };
  $.ajax({
    data: parametros,
    url: "peliculaAux.php",
    type: "post",
    success: function(response) {
      if (response != "") {
        $(".opinar").html(response);
      }
    }
  });
});

function IsRatingOk() {
  var rating = $("#userRating").val();
  if (rating.length > 1) {
    alert("La calificación tiene que ser un número solo");
    return false;
  }
  return IsInRange(rating);
}

function IsInRange(rating) {
  if (
    rating.includes("1") ||
    rating.includes("2") ||
    rating.includes("3") ||
    rating.includes("4") ||
    rating.includes("5")
  ) {
    return true;
  } else {
    return false;
  }
}

function GetCommentaries(direccion) {
  if (direccion == "Next") {
    CommentIndex += 5;
  } else if (direccion == "Back" && CommentIndex != 0) {
    CommentIndex -= 5;
  }
  $.ajax({
    data: { MessageIndex: CommentIndex },
    url: "peliculaAux.php",
    type: "post",
    success: function(response) {
      if (response != "") {
        $(".comentarios").html(response);
      } else {
        CommentIndex -= 5;
      }
    }
  });
}

function Check_IfNeedTo_Hide_BackButton() {
  if (MovieIndex == 0) {
    $("#Back").hide();
  }
}
function Check_IfNeedTo_Show_BackButton() {
  if (MovieIndex > 0) {
    $("Back").show();
  }
}
