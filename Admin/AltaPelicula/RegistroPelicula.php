<?php
session_start();
require_once 'RegistroPeliculaAux.php';
require_once '../../SessionTasks.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alta pelicula</title>
    <link rel="stylesheet" href="ReigstroPelicula.css" />
  </head>
  <body>
  <header>
      <nav>
      <a href="../../index.php" style="margin:0 50%;">Volver a Inicio</a>
      </nav>
      <?php
Greets();
?>
      </header>
  <?php
ShowForm();
?>
    </div>
  </body>
</html>
