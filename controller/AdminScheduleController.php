<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\Date as Date;
	use dao\dbDao\ArtistDao as ArtistDao;
	use dao\dbDao\LocationDao as LocationDao;
	use dao\dbDao\PlaceDao as PlaceDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class AdminScheduleController{

		private $placeDao;
		private $locationDao;
		private $artistDao;

		function __construct(){
			$this->placeDao=PlaceDao::getInstance();
			$this->locationDao=LocationDao::getInstance();
			$this->artistDao=ArtistDao::getInstance();
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


	}



?>