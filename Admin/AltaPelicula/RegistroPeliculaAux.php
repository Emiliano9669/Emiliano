<?php
require_once '../../DataBase.php';
require_once '../../Parser.php';

if (isset($_POST['submit'])) {
    $info = GetInformation();
    if (InfoIsOk($info)) {
        SaveImage($info);
        SaveMovie($info);
        sleep(3);
        SaveActors($info);
    } else {
        echo '<h2 style="color:red;">No puede quedar ningun campo sin rellenar!</h2>';
    }
}

function InfoIsOk($info)
{
    $name = $info['titulo'];
    $id_genero = $info['id_genero']; // no puede ser "Cualquiera"
    $date = $info['fecha'];
    $actor1 = $info['actor1'];
    $actor2 = $info['actor2'];
    $actor3 = $info['actor3'];
    $director = $info['director'];
    if ($name == ""
        or !isset($date)
        or !isset($id_genero)
        or $actor1 == ""
        or $actor2 == ""
        or $actor3 == ""
        or $director == "") {
        return false;
    } else {
        return true;
    }
}

function SaveActors($info)
{
    $MovieId = GetMovieId($info['titulo']);
    for ($i = 1; $i <= 3; $i++) {
        $actor = "actor" . $i;
        $sql = 'INSERT INTO `elencos` (`id_pelicula`, `nombre`) VALUES ("' . $MovieId . '", "' . $info[$actor] . '");';
        DataBasePetition($sql);
    }
}

function SaveImage($info)
{
    $dir = "imagenes/" . $info['titulo'] . ".jpg";
    move_uploaded_file($_FILES['poster']['tmp_name'], $dir);
}

function SaveMovie($info)
{
    $sql1 = "INSERT INTO `peliculas` (`titulo`, `id_genero`, `fecha_lanzamiento`, `resumen`, `director`, `youtube_trailer`,`puntuacion`) ";
    $sql2 = ' VALUES ("' . $info["titulo"] . '", "' . $info["id_genero"] . '", "' . $info["fecha"] . '", "' . $info["resumen"] . '", "' . $info["director"] . '", "' . $info["yt_trailer"] . '", "0.00");';
    $sql = $sql1 . $sql2;
    DataBasePetition($sql);
}

function GetInformation()
{
    $titulo = Clean_Title($_POST['titulo']);
    if ($_POST['genero'] != "Cualquiera") {
        $id_genero = GetMovieGenderId($_POST['genero']);
    } else {
        $id_genero = null;
    }
    $fecha = $_POST['fecha'];
    $actor1 = $_POST['actor1'];
    $actor2 = $_POST['actor2'];
    $actor3 = $_POST['actor3'];
    $director = $_POST['director'];
    $yt_trailer = Get_YTLink();
    $resumen = $_POST['resumen'];

    $list = array("titulo" => $titulo,
        "id_genero" => $id_genero,
        "fecha" => $fecha,
        "actor1" => $actor1,
        "actor2" => $actor2,
        "actor3" => $actor3,
        "director" => $director,
        "yt_trailer" => $yt_trailer,
        "resumen" => $resumen,
    );
    return $list;
}

function Get_YTLink()
{
    if (isset($_POST['linkyt'])) {
        return $_POST['linkyt'];
    } else {
        return null;
    }
}
function ShowForm()
{
    $isAdmin = ActualSessionIsAdmin();

    if ($isAdmin) {
        echo '<h1>Alta de película</h1>
        <form  method="post" enctype="multipart/form-data">
        <label>Título</label>
        <input type="text" name="titulo"/>
        <label> Género </label>';
        MakeGenderSelection();
        echo '<label>Fecha de salida</label>
        <input type="date" name="fecha"/>
        <label>Actores</label>
        <input type="text" name="actor1">
        <input type="text" name="actor2">
        <input type="text" name="actor3">
        <label>Director</label>
        <input type="text" name="director">
        <label>Poster</label>
        <input type="file" name="poster">
        <label>Trailer de youtube</label>
        <input type="text" name="linkyt">
        <label>Resumen</label>
        <textarea name="resumen" cols="30" rows="10"></textarea>
        <input type="submit" name="submit" value="Enviar">
        </form>';
    } else {
        echo '<p style = "text-align:center;">No tiene permisos para dar de alta una película</p>';
    }
}
