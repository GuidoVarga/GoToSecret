<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\Schedule as Schedule;
	use models\Location as Location;
	use models\SubEvent as SubEvent;
	use models\Artist as Artist;
	use models\Place as Place;
	use dao\dbDao\ArtistDao as ArtistDao;
	use dao\dbDao\LocationDao as LocationDao;
	use dao\dbDao\PlaceDao as PlaceDao;
	use dao\dbDao\SubEventDao as SubEventDao;
	use dao\dbDao\ScheduleDao as ScheduleDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class AdminScheduleController{

		private $placeDao;
		private $locationDao;
		private $artistDao;
		private $subEventDao;
		private $scheduleDao;

		function __construct(){
			$this->placeDao=PlaceDao::getInstance();
			$this->locationDao=LocationDao::getInstance();
			$this->artistDao=ArtistDao::getInstance();
			$this->scheduleDao=ScheduleDao::getInstance();
			$this->subEventDao= SubEventDao::getInstance();
		}


		public function index(){


			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\date\date_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
		}

		public function addView(){

			$places = $this->getPlaces();
			$artists = $this->getArtists();
			$locations = $this->getLocations();
			$j=$artists[0]->toJson();
			var_dump($j);

			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\date\date_add.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function editView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\date\date_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function add(){}

		public function edit(){}

		public function delete(){}

		public function getArtists(){
			return $this->artistDao->getAll();
		}

		public function getPlaces(){
			return $this->placeDao->getAll();
		}

		public function getLocations(){
			return $this->locationDao->getAll();
		}


		public function save(){

			//str_replace('"', "'", $locations);
			$day = $_POST['date'];
			$placeId = $_POST['place_id'];

			$locationsArray = $_POST['locations'];
			$locations=array();
			foreach ($locationsArray as $l) {
				$location = new Location($l['id'],null,$l['quantity'],$l['price'],$l['quantity']);
				array_push($locations, $location);
			}

			
			$subEventsArray = $_POST['subEvents'];
			$subEvents=array();
			foreach ($subEventsArray as $s) {
				$subEvent = new SubEvent(0,new Artist($s['artist_id'],null,null),$s['start_hour'],$s['finish_hour']);
				array_push($subEvents, $subEvent);
			}

		
			$schedule = new Schedule(0,$day, new Place($placeId,null,null,null));

			//$schedule->setLocations($locations);
			//$schedule->setSubEvents($subEvents);
		

			$scheduleId=$this->scheduleDao->save($schedule,1);
			
			foreach ($subEvents as $subEvent) {
				$this->subEventDao->save($subEvent,$scheduleId);
			}
			
			foreach ($locations as $location) {
				$this->locationDao->addLocationSchedule($location,$scheduleId);
			}

		}


	}



?>