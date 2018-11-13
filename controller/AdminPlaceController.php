<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\City as City;
	use models\Place as Place;
	use dao\dbDao\CityDao as CityDao;
	use dao\dbDao\PlaceDao as PlaceDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class AdminPlaceController{

	/*	private $cityDao;

		function __construct(){
			$this->cityDao=CityDao::getInstance();
		}*/



		public function index(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\city\city_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function addView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\city\city_add.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function editView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\city\city_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function add(){}

		public function edit(){}

		public function delete(){}

		public function getCities(){}
	
	}



?>