<?php
session_start();
require_once 'RegistroPeliculaAux.php';
require_once '../../SessionTasks.php';
require_once '../../header.php';
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
  <?php
Display_header('../../index.php');
?>
  <?php
ShowForm();
?>
    </div>
  </body>
</html>
