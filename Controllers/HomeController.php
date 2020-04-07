<?php


class HomeController extends Controller
{

    public static function index()
    {

        //Yes I know. Would be nice to create middleware for this option to check if user ir auth or not.
        //and some kind session manager to check sessions. Session Errorrors and more..

        if ( isset( $_SESSION['user_id'] ) ) {

            $user = Database::select("users","id","User");

            $attributes = json_encode(Database::selectAll("attributes","user_id"));

            //pass user and attributes to home view.
            //where js take care about them..
            
            view("home", ["user"=>$user,"attributes"=>$attributes]);

        } else {

            redirect("/");

        }

    }
}
