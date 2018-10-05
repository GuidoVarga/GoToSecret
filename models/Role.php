<?php namespace models;

/*

include (ROOT.'config\config.php');
include (ROOT.'config\Autoload.php');

use config\config as config;
use config\Autoload as Autoload;



Autoload::start();

*/

class Role
{
    private $id;
    private $description;

    function __construct($id,$description){

        $this->id=$id;
        $this->description=$description;

    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id=$id;
    }


    function getdescription(){
        return $this->description;
    }


    function setdescription($description){
        $this->description=$description;
		}


}
