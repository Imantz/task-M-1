<?php


class LogoutController
{
    public static function logOut()
    {
        session_destroy();

        redirect("/");
    }
}