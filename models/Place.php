<?php namespace models;


class Place
{
    private $id;
    private $name;
    private $address;
    private $city;

    function __construct($id,$name,$address,$city){

        $this->id=$id;
        $this->name=$name;
        $this->address=$address;
        $this->city=$city;

    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }

    function getAddress(){
        return $this->address;
    }

    function getName(){
        return $this->email;
    }

    function setAddress($address){
        $this->address=$address;
    }

    function setName($email){
        $this->email=$email;
    }

    function getCity(){
        return $this->city;
    }

    function setCity($city){
        $this->city=$city;
    }
}