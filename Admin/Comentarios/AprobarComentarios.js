function Change_comment_status(alias, title, AdminVeredict) {
  var parametros = {
    Alias: alias,
    MovieName: title,
    Veredict: AdminVeredict
  };

  $.ajax({
    data: parametros,
    url: "AprobarComentariosAux.php",
    type: "post",
    success: function(response) {
      if (response != "") {
        $("header").html(response);
      }
    }
  });
}

$(".no").click(function() {
  var AdminVeredict = "no";

  var parent = $(this).parent();
  var BoxComment = parent.parent();

  var alias = GetAlias(BoxComment);
  var title = GetTitle(BoxComment);

  Change_comment_status(alias, title, AdminVeredict);
  BoxComment.hide();
});

$(".yes").click(function() {
  var AdminVeredict = "yes";

  var parent = $(this).parent();
  var BoxComment = parent.parent();

  var alias = GetAlias(BoxComment);
  var title = GetTitle(BoxComment);

  Change_comment_status(alias, title, AdminVeredict);
  BoxComment.hide();
});

function GetAlias(BoxComment) {
  var aliasHTML = BoxComment.find("#alias");
  var alias = aliasHTML.html();
  return alias;
}

function GetTitle(BoxComment) {
  var titleHTML = BoxComment.find("#title");
  var title = titleHTML.html();
  return title;
}
