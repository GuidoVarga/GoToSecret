<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\Artist as Location;
	use dao\dbDao\LocationDao as LocationDao;
	use dao\Singleton as Singleton;
use controller\Middleware as Middleware;
	Autoload::start();

	class AdminLocationController{

		private $userDao;

		function __construct(){
			/*$middleware = Middleware::getInstance();
			$middleware->checkAdmin();*/
			$this->dao=LocationDao::getInstance();
		}


		public function index(){
			
		
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\location\location_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function activeView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\location\location_add.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function suspendView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\location\location_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function suspend(){}

		public function active(){}

		public function showUsers(){}

		public function showOrdersByUser(){}


	}



?>