<?php
require_once '../DataBase.php';
session_start();

if (isset($_POST['Comment']) and isset($_POST['UserRating'])) {
    $comment = $_POST['Comment'];
    $rating = $_POST['UserRating'];
    if (CheckRating($rating) and CheckComment($comment)) {
        $MovieId = GetGlobalMovieId();
        $UserId = $_SESSION["loggedUser"]["id"];
        $sql = 'INSERT INTO `comentarios` (`id_pelicula`, `mensaje`, `puntuacion`, `id_usuario`, `estado`) VALUES ("' . $MovieId . '", "' . $comment . '", "' . $rating . '", "' . $UserId . '","PENDIENTE");';
        DataBasePetition($sql);
        echo 'Comentario enviado con éxito';
    } else {
        echo '<p style="text-align: center"> Rating incorrecto o Comentario muy largo </p>';
    }
}

if (isset($_POST['MessageIndex'])) {
    $index = $_POST['MessageIndex'];
    DisplayGloboComments($index, 5);
}

function CheckRating($rating)
{
    if ((strlen($rating) == 1) and ($rating == "1" or
        $rating == "2" or
        $rating == "3" or
        $rating == "4" or
        $rating == "5")) {
        return true;
    } else {
        echo "revise el rating!" . $rating;
        return false;
    }
}

function CheckComment($comment)
{
    if (strlen($comment) < 151) {
        return true;
    } else {
        return false;
    }
}

function ShowMovieTitile()
{
    $movieId = GetGlobalMovieId();
    $sql = "SELECT titulo FROM peliculas WHERE id = '" . $movieId . "'";
    $result = DataBasePetition($sql);
    $MovieTitile = $result[0]['titulo'];
    echo '<h1>' . $MovieTitile . '</h1>';
}

function ShowMoviePoster()
{
    echo '<img src="nothing.jpg" alt="generic poster">';
}

function ShowMovieReleaseDate()
{
    $movieId = GetGlobalMovieId();
    $sql = "SELECT fecha_lanzamiento FROM peliculas WHERE id='" . $movieId . "'";
    $result = DataBasePetition($sql);
    $releaseDate = $result[0]['fecha_lanzamiento'];
    echo '<p> fecha estreno: ' . $releaseDate . '</p>';
}

function ShowResume()
{
    $movieId = GetGlobalMovieId();
    $sql = "SELECT resumen FROM peliculas WHERE id ='" . $movieId . "'";
    $result = DataBasePetition($sql);
    $resume = $result[0]['resumen'];
    echo '<p>' . $resume . '</p>';
}

function ShowCredits()
{
    $movieId = GetGlobalMovieId();
    $Director = GetDirector($movieId);
    $Actors = GetActors($movieId); // devuelve un array
    echo '<p> Director: ' . $Director . '</p> <p> Actors: ' . WriteArray($Actors) . '</p>';
}

function GetActors($movieId)
{
    $sql = "SELECT nombre FROM elencos WHERE id_pelicula ='" . $movieId . "'";
    $result = DataBasePetition($sql);
    $actors = array();
    for ($i = 0; $i < count($result); $i++) {
        $actor = array($result[$i]['nombre']);
        $actors = array_merge($actors, $actor);
    }
    return $actors;
}

function WriteArray($list)
{
    $listOfItems = "";
    for ($i = 0; $i < count($list); $i++) {
        $listOfItems = $listOfItems . " / " . $list[$i];
    }
    return $listOfItems;
}

function GetDirector($movieId)
{
    $sql = "SELECT director FROM peliculas WHERE id ='" . $movieId . "'";
    $result = DataBasePetition($sql);
    $Director = $result[0]['director'];
    return $Director;
}

function ShowIframe()
{
    //https://www.youtube.com/watch?v=0hMdQAjy43A
    //https://www.youtube.com/embed/0hMdQAjy43A
    $movieId = GetGlobalMovieId();
    $sql = "SELECT youtube_trailer FROM peliculas WHERE id = '" . $movieId . "'";
    $result = DataBasePetition($sql);
    $iframeToShow = BuildIframe($result[0]['youtube_trailer']);
    echo $iframeToShow;
}

function BuildIframe($youtubelink)
{
    $linkytEmbed = Convert_YTLink_toEmbed($youtubelink); //Embed youtube link
    $Iframe = '<iframe
    width="560"
    height="315"
    src="' . $linkytEmbed . '"
    frameborder="0"
    allowfullscreen
  ></iframe>';
    return $Iframe;
    //allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
}

function Convert_YTLink_toEmbed($link)
{
    $search = "watch?v=";
    $replace = "embed/";
    $embed = str_replace($search, $replace, $link);
    return $embed;
}

function DisplayGloboComments($index, $offset)
{
    $MovieId = GetGlobalMovieId();
    $sql = "SELECT mensaje,puntuacion FROM comentarios WHERE id_pelicula ='" . $MovieId . "' AND estado = 'APROBADO' LIMIT " . $index . "," . $offset;
    $result = DataBasePetition($sql);
    for ($i = 0; $i < count($result); $i++) {
        $comment = $result[$i]['mensaje'];
        $score = $result[$i]['puntuacion'];
        ShowGloboComment($comment, $score, 'ads');
    }
}

function ShowGloboComment($comment, $score, $releaseDate)
{
    $releaseDate = "dd/mm/yyyy";
    echo '<div class="globoComentario">
    <blockquote>' .
        $comment . '
    </blockquote>
    <p>' . $score . '/5</p>
    <p>' . $releaseDate . '</p>
  </div>';
}

function Show_comment_writer()
{
    if (isset($_SESSION["loggedUser"])) {
        $userId = $_SESSION["loggedUser"]["id"];
        if (!User_Commented($userId, GetGlobalMovieId())) {
            echo '<div class="opinar">
            <p style="text-align: center"> Publica tu comentario sobre esta película </p>
            <textarea name="" id="comment" cols="30" rows="10"></textarea>
            <p> <input type="text" id="userRating" style="width:10px;"> / 5 </p>
            <button id="submit">Enviar Opinion</button>
            </div>';
        } else {
            echo '<p style="text-align: center;  padding: 20px;"> Ya has comentado sobre esta película </p>';
        }
    }
}

function User_Commented($UserId, $MovieId)
{
    $sql = "SELECT * FROM comentarios WHERE id_usuario = '" . $UserId . "' AND id_pelicula = '" . $MovieId . "'";
    $result = DataBasePetition($sql);
    return $result != null;
}

function GetGlobalMovieId()
{
    return $_SESSION['MovieId']['id'][0];
}
