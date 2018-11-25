<?php namespace models;

class Artist
{
    private $id;
    private $name;
    private $description;
 

    function __construct($id,$name,$description)
    {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
      
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

    function toJson(){
        $json=json_encode(array('id' => $this->getId(), 'name' => $this->getName()));

        return str_replace('"', "'", $json);
    }


}