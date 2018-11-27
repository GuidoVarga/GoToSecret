<?php namespace models;

class Artist
{
    private $id;
    private $name;
    private $img;
    private $description;
 

    function __construct($id,$name,$img,$description)
    {
        $this->id=$id;
        $this->name=$name;
        $this->img=$img;
        $this->description=$description;
      
    }



    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }


    function getImg(){
        return $this->img;
    }

    function setImg($img){
        $this->img=$img;
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

    function toJson(){
        $json=json_encode(array('id' => $this->getId(), 'name' => $this->getName()));

        return str_replace('"', "'", $json);
    }


}