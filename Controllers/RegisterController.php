<?php


class RegisterController extends Controller
{
    public static function storeUser(){

        $name =  $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        //Register user. Insert User data into DB.

        if(!empty($_POST)){
            if($_POST["name"] !== "" && $_POST["email"] !== "" && $_POST["password"] !== ""){

                Database::query("INSERT INTO users (name, email, password)
                                VALUES ('$name','$email','$password')");
            }
        }

        //After register check if have new user with same name/email and password
        //and return json response. true or false.

       echo self::checkIfUserRegistered($name,$email,$password);

    }

    private static function checkIfUserRegistered($name,$email,$password){

        //After register check if have new user with same name/email and password
        //and return json response. true or false.

        $user = Database::query("SELECT * FROM users WHERE name='$name' AND email='$email' AND password='$password'");

        if($user){
            return json_encode(["success"=>true]);
        }else{
            return json_encode(["success"=>false]);
        }
    }
}