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
  </head>
  <body>
    <div class="contenido">
      <header>header comun en todas las paginas</header>
      <h1>Aprobación de comentarios</h1>
      <?php
Make_Movie_Selector()
?>
      <div class="comentariosPendientes">
        <div class="comentario">
          <blockquote>
            todo el texto del comentario
            <p>3/5</p>
          </blockquote>
          <div class="veredicto">
            <button>X</button>
            <button>✓</button>
          </div>
        </div>
        <!-- -->
        <?php
ShowPendingComments();
?>
      </div>
    </div>
  </body>
</html>
