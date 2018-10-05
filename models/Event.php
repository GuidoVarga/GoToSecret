<?php namespace models;

include(ROOT . 'config\Config.php');
include(ROOT . 'config\Autoload.php');

use Config\Config as Config;
use Config\Autoload as Autoload;
Autoload::start();

class Event
{
    private $id;
    private $name;
    private $description;
    private $img;
    private $eventCategory;
    private $place;
    private $calendar;

    function __construct($id,$name,$description,$img,$eventCategory,$place,$calendar)
    {
        $this->id=$id;
        $this->name=$name;
        $this->description=$description;
        $this->img = $img;
        $this->eventCategory = $eventCategory;
        $this->place= $place;
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

    function getPlace($place){
        return $this->place;
    }

    function setPlace($place){
        $this->place=$place;
    }
}