<?php namespace models;

class SubEvent{

	private $id;
	private $artist;
	private $startHour;
	private $finishHour;


	function __construct($id,$artist,$startHour,$finishHour){

		$this->id=$id;
		$this->artist=$artist;
		$this->startHour=$startHour;
		$this->finishHour=$finishHour;
	}

	function getId(){
		return $this->id;
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