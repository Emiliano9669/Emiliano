<!--Al hacer clic sobre una película se debe navegar hacia una página que muestre el poster, el título, la fecha de lanzamiento, un
resumen (texto) de la película, el nombre del director y de los principales actores del elenco. Opcionalmente las películas podrán
tener un video en youtube asociado, para que los usuarios puedan ver el trailer.
En la ficha de una película se deben mostrar además todos los comentarios aprobados que hayan ingresado los usuarios (Ver
Registro de comentario y Aprobación de Comentarios), paginados de a 5 elementos utilizando ajax y ordenados por fecha de
ingreso decreciente-->

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
        <h1>Titulo de la pelicula</h1>
        <img src="92753.jpg" alt="poster pelicula" />
        <p>xx/xx/xxxx</p>
      </div>
      <div class="infopeli">
        <div class="resumen">
          Aqui el resumen bien largo
        </div>
        <div class="creditos">
          Director: adsdadadasdsa Actores: dsadasdsa, adssadads ,adsadsads
          ,adsads
        </div>
      </div>
    </main>
    <div class="video">
      <h2>Trailer</h2>
      <iframe
        width="560"
        height="315"
        src="https://www.youtube.com/embed/3GJp6p_mgPo"
        frameborder="0"
        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen
      ></iframe>
    </div>
    <div class="opiniones">
      <h3>Opiniones:</h3>
      <div class="comentarios">
        <div class="globoComentario">
          <blockquote>
            La pelicula me gusto creo que merece un oscar el actor
          </blockquote>
          <p>X/5 | xx/xx/xxxx</p>
        </div>
        <div class="globoComentario">
          <blockquote>
            La pelicula me gusto creo que merece un oscar el actor
          </blockquote>
          <p>X/5 | xx/xx/xxxx</p>
        </div>
        <div class="globoComentario">
          <blockquote>
            La pelicula me gusto creo que merece un oscar el actor
          </blockquote>
          <p>X/5 | xx/xx/xxxx</p>
        </div>
        <div class="globoComentario">
          <blockquote>
            La pelicula me gusto creo que merece un oscar el actor
          </blockquote>
          <p>X/5 | xx/xx/xxxx</p>
        </div>
        <div class="globoComentario">
          <blockquote>
            La pelicula me gusto creo que merece un oscar el actor
          </blockquote>
          <p>X/5 | xx/xx/xxxx</p>
        </div>
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
        Esta es la seccion para opinar si un usuario esta registrador
      </p>
      <textarea name="" id="" cols="30" rows="10"></textarea>
      <button>enviar opinion (usuario)</button>
    </div>
  </body>
</html>
