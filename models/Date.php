<?php namespace models;

	class Date{

		private $id;
		private $date;
		private $artist;
		private $startHour;
		private $finishHour;
        private $dateCategory;

		function __construct($id,$date,$artist,$startHour,$finishHour,$dateCategory){

            $this->id=$id;
            $this->artist=$artist;
            $this->date=$date;
            $this->startHour=$startHour;
            $this->finishHour=$finishHour;
            $this->dateCategory=$dateCategory;

    	}

        function getId(){
             return $this->id;
        }

    	function getDate(){
    		return $this->date;
    	}


    	function setDate($date){
    		$this->date=$date;
    	}	

    	function getArtist(){
    		return $this->artist;
    	}


    	function setArtist($artist){
    		$this->artist=$artist;
    	}	

    	function getFinishHour(){
    		return $this->finishHour;
    	}


    	function setFinishHour($finishHour){
    		$this->finishHour=$finishHour;
    	}	

    	function getStartHour(){
    		return $this->startHour;
    	}


    	function setStartHour($startHour){
    		$this->startHour=$startHour;
    	}	


	}



?>