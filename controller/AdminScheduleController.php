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
	use dao\dbDao\EventDao as EventDao;
	use dao\dbDao\ScheduleDao as ScheduleDao;
	use dao\Singleton as Singleton;
use controller\Middleware as Middleware;
	Autoload::start();

	class AdminScheduleController{

		private $placeDao;
		private $locationDao;
		private $artistDao;
		private $subEventDao;
		private $scheduleDao;
		private $eventDao;

		function __construct(){
			$middleware = Middleware::getInstance();
			$middleware->checkAdmin();
			$this->placeDao=PlaceDao::getInstance();
			$this->locationDao=LocationDao::getInstance();
			$this->artistDao=ArtistDao::getInstance();
			$this->scheduleDao=ScheduleDao::getInstance();
			$this->subEventDao= SubEventDao::getInstance();
			$this->eventDao= EventDao::getInstance();
		}


		public function index(){

			$eventId=$_GET['id'];

			$schedules = $this->scheduleDao->get($eventId);
			$event = $this->eventDao->get($eventId);
		
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\date\date_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
		}

		public function addView(){
			$eventId=$_GET['id'];
			$event = $this->eventDao->get($eventId);
			$places = $this->getPlaces();
			$artists = $this->getArtists();
			$locations = $this->getLocations();
			$j=$artists[0]->toJson();
	

			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\date\date_add.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function editView(){

			$id=$_GET['id'];

			$schedule = $this->scheduleDao->getByIdForEdit($id);
			$places = $this->getPlaces();
			$artists = $this->getArtists();
			$locations = $this->getLocations();
			$j=$artists[0]->toJson();
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\date\date_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function add(){}

		public function edit(){}

		public function delete(){

			$id= $_POST['schedule_id'];

		

			$this->locationDao->deleteByScheduleId($id);
			$this->subEventDao->deleteByScheduleId($id);
			$this->scheduleDao->delete($id);
			

		}

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

			$eventId = $_POST['event_id'];
			$day = $_POST['date'];
			$placeId = $_POST['place_id'];

			$locationsArray = $_POST['locations'];
			$locations=array();
			foreach ($locationsArray as $l) {
				$location = new Location($l['id'],null,$l['quantity'],$l['quantity'],$l['price']);
				array_push($locations, $location);
			}

			
			$subEventsArray = $_POST['subEvents'];
			$subEvents=array();
			foreach ($subEventsArray as $s) {
				$subEvent = new SubEvent(0,new Artist($s['artist_id'],null,null,null),$s['start_hour'],$s['finish_hour']);
				array_push($subEvents, $subEvent);
			}

			$schedule = new Schedule(0,$day, new Place($placeId,null,null,null));
			$scheduleId=$this->scheduleDao->save($schedule,$eventId);
			
			foreach ($subEvents as $subEvent) {
				$this->subEventDao->save($subEvent,$scheduleId);
			}
				
			
			foreach ($locations as $location) {
				$this->locationDao->addLocationSchedule($location,$scheduleId);
			}

			echo 'true';
		}


		public function update(){

			//str_replace('"', "'", $locations);
			$scheduleId = $_POST['schedule_id'];
			$day = $_POST['date'];
			$placeId = $_POST['place_id'];

			$locationsArray = $_POST['locations'];
			$locations=array();
			foreach ($locationsArray as $l) {
				$location = new Location($l['id'],null,$l['quantity'],$l['quantity'],$l['price']);
				array_push($locations, $location);
			}

			
			
			$subEventsArray = $_POST['subEvents'];
			$subEvents=array();
			foreach ($subEventsArray as $s) {
				$subEvent = new SubEvent(0,new Artist($s['artist_id'],null,null,null),$s['start_hour'],$s['finish_hour']);
				array_push($subEvents, $subEvent);
			}

			
			
			$schedule = new Schedule($scheduleId,$day, new Place($placeId,null,null,null));

	
			$this->scheduleDao->update($schedule);
			$this->subEventDao->deleteByScheduleId($scheduleId);
			
		
			foreach ($subEvents as $subEvent) {
				$this->subEventDao->save($subEvent,$scheduleId);
			}
			
			$this->locationDao->deleteByScheduleId($scheduleId);
			
			foreach ($locations as $location) {
				$this->locationDao->addLocationSchedule($location,$scheduleId);
			}
			

			
		}


		public function prueba(){

			$scheduleId = 2;
			$locations=array();
			$subEvents=array();

			$subEvent = new SubEvent(0,new Artist(1,null,null),23,27);
			array_push($subEvents, $subEvent);
			$subEvent = new SubEvent(0,new Artist(2,null,null),29,33);
			array_push($subEvents, $subEvent);

			$location = new Location(1,null,399,250,399);
			array_push($locations, $location);
			$location = new Location(2,null,322,19,322);
			array_push($locations, $location);
			


			$this->subEventDao->deleteByScheduleId($scheduleId);
			
			foreach ($subEvents as $subEvent) {
				$this->subEventDao->save($subEvent,$scheduleId);
			}
			
			$this->locationDao->deleteByScheduleId($scheduleId);
			
			foreach ($locations as $location) {
				$this->locationDao->addLocationSchedule($location,$scheduleId);
			}

		}
	}



?>