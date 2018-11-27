<?php namespace controller;

require_once(ROOT.'config\Autoload.php');

	//require_once(ROOT.'Dao\Singleton.php');

use config\Autoload as Autoload;
use config\Request as Request;
use models\Artist as Artist;
use dao\dbDao\ArtistDao as ArtistDao;
use dao\Singleton as Singleton;

Autoload::start();

class Middleware extends Singleton{


	public function checkAdmin(){
		session_start();

		var_dump($_SESSION['user']);

		if(isset($_SESSION['user']) ){

			if(is_array($_SESSION['user']))
				$user=$_SESSION['user'][0];
			else
					$user=$_SESSION['user'];

			if(!isset($user)){

				header('location: http://'.HOST.'/'.DIRECTORY.'/Login');
			}else if($user->getAccount()->getRole()->getDescription()!='admin'){
				header('location: http://'.HOST.'/'.DIRECTORY.'/Home');
			}	
		}
		header('location: http://'.HOST.'/'.DIRECTORY.'/Login');
	}

	public function checkUser(){

		session_start();
		if(isset($_SESSION['user'])){
			if(is_array($_SESSION['user']))
				$user=$_SESSION['user'][0];
			else
					$user=$_SESSION['user'];
				
			if(!isset($user)){

				header('location: http://'.HOST.'/'.DIRECTORY.'/Login');
			}else if($user->getAccount()->getRole()->getDescription()!='user'){
				header('location: http://'.HOST.'/'.DIRECTORY.'/Admin');
			}	
			header('location: http://'.HOST.'/'.DIRECTORY.'/Login');
		}
	}

	public function checkUserOrAdmin(){

		session_start();

		$user=$_SESSION['user'];
		if(!isset($user)){

			header('location: http://'.HOST.'/'.DIRECTORY.'/Login');
		}else {
			header('location: http://'.HOST.'/'.DIRECTORY.'/Home');
		}

	}

	public function checkNotLogged(){

		session_start();
		if(isset($_SESSION['user'])){

			header('location: http://'.HOST.'/'.DIRECTORY.'/Home');
		}
		

	}


}

?>