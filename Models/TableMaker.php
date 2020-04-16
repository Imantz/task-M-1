<?php

class TableMaker extends Models
{
    public static function createUsersTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        age VARCHAR(50),
        country VARCHAR(50),
        city VARCHAR(50),
        number VARCHAR(50),
        post_code VARCHAR(50),
        job VARCHAR(50))";

        Db::query($sql);
    }
    public static function createAttributeTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS attributes (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        attribute VARCHAR(50),
        value VARCHAR(50)
        )";

        Db::query($sql);
    }
}