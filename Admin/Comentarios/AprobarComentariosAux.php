<?php

session_start();

require_once '../../DataBase.php';
require_once '../../SessionTasks.php';

if (isset($_POST['Alias']) and isset($_POST['MovieName']) and isset($_POST['Veredict'])) {
    $alias = $_POST['Alias'];
    $movieName = $_POST['MovieName'];
    $veredict = $_POST['Veredict'];
    Change_comment_status($alias, $movieName, $veredict);
}

function Change_comment_status($alias, $movieName, $veredict)
{
    if ($veredict == "yes") {
        ApproveComment($alias, $movieName);
    } else if ($veredict == "no") {
        DisapproveComment($alias, $movieName);
    }
}

function ApproveComment($alias, $movieName)
{
    $userId = GetUserId($alias);
    $movieId = GetMovieId($movieName);
    $sql = 'SELECT id FROM comentarios WHERE id_pelicula = "' . $movieId . '" AND id_usuario = "' . $userId . '"';
    $commentId = DataBasePetition($sql)[0]['id'];
    $sql = 'UPDATE `comentarios` SET `estado` = "APROBADO" WHERE (`id` = ' . $commentId . ')';
    DataBasePetition($sql);
    $average = GetAverageMovieRating($movieId);
    UpdateMovieRating($average, $movieId);
}

function DisapproveComment($alias, $movieName)
{
    $userId = GetUserId($alias);
    $movieId = GetMovieId($movieName);
    $sql = 'SELECT id FROM comentarios WHERE id_pelicula = "' . $movieId . '" AND id_usuario = "' . $userId . '"';
    $commentId = DataBasePetition($sql)[0]['id'];
    $sql = 'UPDATE `comentarios` SET `estado` = "RECHAZADO" WHERE (`id` = ' . $commentId . ')';
    DataBasePetition($sql);
}

function ShowPendingComments()
{
    if (isset($_SESSION["loggedUser"]) and $_SESSION["loggedUser"]["esAdmin"]) {
        $sql = 'SELECT * FROM comentarios  WHERE estado = "PENDIENTE"';
        $result = DataBasePetition($sql);
        LoopComments($result);
    } else {
        echo 'No tienes permiso para aprobar comentarios';
    }

}

function LoopComments($result)
{
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
    $MovieName = GetMovieName($movieId);
    $Alias = GetAlias($userId);
    echo '<div class="comentario">
    <div class="info">
        <p id ="title">' . $MovieName . '</p>
        <p style= "color: coral; text-align:center;" id="alias">' . $Alias . '</p>
    </div>
    <blockquote style="margin: 8px 20px;text-align: center;">
      " ' . $message . ' "
      <p>' . $rating . '/5</p>
    </blockquote>
    <div class="veredicto">
      <button class="no">X</button>
      <button class="yes">✓</button>
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
