<?php
require_once 'AprobarComentariosAux.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Comentarios pendientes</title>
    <link rel="stylesheet" href="AprobarComentarios.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  </head>
  <body>
    <div class="contenido">
      <header>header comun en todas las paginas</header>
      <h1>Aprobación de comentarios FALTA PONER SOLO PARA ADMINS ESTA FUNCION</h1>

      <?php
Make_Movie_Selector()
?>
      <div class="comentariosPendientes">
        <?php
ShowPendingComments();
?>
      </div>
    </div>
  </body>
  <script src="AprobarComentarios.js"></script>
</html>
