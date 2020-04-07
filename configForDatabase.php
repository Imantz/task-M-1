<?php

/*
 *
 * Open Terminal. Type credentials for mysql
 * mysql -u yourUserName -p
 * Enter password.
 * Type "CREATE DATABASE poketable"
 * Enter
 * now type semicolon ";"
 * Enter
 * type "USE poketable"
 *
 *
 * Type mysql credentials there:
 */

define('SERVERNAME',   "localhost");
define('DATABASE',   "poketable");
define('USERNAME',   "imant");
define('PASSWORD',   "asdqwe123");

//Tables will create automatic if connection is ok..
//if tables is not created - refresh page.
//if have error. check console. Error msg will be logged in console for better readability.
/*
 * echo '<script>';
 * echo 'console.log('. json_encode( $e->getMEssage() ) .')';
 * echo '</script>';
 *
 * */