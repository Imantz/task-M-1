<?php

require_once("./configForDatabase.php");

class Database
{
    public static function connect()
    {

        try {
            return new PDO("mysql:host=".SERVERNAME.";dbname=".DATABASE, USERNAME, PASSWORD);
        } catch (PDOException $e){

            //For better readability

            echo '<script>';
            echo 'console.log('. json_encode( $e->getMEssage() ) .')';
            echo '</script>';

            die($e->getMessage());
        }
    }

    public static function query($query) {
        $statement = self::connect()->prepare($query);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }

    public static function select(string $table,string $id_or_user_id, string $object)
    {
        $statement = self::connect()->prepare("SELECT * FROM " . $table . " WHERE ". $id_or_user_id ."=". $_SESSION['user_id']);
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_CLASS, $object);
        return $data[0];
    }

    public static function selectAll(string $table,string $id_or_user_id)
    {
        $statement = self::connect()->prepare("SELECT * FROM " . $table . " WHERE ". $id_or_user_id ."=". $_SESSION['user_id']);
        $statement->execute();
        $data = $statement->fetchAll();
        return $data;
    }

    public static function createAttributeTable()
    {
        $sql = "CREATE TABLE IF NOT EXISTS attributes (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        attribute VARCHAR(50),
        value VARCHAR(50)
        )";

        $statement = self::connect()->prepare($sql);
        $statement->execute();
    }

    public static function createUserTable()
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
        job VARCHAR(50)
        
        )";

        $statement = self::connect()->prepare($sql);
        $statement->execute();
    }


}