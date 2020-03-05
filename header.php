<?php
require_once 'SessionTasks.php';

function Display_header($IndexUrl)
{
    echo '
    <header
    style="display:flex;
    flex-direction: column;
    align-items:center;
    margin:10px 0px;">
    <nav>
      <a style="text-decoration:none;" href="' . $IndexUrl . '">Volver a Inicio</a>
      </nav>';
    Greets();
    echo '</header>';
}
