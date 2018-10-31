<?php namespace models;

class Event
{
    private $id;
    private $name;
    private $description;
    private $img;
    private $eventCategory;
     private $calendar;
   
    function __construct($id,$name,$description,$eventCategory,$calendar)
    {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->eventCategory = $eventCategory;
        $this->calendar=$calendar;
       
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

    function setEventCategory($eventCategory){
        $this->eventCategory =$eventCategory;
    }

    function getEventCategory($eventCategory){
        return $this->eventCategory;
    }

  
    function addDate($date){
        $this->calendar->addDate($date);
    }

    function getDateByIndex($index){
        return $this->calendar->getDateByIndex($index);
    }

    function getDateById($id){
        return $this->calendar->getDateById($id);
    }

}