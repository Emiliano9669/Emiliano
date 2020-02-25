
<?php
require 'indexAux.php'
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
      <div id='flujoUsuario'>
        <a href="/flujo usuario/login.php">Ingresar</a>
        <a href="/flujo usuario/registro.php">Registro</a>
      </div>
    </header>
    <div id='filtros'>
      <input type='search' placeholder='Ingresa una película...' />
      <div id='genero'>
      <p>Género:</p><?php
MakeGenderSelection();
?>
      </div>
    </div>
    <main>
      <?php
DisplayCardMovies('0', '5', 'Cualquiera');
?>
    </main>
    <div class='nextBack'>
      <button id="Back" onclick="MovieIndex-=5;GetMovies();">Back</button>
      <button id="Next" onclick="MovieIndex+=5;GetMovies();">Next</button>
    </div>
    <script src="index.js"></script>
  </body>
</html>

