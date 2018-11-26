<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use dao\dbDao\EventDao as EventDao;

	Autoload::start();


	class AdminQueryController{

		private $eventDao;

		public function __construct(){
			$this->eventDao=EventDao::getInstance();
			
		}	

		public function index(){
			$events=$this->eventDao->getAll();
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\test.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}
		

	
	
	}



?>