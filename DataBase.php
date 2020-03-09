<?php
require_once 'configuracion.php';

function DataBasePetition($sql)
{
    $connectionDB = new PDO(DSN, UserSQL, PasswordSQL);
    $resultado = $connectionDB->query($sql);
    if ($resultado) {
        $retorno = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $connectionDB = null;
        return $retorno;
    }
}

function GetMovieName($MovieId)
{
    $sql = 'SELECT titulo FROM peliculas WHERE id = "' . $MovieId . '"';
    $result = DataBasePetition($sql);
    $MovieName = $result[0]['titulo'];
    return $MovieName;
}

function GetMovieGenderId($name)
{
    $sql = 'SELECT id FROM generos WHERE nombre= "' . $name . '"';
    $result = DataBasePetition($sql);
    return $result[0]['id'];
}

function GetAlias($userId)
{
    $sql = 'SELECT alias FROM usuarios WHERE id = "' . $userId . '"';
    $result = DataBasePetition($sql);
    $Alias = $result[0]['alias'];
    return $Alias;
}

function GetUserId($alias)
{
    $sql = 'SELECT id FROM usuarios WHERE alias = "' . $alias . '"';
    $result = DataBasePetition($sql);
    $id = $result[0]['id'];
    return $id;
}

function GetMovieId($name)
{
    $sql = 'SELECT id FROM peliculas WHERE titulo = "' . $name . '"';
    $result = DataBasePetition($sql);
    $id = $result[0]['id'];
    return $id;
}

function GetMovieRating($MovieId)
{
    $sql = 'SELECT puntuacion FROM peliculas WHERE id = "' . $MovieId . '"';
    $result = DataBasePetition($sql);
    return $result[0]['puntuacion'];
}

function UpdateMovieRating($average, $MovieId)
{
    $sql = 'UPDATE `peliculas` SET `puntuacion` = "' . $average . '" WHERE (`id` = "' . $MovieId . '");';
    DataBasePetition($sql);
}

function MakeGenderSelection()
{

    $movieGenderList = GetMovideGenderList();
    echo '<select name="genero"> ';
    for ($i = 0; $i < count($movieGenderList); $i++) {
        $value = $movieGenderList[$i];
        echo "<option name='" . $value . "'>" . $value . "</option>";
    }
    echo '</select>';
}

function GetMovideGenderList()
{
    $resultList = DataBasePetition('SELECT nombre FROM generos');
    $movieGenderList = array('Cualquiera');

    for ($i = 0; $i < count($resultList); $i++) {
        $movieGender = $resultList[$i]['nombre'];
        $gender = array($movieGender);
        $movieGenderList = array_merge($movieGenderList, $gender);
    }
    return $movieGenderList;
}

function GetAverageMovieRating($MovieId)
{
    $sql = 'SELECT AVG(puntuacion) FROM comentarios WHERE id_pelicula = "' . $MovieId . '" AND estado = "APROBADO"';
    $result = DataBasePetition($sql);
    $average = substr($result[0]['AVG(puntuacion)'], 0, 4);
    return $average;
}

function GetMovieGender($id)
{
    $sql = 'SELECT nombre FROM generos WHERE id= "' . $id . '"';
    $result = DataBasePetition($sql);
    return $result[0]['nombre'];
}
