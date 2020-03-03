<?php

require_once '../../DataBase.php';

function ShowPendingComments()
{
    $sql = 'SELECT * FROM comentarios  WHERE estado = "PENDIENTE"';
    $result = DataBasePetition($sql);
    for ($i = 0; $i < count($result); $i++) {
        $message = $result[$i]['mensaje'];
        $movieId = $result[$i]['id_pelicula'];
        $rating = $result[$i]['puntuacion'];
        $userId = $result[$i]['id_usuario'];
        ShowComment($message, $rating, $userId, $movieId);
    }
}

function ShowComment($message, $rating, $userId, $movieId)
{
    echo '<div class="comentario">
    <blockquote>
      ' . $message . '
      <p>' . $rating . '/5</p>
    </blockquote>
    <div class="veredicto">
      <button>X</button>
      <button>✓</button>
    </div>
  </div>';
}

function Make_Movie_Selector()
{
    $movieNameList = Get_All_Movie_Names();
    echo '<select> ';
    echo "<option selected value ='ninguna'> Cualquiera </option>";
    for ($i = 0; $i < count($movieNameList); $i++) {
        $value = $movieNameList[$i];
        echo "<option value='" . $value . "'>" . $value . "</option>";
    }
    echo '</select>';
}

function Get_All_Movie_Names()
{
    $sql = 'SELECT titulo FROM peliculas';
    $result = DataBasePetition($sql);
    $list = array();
    for ($i = 0; $i < count($result); $i++) {
        $titile = $result[$i]['titulo'];
        $list = array_merge(array($titile), $list);
    }
    return $list;
}
