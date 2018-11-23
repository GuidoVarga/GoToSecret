<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use dao\dbDao\EventDao as EventDao;
	use dao\Singleton as Singleton;
	use models\Event as Event;
	use models\Calendar as Calendar;
	use models\SubEvent as SubEvent;

	Autoload::start();

	class EventController{

		private $eventDao;

		function __construct(){
			$this->eventDao=EventDao::getInstance();
		}


		public function index(){

			session_start();
			//session_destroy();

			if(isset($_SESSION['user'])){

				$user=$_SESSION['user'];
			
			
			}else if(isset($_SESSION['admin'])){

				$user=$_SESSION['admin'][0];
			
			}

            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\events.php');
			include(ROOT . 'views\user\footer.php');
		}
		
	}



?>