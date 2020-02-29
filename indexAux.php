<?php
require 'DataBase.php';

if (isset($_POST['MovieNro']) and isset($_POST['Genero'])) {
    $MovieNro = $_POST['MovieNro'];
    $Gender = $_POST['Genero'];
    $Letters = Determine_Search_Variable();
    DisplayCardMovies($MovieNro, 5, $Gender, $Letters);
    $_POST['MovieNro'] = null;
    $_POST['Genero'] = null;
}

if (isset($_POST['MovieName'])) {
    $movieName = $_POST['MovieName'];
    $sql = "SELECT id FROM peliculas WHERE titulo = '" . $movieName . "'";
    $result = DataBasePetition($sql);
    $id = intval($result[0]['id']);
    $GLOBALS['MovieId'] = $id;
    $_POST['MovieName'] = null;
    echo '.';
}

function Determine_Search_Variable()
{
    if (isset($_POST['Search'])) {
        return $_POST['Search'];
    } else {
        return null;
    }
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

function Get_Partial_Movie_Info($startRow, $Amount, $gender, $Letters)
{
    if ($Letters == null) {
        $Letters = '';
    }
    if ($gender != "Cualquiera") {
        $Gender_ID = Get_ID_Of_Gender($gender);
        $sql = "SELECT titulo,id_genero,puntuacion FROM peliculas WHERE id_genero = " . $Gender_ID . " AND titulo LIKE '%" . $Letters . "%' ORDER BY fecha_lanzamiento DESC LIMIT " . $startRow . "," . $Amount;
    } else {
        $sql = "SELECT titulo,id_genero,puntuacion FROM peliculas WHERE titulo LIKE '%" . $Letters . "%' ORDER BY fecha_lanzamiento DESC LIMIT " . $startRow . "," . $Amount;
    }
    $resultList = DataBasePetition($sql);
    return $resultList;
}

//html
function DisplayCardMovies($startRow, $Amount, $gender, $Letters)
{
    $movies = Get_Partial_Movie_Info($startRow, $Amount, $gender, $Letters);
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

function MakeUserLogging()
{
    if (isset($_SESSION["loggedUser"])) {
        $alias = $_SESSION["loggedUser"]["alias"];
        echo '<div class="centrar marginLeft">
        <p > Bienvenido ' . $alias . '</p>
        <button id="Salir"> Salir </button>
        </div>';
    } else {
        echo '
        <div id="flujoUsuario">
        <a href="usuario\login\login.php">Ingresar</a>
        <a href="usuario/register/registro.php">Registro</a>
      </div>
      ';
    }
}
