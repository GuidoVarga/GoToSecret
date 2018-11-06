<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use dao\dbDao\PlaceDao as PlaceDao;

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
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\main_view.php');
			include(ROOT . 'views\user\footer.php');
			
			
		
		}

		public function signOut(){
			session_start();
			session_destroy();
			header('Location: http://'.HOST_INTERNET.'/'.DIRECTORY.'/Home');
		}


		public function getPlaces(){

			$dao = PlaceDao::getInstance();

			var_dump($dao);

			$result = $dao->getAll();
			echo '<pre>';
			var_dump($result);
			echo '</pre>';
			
			$places=$dao->map($result);
			echo '<pre>';
			var_dump($places);
			echo '</pre>';
		}


	}



?>