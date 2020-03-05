<?php
require_once 'AprobarComentariosAux.php';
require_once '../../header.php';
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
     <?php
Display_header('../../index.php');
?>
      <h1>Aprobación de comentarios</h1>

      <div class="comentariosPendientes">
        <?php
ShowPendingComments();
?>
      </div>
    </div>
  </body>
  <script src="AprobarComentarios.js"></script>
</html>
