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

			$result=$this->eventDao->getAll();
			
			echo '<pre>';
			var_dump($result);
			echo '</pre>';
			
			

			$events=$this->eventDao->map($result);
			echo '<pre>';
			var_dump($events);
			echo '</pre>';
			
		
		}
		
		public function addEvent(){

				$event = new Event('id','nameeeee','d',null);

				$id = $this->eventDao->add($event);

				var_dump($id);
				
		}

		public function loadEvents(){

			
		}	










	}



?>