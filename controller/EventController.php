<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use dao\dbDao\EventDao as EventDao;
	use dao\Singleton as Singleton;
	use models\Event as Event;

	Autoload::start();

	class EventController{

		private $eventDao;

		function __construct(){
			$this->eventDao=EventDao::getInstance();
		}


		public function index(){

			$result=$this->eventDao->getAll();
			echo '<pre>';
				//var_dump($result);
				echo '</pre>';


				$events=$this->eventDao->map2($result);
			
			var_dump($events[0]);
			var_dump($events[1]);


		}

		public function addEvent(){

	
		}

		public function getEvents(){

			$result=$this->eventDao->getAll();
			$events=$this->eventDao->map($result);
			var_dump($events);
		}	










	}



?>