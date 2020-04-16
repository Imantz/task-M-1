<?php


class UserController extends Controller
{

    public static function logIn()
    {
        $user = User::getUser($_POST);

        if(!$user){
            redirect("/");
        }

        $user->setSession($user->id);

        redirect("/home");
    }

    public static function logOut()
    {
        session_destroy();

        redirect("/");
    }

    public static function delete()
    {

        // $_POST is an array.
        // $_POST[0] to get array first item.
        //in array key is "custom_24"
        // everything after "custom_" is ID.
        // so "custom_24"  ID is ?? 24 ?

        $custom_id = substr(array_keys($_POST)[0], 7) ?? null;

        if($custom_id){

            Attribute::delete($custom_id);

        }
    }

    public static function update()
    {
        $request = $_POST;

        $user = User::getUserById($_SESSION["user_id"]);

        // have 2 type post requests to store in DB.
        //one is for user and other starts with substring "custom_"
        //check every value and insert into 2 different tables.

        foreach ($request as $key => $value){

            //If user have property in keylist then insert into user table.
            //else everything insert into attributes table.

            if(User::hasKey($key)){

                User::updateUser($key, $value, $user->id);

            }elseif(substr($key, 0, 7) === "custom_"){

                //define new keyword .  because request key string starts with substring "custom_"
                //example  "custom_pokemonCat2002" This will remove substr "custom_"
                //and insert into attributes table "pokemonCat2002"

                $keyWithoutCustom = substr($key, 7);

                //before insert check if have any attribute for this user with same key.
                //if find in DB then UPDATE value.
                //if can't find in DB then insert new entry into DB.

                $attribute = Attribute::getAttribute($keyWithoutCustom,$user->id);

                if($attribute){

                    Attribute::update($keyWithoutCustom,$value,$user->id);

                }else{

                    Attribute::create($keyWithoutCustom,$value,$user->id);

                }
            }
        }
    }

    public static function store()
    {
        User::create($_POST);

        return json_encode(["success"=>true]);
    }
}