<?php
require_once 'peliculaAux.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="estilos pelicula.css" />
    <title>inserte nombre de peli</title>
  </head>
  <body>
    <header>header reservador</header>
    <main>
      <div class="poster">
      <?php
ShowMovieTitile(); // es un h1
ShowMoviePoster(); // es simplemente una imagen
ShowMovieReleaseDate(); // es una etiqueta <p> mostrando la fecha de estreno
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
ShowGloboComment('x', 'x', 'x');
?>
      </div>
      <div class="botones">
        <button>Anterior</button>
        <button>Siguiente</button>
      </div>
    </div>
    <!-- se termina la clase opiniones-->
    <div class="admin">
      <button style="margin: 10px auto;">
        Ver comentarios pendientes de aprobacion (admin)
      </button>
    </div>
    <div class="opinar">
      <p style="color:red;">
        Esta es la seccion para opinar si un usuario esta registrado
      </p>
      <textarea name="" id="" cols="30" rows="10"></textarea>
      <button>enviar opinion (usuario)</button>
    </div>
  </body>
</html>
