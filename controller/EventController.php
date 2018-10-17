<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use dao\dbDao\EventDao as EventDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class EventController{

		private $eventDao;

		function __construct(){
			$this->eventDao=EventDao::getInstance();
		}


		public function index(){

			$result=$this->eventDao->getAll();
			var_dump($result);
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