<?php namespace models;

class OrderLine
{
    private $id;
    private $quantity;
    private $price;
    private $tickets;
   
    function __construct($id,$quantity,$price)
    {
        $this->id=$id;
        $this->quantity=$quantity;
        $this->price=$price;
        $this->tickets = array();
       
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }
    function setPrice($price){
        $this->price=$price;
    }

    function getPrice(){
        return $this->price;
    }

    function setQuantity($quantity){
        $this->quantity=$quantity;
    }

    function getQuantity(){
        return $this->quantity;
    }
  
    function addTickets($ticket){
        array_push($this->tickets, $ticket);
    }

    function setTickets($tickets){
        $this->tickets = $tickets;
    }

    function getTickets(){
        return $this->tickets;
    }

}