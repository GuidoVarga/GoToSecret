<?php namespace models;

class Location{

	private $id;
	private $description;

	 function __construct($id,$description)
    {
        $this->id=$id;
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


}






 ?>