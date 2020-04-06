<?php


class RegisterController extends Controller
{
    public static function storeUser(){

        if(!empty($_POST)){
            if($_POST["name"] !== "" && $_POST["email"] !== "" && $_POST["password"] !== ""){

                $name =  $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];

                Database::query("INSERT INTO users (name, email, password)
                                VALUES ('$name','$email','$password')");

            }
        }

        redirect("/");

    }
}