$("#submit").click(function() {
  var email = $("#email").val();
  var alias = $("#alias").val();
  var password = $("#password").val();
  console.log("varialbes a insertar : " + email + " " + alias + " " + password);
  var parametros = {
    Email: email,
    Alias: alias,
    Password: password
  };

  $.ajax({
    data: parametros,
    url: "registroAux.php",
    type: "post",
    success: function(response) {
      if (response != "") {
        $("#response").text(response);
      } else {
        console.log("la respuesta del servidor fue nula!");
      }
    },
    error: function() {
      console.log("hubo un error en ajax");
    }
  });
});
