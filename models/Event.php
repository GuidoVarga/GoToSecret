<?php namespace models;

class Event
{
    private $id;
    private $name;
    private $description;
    private $img;
    private $eventCategory;
    private $place;
    private $calendar;
    private $locations;

    function __construct($id,$name,$description,$eventCategory,$place,$calendar)
    {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->eventCategory = $eventCategory;
        $this->place= $place;
        $this->calendar=$calendar;
        $this->locations=array();
       
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

    function getPlace($place){
        return $this->place;
    }

    function setPlace($place){
        $this->place=$place;
    }

    function addLocation($location){
       array_push($this->locations,$location);
    }

    function getLocation($index){

        return $this->locations[$index];
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