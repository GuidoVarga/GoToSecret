<?php namespace models;

class Calendar{

	private $id;
	private $fechas;

	function __construct ($id){
		$this->id = $id;
 		$this->fechas= array(); 
	}


    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }

    function getFechas(){
    	return $this->fechas;
    }

}





?>