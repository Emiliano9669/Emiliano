<?php

function DataBasePetition($sql)
{
    $connectionDB = new PDO('mysql:host=localhost; dbname=cine', 'root', '1032');
    $resultado = $connectionDB->query($sql);
    if ($resultado) {
        $retorno = $resultado->fetchAll(PDO::FETCH_ASSOC);
        $connectionDB = null;
        return $retorno;
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
