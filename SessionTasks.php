<?php
function Greets()
{
    if (isset($_SESSION['loggedUser'])) {
        $user = $_SESSION['loggedUser']['alias'];
        echo '<h3 style="text-align:center;"> Bienvenido ' . $user . '</h3>';
    }
}

function ActualSessionIsAdmin()
{
    return isset($_SESSION['loggedUser']) and $_SESSION['loggedUser']['esAdmin'];
}
