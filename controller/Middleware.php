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
			$user=$_SESSION['user'];
			if(!isset($user)){

				header('location: http://'.HOST.'/'.DIRECTORY.'/Login');
			}else if($user->getRole()!='admin'){
				header('location: http://'.HOST.'/'.DIRECTORY.'/Home');
			}	

		}

		public function checkUser(){

			session_start();
			$user=$_SESSION['user'];
			if(!isset($user)){

				header('location: http://'.HOST.'/'.DIRECTORY.'/Login');
			}else if($user->getRole()!='user'){
				header('location: http://'.HOST.'/'.DIRECTORY.'/Admin');
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

			$user=$_SESSION['user'];
			if(isset($user)){

				header('location: http://'.HOST.'/'.DIRECTORY.'/Home');
			}

		}
		

	 }

?>