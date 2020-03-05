<?php
require_once '../../DataBase.php';
require_once 'loginAux.php';
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="estilosLogin.css" />
    <link rel="stylesheet" href="estilosRegistro.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <title>Login</title>
  </head>
  <body>
  <nav>
      <a style="margin:0 50%;" href="../../index.php">Volver a Inicio</a>
      </nav>
  <?php
//codigo del profesor modificado
session_start();
if (isset($_SESSION["loggedUser"])) {
    $usuario = $_SESSION["loggedUser"];
    echo ('<li>Hola ' . $usuario["alias"] . ' <a href="#">Salir</a></li>');
} else {
    echo ("<div class='login'>
          <H1> Login </H1>
          <div>
            <input id='email' type='email' placeholder='Email' />
            <input id='password' type='password' placeholder='Contraseña' />
            <button>Ingresar</button>
          </div>
      </div>");
}
?>
  <p id="response" style="text-align:center;"></p>
    <script src="login.js"></script>
  </body>
</html>
