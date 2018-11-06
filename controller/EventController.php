<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use dao\dbDao\EventDao as EventDao;
	use dao\Singleton as Singleton;
	use models\Event as Event;
	use models\Calendar as Calendar;
	use models\Date as Date;

	Autoload::start();

	class EventController{

		private $eventDao;

		function __construct(){
			$this->eventDao=EventDao::getInstance();
		}


		public function index(){

			$result=$this->eventDao->get(1);
			/*
			echo '<pre>';
			var_dump($result);
			echo '</pre>';
			*/
			
			$events=$this->eventDao->map2($result);
			echo '<pre>';
			var_dump($events);
			echo '</pre>';
			
		
		}

		public function addEvent(){

				$event = new Event('id','name','d','ec','p', new Calendar('id'));

				$event->addDate(new Date('id','dia','artist','19','21'));
				$event->addDate(new Date('id2','dia','artist','21','23'));

				$date = $event->getDateByIndex(0);
				echo '<pre>';
				var_dump($date);
				echo '</pre>';
		}

		public function getEvents(){

		
		}	










	}



?>