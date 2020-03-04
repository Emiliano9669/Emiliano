<?php
function Greets()
{
    if (isset($_SESSION['loggedUser'])) {
        $user = $_SESSION['loggedUser']['alias'];
        echo '<p style="text-align:center;"> Bienvenido: ' . $user . '</p>';
    }
}

function ActualSessionIsAdmin()
{
    return isset($_SESSION['loggedUser']) and $_SESSION['loggedUser']['esAdmin'];
}
