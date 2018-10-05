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

}





?>