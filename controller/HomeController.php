<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use dao\dbDao\EventDao as EventDao;
	use models\Event as Event;

	Autoload::start();

	class HomeController{

		private $eventDao;
		

		function __construct(){
			$this->eventDao=EventDao::getInstance();
		}

		public function index(){

			session_start();
	
			isset($_SESSION['user']) ? $user = $_SESSION['user']: null;
			$events=$this->loadPopularEvents();

            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\main_view.php');
			include(ROOT . 'views\user\footer.php');
		}

		public function loadPopularEvents(){

			return $this->eventDao->getAllWithLimit(8);
		}

		public function signOut(){
			session_start();
			session_destroy();
			header('Location: http://'.HOST.'/GoToSecret/Home');
		}
	}



?>