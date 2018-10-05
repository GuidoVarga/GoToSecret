<?php
/**
 * Created by PhpStorm.
 * User: Fran
 * Date: 2/10/2018
 * Time: 13:34
 */

namespace models;


class User
{
    private $id;
    private $name;
    private $lastName;
    private $account;

    function __construct( $id,$name,$lastName,$account)
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->account = $account;
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }
    function setName($name){
        $this->name = $name;
    }
    function getName(){
        return $this->name;
    }

    function setLastName($lastName){
        $this->lastName = $lastName;
    }

    function getLastName(){
        return $this->lastName;
    }

}