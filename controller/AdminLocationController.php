<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\Artist as Location;
	use dao\dbDao\LocationDao as LocationDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class AdminLocationController{

		private $locationDao;

		function __construct(){
			$this->locationDao=LocationDao::getInstance();
		}


		public function index(){
			
		
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\location\location_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function addView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\location\location_add.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function editView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\location\location_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function add(){}

		public function edit(){}

		public function delete(){}

		public function getLocations(){}


	}



?>