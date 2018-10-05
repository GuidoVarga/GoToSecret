<?php namespace models;

class EventCategory
{

	private $id;
	private $name;


	 function __construct( $id,$name)
    {
        $this->id = $id;
        $this->name = $name;
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
}


 ?>