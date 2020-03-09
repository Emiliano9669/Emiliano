<?php
require_once 'peliculaAux.php';
require_once '../SessionTasks.php';
require_once '../header.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="estilos pelicula.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="peliculaTemplate.js"></script>
    <title>Pelicula</title>
  </head>
  <body>
<?php
Display_header('../index.php');
?>
    <main>
      <div class="poster">
      <?php
ShowMovieTitile(); // <h1>
ShowMoviePoster(); // <img>
ShowMovieReleaseDate(); // <p>
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

</html>
