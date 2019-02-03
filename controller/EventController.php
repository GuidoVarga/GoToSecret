<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use dao\dbDao\EventDao as EventDao;
	use dao\dbDao\EventCategoryDao as EventCategoryDao;
	use dao\Singleton as Singleton;
	use models\Event as Event;

	Autoload::start();

	class EventController{

		private $eventDao;
		private $categoriesEventDao;
		function __construct(){
			$this->eventDao=EventDao::getInstance();
			$this->eventCategoryDao=EventCategoryDao::getInstance();
		}


		public function index(){

			session_start();
			//session_destroy();
			$events = $this->eventDao->getAll();
			$categories = $this->eventCategoryDao->getAll();

			isset($_SESSION['user']) ? $user = $_SESSION['user']:null;

            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\events.php');
			include(ROOT . 'views\user\footer.php');
		}
		
	}



?>