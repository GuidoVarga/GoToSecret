<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use dao\dbDao\EventDao as EventDao;
use controller\Middleware as Middleware;
	Autoload::start();


	class AdminQueryController{

		private $eventDao;

		public function __construct(){
			/*$middleware = Middleware::getInstance();
			$middleware->checkAdmin();*/
			$this->eventDao=EventDao::getInstance();
			
		}	

		public function index(){
			$events=$this->eventDao->getAll();
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\check.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}
		

	
	
	}



?>