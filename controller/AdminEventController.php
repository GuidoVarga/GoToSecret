<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\Event as Event;
	use dao\dbDao\EventDao as EventDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class AdminEventController{

		private $dao;

		function __construct(){
			$this->dao=EventDao::getInstance();
		}


		public function index(){
			$events = $this->getEvents();
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\event\event_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function addView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\event\event_add.php');
			include(ROOT . 'views\admin\footer_admin.php');
		}

		public function editView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\event\event_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
		}

		public function add(){
			
			
		}

		public function edit(){
			
			
		}

		public function delete(){
		
		}

		public function getEvents(){
			return $this->dao->getAllWithCategories();
		}
	
	}
?>