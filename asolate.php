<?php
session_start();
echo 'mira: ';
//echo $_SESSION['loggedUser']['alias'];
echo print_r($_SESSION["MovieId"]["id"]);
