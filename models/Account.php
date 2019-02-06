<?php namespace models;

class Account
{
    private $id;
    private $email;
    private $password;
    private $fbToken;
    private $orders;
    private $role;

    function __construct($id,$email,$password,$token,$role){

        $this->id=$id;
        $this->email=$email;
        $this->password=$password;
        $this->fbToken=$token;
        $this->role=$role;
        $this->orders = array();
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }

    function getFbToken(){
        return $this->fbToken;
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

    function getOrders(){
        return $this->orders;
    }

     function setOrders($orders){
        $this->orders=$orders;
    }

    function getRole(){
        return $this->role;
    }

}