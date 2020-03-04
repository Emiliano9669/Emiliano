<?php
require_once 'peliculaAux.php';
require_once '../SessionTasks.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="estilos pelicula.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>inserte nombre de peli</title>
  </head>
  <body>
  <header>
      <nav>
      <a style="margin:0 50%;" href="../index.php">Volver a Inicio</a>
      </nav>
      <?php
Greets();
?>
      </header>
    <main>
      <div class="poster">
      <?php
ShowMovieTitile(); // es un h1
ShowMoviePoster(); // es simplemente una imagen
ShowMovieReleaseDate(); // es una etiqueta <p> mostrando la fecha de estreno
ShowMovieRating(); // puntuacion global de la pelicula
?>
      </div>
      <div class="infopeli">
        <div class="resumen">
        <?php
ShowResume();
?>
        </div>
        <div class="creditos">
        <?php
ShowCredits();
?>
        </div>
      </div>
    </main>
    <div class="video">
      <h2>Trailer</h2>
      <?php
ShowIframe();
?>
    </div>
    <div class="opiniones">
      <h3>Opiniones</h3>
      <div class="comentarios">
        <?php
DisplayGloboComments(0, 5);
?>
      </div>
      <div class="botones">
        <button id="Back" onclick="GetCommentaries('Back')">Anterior</button>
        <button id="Next" onclick="GetCommentaries('Next')">Siguiente</button>
      </div>
    </div>
    <!-- se termina la clase opiniones-->
    <?php
Show_comment_writer();
?>
  </body>
  <script src="pelicula.js"></script>
</html>
