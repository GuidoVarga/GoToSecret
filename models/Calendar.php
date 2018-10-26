<?php namespace models;

class Calendar{

	private $id;
	private $dates;

	function __construct ($id){
		$this->id = $id;
 		$this->dates= array(); 
	}


    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }

    function getDates(){
    	return $this->dates;
    }

    function addDate($date){
        array_push($this->dates,$date);
    }

    function getDateByIndex($index){
        return $this->dates[$index];
    }

    function getDateById($id){
        
        foreach ($this->dates as $date) {
            if($date->getId()==$id){
                return $date;
            }
        }
        return null;
    }

}

?>