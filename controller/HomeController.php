<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;

	Autoload::start();


	class HomeController{

		public function __construct(){

		}

		public function index(){

			session_start();

			if(isset($_SESSION['user'])){

				$user=$_SESSION['user'][0];
			
			
			}else if(isset($_SESSION['admin'])){

				$user=$_SESSION['admin'][0];
			
			}

            include(ROOT . 'views\head.php');
			include(ROOT . 'views\header.php');
			include(ROOT . 'views\footer.php');
			
			
		
		}

		public function signOut(){
			session_start();
			session_destroy();
			header('Location: http://'.HOST_INTERNET.'/'.DIRECTORY.'/Home');
		}
	}



?>