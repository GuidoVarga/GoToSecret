<?php namespace models;

class EventCategory
{

	private $id;
	private $name;
    private $soldQuantity;


	 function __construct($id,$name)
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
    function setSoldQuantity($soldQuantity){
        $this->soldQuantity=$soldQuantity;
    }

    function getSoldQuantity(){
        return $this->soldQuantity;
    }
}


 ?>