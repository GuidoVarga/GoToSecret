<?php namespace models;

class Ticket{

	private $id;
	private $number;
	private $qr;

	function __construct($id,$number,$qr)
    {
        $this->id=$id;
        $this->number=$number;
        $this->qr = $qr;

    }

    unction getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }

    function setNumber($number){
        $this->number = $number;
    }

    function getNumber(){
        return $this->number;
    }

     function setQr($qr){
        $this->qr = $qr;
    }
    
    function getQr(){
        return $this->qr;
    }

}



?>