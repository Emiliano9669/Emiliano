<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="estilosRegistro.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Registro</title>
  </head>
  <body>
  <nav>
      <a style="margin:0 50%;" href="../../index.php">Volver a Inicio</a>
      </nav>
    <div class="registro">
      <h1>Registrarse</h1>
      <form>
        <input id="email" type="email" placeholder="Email" />
        <input id="alias" type="text" placeholder="Alias" />
        <input id="password" type="password" placeholder="Contraseña" />
      </form>
      <p class="centrar" id="response"></p>
      <button id="submit">Enviar</button>
    </div>
  </body>
  <script src="registro.js"></script>
</html>
