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
    <?php
Show_Trailer();
Build_Comments();
?>
    <!-- se termina la clase opiniones-->
    <?php
Show_comment_writer();
?>
  </body>
  <script src="pelicula.js"></script>
</html>
