<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use dao\dbDao\EventDao as EventDao;
	use models\Event as Event;

	Autoload::start();


	class EventDetailController{

		private $cartController;
		private $dao;

		public function __construct(){
			//$this->cartController = new cartController();
			$this->dao = EventDao::getInstance();
		}	

		public function index(){
			session_start();
			$event = $this->getEvent();
			$schedules = $event->getSchedules();
			isset($_SESSION['user']) ? $user = $_SESSION['user']:null;
			
            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\detail_item.php');
			include(ROOT . 'views\user\footer.php');
		}

		public function validateSelection(){}

		public function addToCart(){
		}

		public function getEvent(){
			$id=$_GET['id'];
			return $this->dao->get($id);
		}
	
	}



?>