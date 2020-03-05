
<?php
session_start();
?>
<?php
require 'indexAux.php';
require_once 'DataBase.php';
?>




<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='UTF-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <meta http-equiv='X-UA-Compatible' content='ie=edge' />
    <link rel='stylesheet' href='estilos.css' />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Cine</title>
  </head>
  <body>
      <h1 id='Titulo'>Cine</h1>
      <?php
MakeUserLogging();
MakeAdminTools();
?>

    <div id='filtros'>
      <input type='search' id='Buscador' placeholder='Ingresa una película...' />
      <div id='genero'>
      <p>Género:</p><?php
MakeGenderSelection();
?>
      </div>
    </div>
    <main>
      <?php
DisplayCardMovies('0', '5', 'Cualquiera', '');
?>
    </main>
    <div class='nextBack'>
      <button id="Back" onclick="GetMovies('ant');">Back</button>
      <button id="Next" onclick="GetMovies('sig');">Next</button>
    </div>
    <script src="index.js"></script>
  </body>
</html>

