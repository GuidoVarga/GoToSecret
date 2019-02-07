<?php namespace models;

class OrderLine
{
    private $id;
    private $quantity;
    private $price;
    private $ticket;
    private $schedule;
    private $location;
    private $event;
   
    function __construct($id,$quantity,$price,$schedule,$location,$event)
    {
        $this->id=$id;
        $this->quantity=$quantity;
        $this->schedule=$schedule;
        $this->location=$location;
        $this->event=$event;
        $this->ticket = null;
       
        if($price){
             $this->price=$price;
        }else{
             $this->price=$quantity*$location->getPrice();
        }

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
  

    function setTicket($ticket){
        $this->ticket = $ticket;
    }

    function getTicket(){
        return $this->ticket;
    }

    function setEvent($event){
        $this->event=$event;
    }

    function getEvent(){
        return $this->event;
    }

    function setSchedule($schedule){
        $this->schedule=$schedule;
    }

    function getSchedule(){
        return $this->schedule;
    }

    function setLocation($location){
        $this->location=$location;
    }

    function getLocation(){
        return $this->location;
    }
}