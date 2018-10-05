<?php

namespace models;


class Account
{
    private $id;
    private $email;
    private $password;
    //private $token;

    function __construct($id,$email,$password){

        $this->id=$id;
        $this->email=$email;
        $this->password=$password;

    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }



    function getPassword(){
        return $this->password;
    }

    function getEmail(){
        return $this->email;
    }

    function setPassword($password){
        $this->password=$password;
    }

    function setEmail($email){
        $this->email=$email;
    }
}