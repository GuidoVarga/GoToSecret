<?php namespace models;

class Order
{
    private $id;
    private $date;
    private $orderLines;
   
    function __construct($id,$date)
    {
        $this->id=$id;
        $this->date=$date;
        $this->orderLines = array();
       
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }

    function setDate($date){
        $this->date=$date;
    }

    function getDate(){
        return $this->date;
    }
    function addOrderLine($orderLine){
        array_push($this->orderLines, $orderLine);
    }

    function setOrderLines($orderLines){
        $this->orderLines = $orderLines;
    }

    function getOrderLines(){
        return $this->orderLines;
    }

}
?>