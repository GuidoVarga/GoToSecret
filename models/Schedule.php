<?php namespace models;

class Schedule{

	private $id;
    private $day;
	private $subEvents;
    private $place;
    private $locations;

	function __construct ($id, $day, $place){
		$this->id = $id;
        $this->day = $day;
 		$this->subEvents = array(); 
        $this->place=$place;
        $this->locations=array();
	}

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getDay(){
        return $this->day;
    }

    function setDay($day){
        $this->day = $day;
    }

    function getSubEvents(){
    	return $this->subEvents;
    }

     function setSubEvents($subEvents){
        $this->subEvents=$subEvents;
    }

    function addSubEvent($subEvent){
        array_push($this->subEvents,$subEvent);
    }

    function getSubEventByIndex($index){
        return $this->subEvents[$index];
    }

    function getSubEventById($id){
        
        foreach ($this->subEvents as $subEvent) {
            if($subEvent->getId()==$id){
                return $subEvent;
            }
        }
        return null;
    }

    function getPlace(){
        return $this->place;
    }

    function setPlace($place){
        $this->place=$place;
    }   

    function addLocation($location){
        array_push($this->locations,$location);
    }

    function getLocations(){

        return $this->locations;
    }

    function setLocations($locations){

        $this->locations = $locations;
    }

    function getFormattedDay(){



    }
}


?>