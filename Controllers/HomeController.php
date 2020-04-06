<?php


class HomeController extends Controller
{

    public static function index()
    {

        if ( isset( $_SESSION['user_id'] ) ) {

            $user = Database::select("users","id","User");

            $attributes = json_encode(Database::selectAll("attributes","user_id"));

            view("home", ["user"=>$user,"attributes"=>$attributes]);

        } else {

            redirect("/");

        }

    }
}
