<?php


class UpdateTablesController
{
    public static function update()
    {

        $user = Database::select("users","id","User");

        // have 2 type post requests to store in DB.
        //one is for user and other starts with substring "custom_"
        //check every value and insert into 2 different tables.

        foreach ($_POST as $key => $value){

            //If user have property in keylist then insert into user table.
            //else everything insert into attributes table.

            if(in_array($key, $user->keyList())){

                Database::query("UPDATE users SET $key = '$value' WHERE id=" . $user->id);

            }elseif(substr($key, 0, 7) === "custom_"){

                //define new keyword .  because "$_POST" key string starts with substring "custom_"
                //example  "custom_pokemonCat2002" This will remove substr "custom_"
                //and insert into attributes table "pokemonCat2002"

                $keyWithoutCustom = substr($key, 7);

                //before insert check if have any attribute for this user with same key.
                //if find in DB then UPDATE value.
                //if can't find in DB then insert new entry into DB.

                $attributes = Database::query("SELECT * FROM attributes WHERE user_id = $user->id AND attribute = '$keyWithoutCustom'");

                if($attributes){

                    Database::query("UPDATE attributes SET value = '$value' WHERE user_id = $user->id AND attribute = '$keyWithoutCustom'");

                }else{

                    Database::query("INSERT INTO attributes (user_id, attribute, value)
                                VALUES ('$user->id', '$keyWithoutCustom','$value')");
                }
            }
        }

        redirect("/home");
    }
}
