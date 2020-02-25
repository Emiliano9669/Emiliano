<?php

if (isset($_POST['MovieNro']) and isset($_POST['Genero'])) {
    $MovieNro = $_POST['MovieNro'];
    $Gender = $_POST['Genero'];
    DisplayCardMovies($MovieNro, 5, $Gender);
    $_POST['MovieNro'] = null;
    $_POST['Genero'] = null;
}

function CreateMovieCard($titulo, $genero, $puntuacion)
{
    echo "<div class='pelicula'>
        <h2>$titulo</h2>
        <img src='#' alt='poster' />
        <p>Genero: $genero </p>
        <p>Puntuacion $puntuacion/5</p>
      </div>";
}

function Get_Partial_Movie_Info($startRow, $Amount, $gender)
{
    if ($gender != "Cualquiera") {
        $Gender_ID = Get_ID_Of_Gender($gender);
        $sql = 'SELECT titulo,id_genero,puntuacion FROM peliculas WHERE id_genero = ' . $Gender_ID . ' ORDER BY fecha_lanzamiento DESC LIMIT ' . $startRow . ',' . $Amount;
    } else {
        $sql = 'SELECT titulo,id_genero,puntuacion FROM peliculas ORDER BY fecha_lanzamiento DESC LIMIT ' . $startRow . ',' . $Amount;
    }
    $resultList = DataBasePetition($sql);
    return $resultList;
}

//html
function DisplayCardMovies($startRow, $Amount, $gender)
{
    $movies = Get_Partial_Movie_Info($startRow, $Amount, $gender);
    for ($i = 0; $i < count($movies); $i++) {
        $movie = $movies[$i];
        $title = $movie['titulo'];
        $gender = $movie['id_genero'];
        $punctuation = $movie['puntuacion'];
        CreateMovieCard($title, $gender, $punctuation);
    }
}
//html
function MakeGenderSelection()
{
    $resultList = DataBasePetition('SELECT nombre FROM generos');
    $movieGenderList = array('Cualquiera');

    for ($i = 0; $i < count($resultList); $i++) {
        $movieGender = $resultList[$i]['nombre'];
        $gender = array($movieGender);
        $movieGenderList = array_merge($movieGenderList, $gender);
    }
    //movieGenderList ready
    echo '<select> ';
    for ($i = 0; $i < count($movieGenderList); $i++) {
        $value = $movieGenderList[$i];
        echo "<option value='" . $value . "'>" . $value . "</option>";
    }
    echo '</select>';
}

function Get_ID_Of_Gender($gender)
{
    $sql = "SELECT * FROM generos WHERE nombre= '" . $gender . "'";
    $resultado = DataBasePetition($sql);
    if ($resultado != null) {
        return $resultado[0]['id'];
    } else {
        echo '<p> No existen peliculas para ese genero </p>';
    }
}

function DataBasePetition($sql)
{
    $connectionDB = new PDO('mysql:host=localhost; dbname=cine', 'root', '1032');
    $resultado = $connectionDB->query($sql);
    if ($resultado) {
        $retorno = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $connectionDB = null;
        return $retorno;
    } else {
        echo 'La linea de sql no trajo nada de la base de datos! ' . $resultado;
    }
}

function BaseDatos()
{
    $connectionDB = new PDO('mysql:host=localhost; dbname=cine', 'root', '1032');
    $sql = "SELECT nombre FROM generos ORDER BY nombre";
    $resultado = $connectionDB->query($sql);
    $generos = $resultado->fetchAll(PDO::FETCH_ASSOC);
    echo $generos[1]['nombre'];
    $connectionDB = null;
}
