<?php

class Db
{
    private static function connect()
    {
        try {
            return new PDO("mysql:host=" . SERVERNAME . ";dbname=" . DATABASE, USERNAME, PASSWORD);
        } catch (PDOException $e) {

            die($e->getMessage());
        }
    }

    protected static function query(string $sql,?array $params = null, ?string $modelClass = null)
    {
        $stmt = self::connect()->prepare($sql);
        
        if($params){
            $stmt->execute($params);
        }else{
            $stmt->execute();
        }

        if($modelClass){
            $data = $stmt->fetchAll(PDO::FETCH_CLASS, ucfirst($modelClass));
        }else{
            $data = $stmt->fetchAll();
        }

        return $data;
    }
}
