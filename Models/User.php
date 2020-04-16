<?php

class User extends Models
{
    public  $name;
    private   $password;
    public  $email;
    public  $age;
    public  $number;
    public  $city;
    public  $country;
    public  $post_code;
    public  $job;

    //Convert to JSON and return JSON string
    //Add something more and JS side html automatically create new button for this.

    public function toJson():string
    {
        return json_encode([
            "name"=> $this->name,
            "password"=> $this->password,
            "email"=> $this->email,
            "age"=> $this->age,
            "city"=> $this->city,
            "country"=>$this->country,
            "number"=>$this->number,
            "post_code"=>$this->post_code,
            "job"=>$this->job,
        ]);
    }


    public static function keyList():array
    {
        //keylist to check if have in array this values. If have, then will put in different table
        //every new custom attribute.

        return ["name","password","email","age","city","country","number","post_code","job"];
    }

    public static function hasKey($key):bool
    {
        return in_array($key, self::keyList());
    }

    public function setSession($id)
    {
        $_SESSION['user_id'] = $id;
    }

    public static function create($request)
    {
        $sql = "INSERT INTO users (name,email,password) VALUES (?,?,?)";
        $params = array_values($request);

        Db::query($sql,$params);
    }

    public static function getUser($request)
    {
        $sql = "SELECT * FROM users WHERE (email,password) = (?,?)";
        $params= array_values($request);

        return Db::query($sql,$params, "User")[0];
    }

    public static function getUserById($id)
    {
        $sql = "SELECT * FROM users WHERE (id) = (?)";
        $params = [$id];

        return Db::query($sql,$params, "User")[0];
    }

    public static function updateUser($key, $value, $userId)
    {
        $sql = "UPDATE users SET $key=? WHERE id=?";
        $params = [$value,$userId];

        Db::query($sql,$params);
    }
}