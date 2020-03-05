<?php
function Clean_Title($title)
{
    $title = str_replace(":", "", $title);
    $title = str_replace("/", "", $title);
    $title = str_replace("*", "", $title);
    $title = str_replace("?", "", $title);
    $title = str_replace("<", "", $title);
    $title = str_replace(">", "", $title);
    $title = str_replace("|", "", $title);
    return $title;
}
