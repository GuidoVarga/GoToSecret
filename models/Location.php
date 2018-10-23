<?php namespace models;

class Location{

	private $id;
	private $name;
    private $totalQuantity;
    private $remanent;
    private $price;

	 function __construct($id,$name,$totalQuantity,$remanent,$price)
    {   
        $this->id=$id;
        $this->name=$name;
        $this->totalQuantity=$totalQuantity;
        $this->remanent=$remanent;
        $this->price=$price;
    }

     function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }
    function setName($name){
        $this->name=$name;
    }

    function getName(){
        return $this->name;
    }


    function getPrice(){
        return $this->price;
    }

     function setPrice($price){
        $this->price=$price;
    }



}






 ?>