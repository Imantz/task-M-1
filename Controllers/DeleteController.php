<?php


class DeleteController
{
    public static function delete()
    {
        $custom_id = substr(array_keys($_POST)[0], 7) ?? null;

        if($custom_id){

            Database::query("DELETE FROM attributes WHERE id=$custom_id");

        }
    }
}