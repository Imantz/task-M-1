<?php

function view(string $path, array $vars = [])
{
    extract($vars);

    include('./Views/' . $path . '.php');
}

function redirect(string $location)
{
    header('Location: ' . $location);
    exit;
}

