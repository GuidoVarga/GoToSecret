<?php namespace models;

include(ROOT . 'config\Config.php');
include(ROOT . 'config\Autoload.php');

use Config\Config as Config;
use Config\Autoload as Autoload;
Autoload::start();

class Artist
{
    private $id;
    private $name;
    private $description;
    private $img;

    function __construct($id,$name,$description,$img)
    {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->img = $img;
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }
    function setDescription($description){
        $this->description=$description;
    }

    function getDescription(){
        return $this->description;
    }
    
    function setName($name){
        $this->name = $name;
    }
    function getName(){
        return $this->name;
    }

    function setImg($img){
        $this->img = $img;
    }

    function getImg(){
        return $this->img;
    }

}