<?php
function ShowForm()
{
    $isAdmin = ActualSessionIsAdmin();
    if ($isAdmin) {
        echo '<h1>Alta de película</h1>
        <form action="">
          <div id="titulo">Título: <input type="text"/></div>
          <div id="fechaSalida">Fecha de salida:<input type="date" /></div>
          <div id="actores">Actores: <input type="text"></div>
          <div id="director">Director: <input type="text"></div>
          <div id="poster">Poster: <input type="file"></div>
          <div id="trailer">Trailer de youtube: <input type="text"></div>
          Resumen:
          <textarea name="" id="" cols="30" rows="10"></textarea>
        </form>';
    } else {
        echo '<p style = "text-align:center;">No tiene permisos para dar de alta una película</p>';
    }

}
