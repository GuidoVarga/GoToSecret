<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use dao\dbDao\EventDao as EventDao;

	Autoload::start();

	class HomeController{

		private $eventDao;

		function __construct(){
			$this->eventDao=EventDao::getInstance();
		}

		public function index(){

			session_start();

			if(isset($_SESSION['user'])){

				$user=$_SESSION['user'][0];
			
			
			}else if(isset($_SESSION['admin'])){

				$user=$_SESSION['admin'][0];
			
			}

            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\main_view.php');
			include(ROOT . 'views\user\footer.php');
		}

		public function loadPopularEvents(){}
	}



?>