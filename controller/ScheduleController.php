<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use dao\dbDao\ScheduleDao as ScheduleDao;
	use dao\dbDao\EventDao as EventDao;
	use dao\dbDao\LocationDao as LocationDao;
	use models\Event as Event;
	use models\OrderLine as OrderLine;
use controller\Middleware as Middleware;
	Autoload::start();


	class ScheduleController{

		private $cartController;
		private $scheduleDao;
		private $eventDao;
		private $locationDao;

		public function __construct(){
			$middleware = Middleware::getInstance();
			$middleware->checkUser();
			//$this->cartController = new cartController();
			$this->scheduleDao = ScheduleDao::getInstance();
			$this->eventDao = EventDao::getInstance();
			$this->locationDao = LocationDao::getInstance();
		}	

		public function index(){
			
			//session_destroy();

			$scheduleId=$_GET['id'];
			$eventId=$_POST['event_id'];


			$schedule = $this->getSchedule($scheduleId);
			$event = $this->getEvent($eventId);


            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\specific_item.php');
			include(ROOT . 'views\user\footer.php');
			
		}

		public function validateSelection(){}

		public function addToCart(){

			session_start();


			$scheduleId=$_POST['schedule_id'];
			$eventId=$_POST['event_id'];
			$quantity=$_POST['quantity'];
			$locationId=$_POST['location'];

			$location = $this->locationDao->getByScheduleLocationId($locationId);



			$schedule = $this->getSchedule($scheduleId);
			$event = $this->getEvent($eventId);

			if(isset($_SESSION['cart'])){
				$cart = $_SESSION['cart'];
			}else{
				$_SESSION['cart']=array();
				$cart=array();
			}

			$orderLine = new OrderLine(0,$quantity,0,$schedule,$location,$event);
		
			array_push($cart, $orderLine);

			$_SESSION['cart']=$cart;

		

		}


		public function getEvent($id){
			return $this->eventDao->getOnlyWithCategory($id);
		}

		public function getSchedule($id){
			return $this->scheduleDao->getById($id);
		}
		

	
	}



?>