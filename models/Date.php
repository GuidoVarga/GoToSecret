<?php namespace models;

	class Date{

		private $id;
		private $date;
		private $artist;
		private $startHour;
		private $finishHour;
        private $place;
        private $locations;

   
		function __construct($id,$date,$artist,$startHour,$finishHour,$place){

            $this->id=$id;
            $this->artist=$artist;
            $this->date=$date;
            $this->startHour=$startHour;
            $this->finishHour=$finishHour;
            $this->place=$place;
            $this->locations=array();
      
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


	}



?>