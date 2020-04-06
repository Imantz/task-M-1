<?php


class UpdateTablesController
{
    public static function update()
    {
        $user = Database::select("users","id","User");

        foreach ($_POST as $key => $value){

            if(in_array($key, $user->keyList())){

                Database::query("UPDATE users SET $key = '$value' WHERE id=" . $user->id);

            }elseif(substr($key, 0, 7) === "custom_"){

                $keyWithoutCustom = substr($key, 7);

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
