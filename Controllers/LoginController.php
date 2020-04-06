<?php


class LoginController extends Controller
{

    public static function logIn()
    {
        if ($_POST["email"] !== "" || $_POST["password"] !== "") {

            $email = $_POST["email"];

            $password = $_POST["password"];

            $user = Database::query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

            if($user){

                $_SESSION['user_id'] = $user[0]["id"];

                redirect("home");

            }else{

                redirect("/");
            }

        }else{

            redirect("/");
        }
    }
}
