<?php


class HomeController extends Controller
{
    //return index view

    public static function index(){
        view("index");
    }

    public static function welcome()
    {
        $session_id = $_SESSION["user_id"];

        if(!$session_id)
        {
            redirect("/");
        }

        $user = User::getUserById($session_id);
        $attributes = Attribute::getAllAttributesJson($user->id);

        view("home", [
            "user"=> $user,
            "attributes"=>$attributes
        ]);

    }
}