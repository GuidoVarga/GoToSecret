<?php namespace models;

class Location{

	private $id;
	private $name;
    private $totalQuantity;
    private $surplus;
    private $price;

	 function __construct($id,$name,$totalQuantity,$surplus,$price)
    {   
        $this->id=$id;
        $this->name=$name;
        $this->totalQuantity=$totalQuantity;
        $this->surplus=$surplus;
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

    function getSurplus(){
        return $this->surplus;
    }

     function setSurplus($surplus){
        $this->surplus=$surplus;
    }
    
    function getTotalQuantity(){
        return $this->totalQuantity;
    }

     function setTotalQuantity($totalQuantity){
        $this->totalQuantity=$totalQuantity;
    }

    function getSelledQuantity(){
        return $this->totalQuantity-$this->surplus;
    }

}






 ?>