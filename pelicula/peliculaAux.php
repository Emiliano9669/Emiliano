<?php
require_once '../DataBase.php';

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
    $Iframe = '<iframe
    width="560"
    height="315"
    src="https://www.youtube.com/embed/3GJp6p_mgPo"
    frameborder="0"
    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
    allowfullscreen
  ></iframe>';
    echo $Iframe;
}

function ShowGloboComment($comment, $score, $releaseDate)
{
    $comment = "Comentario de la persona sobre la peli";
    $score = "x";
    $releaseDate = "dd/mm/yyyy";

    echo '<div class="globoComentario">
    <blockquote>' .
        $comment . '
    </blockquote>
    <p>' . $score . '/5</p>
    <p>' . $releaseDate . '</p>
  </div>';
}

function GetGlobalMovieId()
{
    return $GLOBALS['MovieId'];
}
