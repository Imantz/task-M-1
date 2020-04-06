<?php

class User
{
    private $name;
    private $password;
    private $email;
    private $age;
    private $number;
    private $city;
    private $country;
    private $post_code;
    private $job;

    //Convert to JSON and return JSON string
    //Add something more and JS side html automatically create new button for this.

    public function toJson():string
    {
        return json_encode([
            "name"=> $this->name,
            "password"=> $this->password,
            "email"=> $this->email,
            "age"=>$this->age,
            "city"=>$this->city,
            "country"=>$this->country,
            "number"=>$this->number,
            "post_code"=>$this->post_code,
            "job"=>$this->job,
        ]);
    }

    public function keyList():array
    {

        //keylist to check if have in array this values. If have, then will put in different table
        //every new custom attribute.

        return ["name","password","email","age","city","country","number","post_code","job"];
    }

}