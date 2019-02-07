<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use dao\dbDao\ArtistDao as ArtistDao;
	use dao\dbDao\EventDao as EventDao;
	use dao\dbDao\PlaceDao as PlaceDao;
	use dao\dbDao\EventCategoryDao as EventCategoryDao;
	use dao\Singleton as Singleton;
use controller\Middleware as Middleware;
	Autoload::start();

	class AdminController{

		private $artistDao;
		private $eventDao;
		private $placeDao;
		private $eventCategoryDao;

		function __construct(){
			/*$middleware = Middleware::getInstance();
			$middleware->checkAdmin();*/
			$this->artistDao=ArtistDao::getInstance();
			$this->eventDao=EventDao::getInstance();
			$this->placeDao=PlaceDao::getInstance();	
			$this->eventCategoryDao=EventCategoryDao::getInstance();		
		}


		public function index(){

			$artists=$this->artistDao->getAll();
			$events=$this->eventDao->getAll();
			$places=$this->placeDao->getAll();
			$eventCategories=$this->eventCategoryDao->getAll();
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\dashboard.php');
			/*include(ROOT . 'views\admin\test.php');  Cantidad Vendida y Remanente de un evento*/
			include(ROOT . 'views\admin\footer_admin.php');
			
		}




		
	}



?>