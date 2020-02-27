function DoLogin(user, password) {
  var parametros = {
    User: user,
    Password: password
  };
  $.ajax({
    data: parametros,
    url: "loginAux.php",
    type: "post",
    success: function(response) {
      console.log("entrando a la funcion de respuesta: ");
      if (response != "") {
        $("#response").text(response);
        var url = "../../index.php";
        $(location).prop("href", url);
      } else {
        $("#response").text(response);
      }
    },
    error: function() {
      console.log("hubo un error en ajax");
    }
  });
}

$("button").click(function() {
  email = $("#email").val();
  password = $("#password").val();
  console.log("email: " + email + " password:" + password);
  DoLogin(email, password);
});
