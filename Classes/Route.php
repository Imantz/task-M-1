<?php


class Route
{
    public static $validRoutes = [];

    public static function set($route, $function){

        self::$validRoutes [] = $route;

        if($_SERVER["REQUEST_URI"] === $route){
            $function->__invoke();
        }
    }
}