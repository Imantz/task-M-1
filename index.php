<?php

session_start();

require_once("functions.php");
require_once("Routes.php");

//autoload...

function __autoload($somethingToAutoload) {

    //Load Classes

    if(file_exists('./Classes/'.$somethingToAutoload.'.php')){

        require_once './Classes/'.$somethingToAutoload.'.php';

        //Load Controllers

    }elseif (file_exists('./Controllers/'.$somethingToAutoload.'.php')){

        require_once './Controllers/'.$somethingToAutoload.'.php';

        //Load Models

    }elseif(file_exists('./Models/'.$somethingToAutoload.'.php')){

        require_once './Models/'.$somethingToAutoload.'.php';
    }
}


//Create UserTable and attribute table

Database::createUserTable();
Database::createAttributeTable();





?>


