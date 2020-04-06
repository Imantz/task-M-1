<?php

session_start();

require_once("functions.php");
require_once("Routes.php");

function __autoload($somethingToAutoload) {
    if(file_exists('./Classes/'.$somethingToAutoload.'.php')){
        require_once './Classes/'.$somethingToAutoload.'.php';
    }elseif (file_exists('./Controllers/'.$somethingToAutoload.'.php')){
        require_once './Controllers/'.$somethingToAutoload.'.php';
    }elseif(file_exists('./Models/'.$somethingToAutoload.'.php')){
        require_once './Models/'.$somethingToAutoload.'.php';
    }
}

Database::createUserTable();
Database::createAttributeTable();





?>


