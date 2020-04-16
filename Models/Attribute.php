<?php


class Attribute extends Models
{

    public static function create(string $key, string $value,int $userId)
    {
        $sql = "INSERT INTO attributes (user_id, attribute, value) VALUES (?,?,?)";
        $params = [$userId,$key,$value];

        Db::query($sql,$params);

    }

    public static function getAttribute($key,$userId)
    {
        $sql = "SELECT * FROM attributes WHERE (user_id,attribute) = (?,?)";
        $params = [$userId,$key];

        return Db::query($sql,$params)[0];
    }

    public static function update($key, $value, $userId)
    {
        $sql = "UPDATE attributes SET value=(?) WHERE user_id=(?) AND attribute=(?)";
        $params = [$value,$userId,$key];

        Db::query($sql,$params);
    }

    public static function delete($attributeId)
    {
        $sql = "DELETE FROM attributes WHERE id=(?)";
        $params = [$attributeId];

        Db::query($sql,$params);

    }

    public static function getAllAttributesJson($userId)
    {
        $sql = "SELECT * FROM attributes WHERE (user_id) = (?)";
        $params = [$userId];

        return json_encode(Db::query($sql,$params));
    }
}