<?php
require_once '../../DataBase.php';

if (isset($_POST['Email']) and isset($_POST['Alias']) and isset($_POST['Password'])) {
    $email = $_POST['Email'];
    $alias = $_POST['Alias'];
    $password = $_POST['Password'];
    $result = DataBasePetition('SELECT COUNT(*) FROM usuarios');
    $id = intval($result[0]['COUNT(*)']) + 1;
    $isAdmin = '0';
    RegisterUser($email, $alias, $password, $id, $isAdmin);
}

function RegisterUser($email, $alias, $password, $id, $isAdmin)
{
    $result = CheckEmail($email);
    if ($result != null) {
        return;
    }
    $result = CheckAlias($alias);
    if ($result != null) {
        return;
    }

    $sql = "INSERT INTO `cine`.`usuarios` (`id`, `email`, `alias`, `password`, `es_administrador`) VALUES ('" . $id . "', '" . $email . "', '" . $alias . "', '" . $password . "', '" . $isAdmin . "');";
    $result = DataBasePetition($sql);
    echo 'Usuario registrado con éxito!';
}

function CheckEmail($email)
{
    $sql = "SELECT * FROM usuarios WHERE email = '" . $email . "'";
    $result = DataBasePetition($sql);
    if ($result != null) {
        echo '-Email ya existente-';
    }
    return $result;
}

function CheckAlias($alias)
{
    $sql = "SELECT * FROM usuarios WHERE alias = '" . $alias . "'";
    $result = DataBasePetition($sql);
    if ($result != null) {
        echo '-Alias ya existente-';
    }
    return $result;
}
