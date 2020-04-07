<?php


class DeleteController
{
    public static function delete()
    {

        // $_POST is an array.
        // $_POST[0] to get array first item.
        //in array key is "custom_24"
        // everything after "custom_" is ID.
        // so "custom_24"  ID is ?? 24 ?

        $custom_id = substr(array_keys($_POST)[0], 7) ?? null;

        if($custom_id){

            Database::query("DELETE FROM attributes WHERE id=$custom_id");

        }
    }
}