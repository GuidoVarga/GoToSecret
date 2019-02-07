<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use dao\dbDao\EventDao as EventDao;
	use dao\dbDao\EventCategoryDao as EventCategoryDao;
use controller\Middleware as Middleware;
	Autoload::start();


	class AdminQueryController{

		private $eventDao;

		public function __construct(){
		$middleware = Middleware::getInstance();
			$middleware->checkAdmin();
			$this->eventDao=EventDao::getInstance();
			$this->eventCategoryDao=EventCategoryDao::getInstance();
			
		}	

		public function index(){
			
			
		}

		public function checkQuantitySurplus(){
			$events=$this->eventDao->getAll();
		
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\check_surplus_quantity.php');
			include(ROOT . 'views\admin\footer_admin.php');
		}

		public function soldByCategory(){
			$events=$this->eventDao->getAll();
			$categories = $this->eventCategoryDao->getAll();
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\check_sold_by_category.php');
			include(ROOT . 'views\admin\footer_admin.php');
		}
		

	
	
	}



?>