<?php
require_once '../../DataBase.php';

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
        $userId = $account[0]['id'];
        $loggedUser = array(
            "esAdmin" => $esAdmin,
            "alias" => $alias,
            "email" => $email,
            "id" => $userId,
        );
        $_SESSION["loggedUser"] = $loggedUser;
        echo "usuario logeado exitosamente";
    }
}
