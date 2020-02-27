<?php
require_once '../../DataBase.php';
//Verificar usuario y contrasenia
//hacemos un session start
//Guardamos array de variables de consulta en $_SESSION
if (isset($_POST["User"]) and isset($_POST["Password"])) {
    $inputEmail = $_POST["User"];
    $inputPassword = $_POST["Password"];
    $sql = "SELECT * FROM usuarios WHERE email = '" . $inputEmail . "' AND password = '" . $inputPassword . "'";
    $account = DataBasePetition($sql);
    DeployAccountResult($account);
}

function DeployAccountResult($account)
{
    if ($account != null) {
        session_start();
        $alias = $account[0]['alias'];
        $email = $account[0]['email'];
        $esAdmin = $account[0]['es_administrador'] == 1;
        $loggedUser = array(
            "esAdmin" => $esAdmin,
            "alias" => $alias,
            "email" => $email,
        );
        $_SESSION["loggedUser"] = $loggedUser;
        echo "usuario logeado exitosamente";
    } else {
        echo 'email o contraseña incorrecto';
    }
}
