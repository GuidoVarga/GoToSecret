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
			

			$scheduleId=$_GET['id'];
			$eventId=$_POST['event_id'];


			$schedule = $this->getSchedule($scheduleId);
			$event = $this->getEvent($eventId);
			isset($_SESSION['user']) ? $user = $_SESSION['user']: null;


            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\specific_item.php');
			include(ROOT . 'views\user\footer.php');
			
		}

		public function validateSelection(){}

		public function addToCart(){

			if(!isset($_SESSION['index-cart'])){
				$_SESSION['index-cart']=0;
			}
			$index = $_SESSION['index-cart'];


			$scheduleId=$_POST['schedule_id'];
			$eventId=$_POST['event_id'];
			$quantity=$_POST['quantity'];
			$locationId=$_POST['location_id'];

			$response=$this->validateItem($scheduleId,$locationId,$quantity);

			if($response=="ok"){

			$location = $this->locationDao->getByScheduleLocationId($locationId);

				if($this->locationDao->validateSubtract($locationId,$quantity)){
			
					$schedule = $this->scheduleDao->getOnlySchedule($scheduleId);
					$event = $this->getEvent($eventId);

					if(isset($_SESSION['cart'])){
						$cart = $_SESSION['cart'];
					}else{
						$_SESSION['cart']=array();
						$cart=array();
					}

					$orderLine = new OrderLine($index+1,$quantity,0,$schedule,$location,$event);
				
					array_push($cart, $orderLine);

					$_SESSION['cart']=$cart;

					echo 'true';
				}
				else{
					echo 'No quedan suficientes entradas';
				}
			}else{
					echo $response;
			}
		}

		private function validateItem($scheduleId,$locationId,$quantity) {

			if($quantity>5){
				return "El maximo de entradas por fecha es 5";
			}

			if(isset($_SESSION['cart'])){
					$cart = $_SESSION['cart'];

					foreach ($cart as $orderLine) {
				
							if($orderLine->getSchedule()->getId()==$scheduleId) {
								$q=$orderLine->getQuantity();
								if($q+$quantity>5){
									return "El maximo de entradas por fecha es 5";
								}else if($orderLine->getLocation()->getId() == $locationId){
									$orderLine->setQuantity($q+$quantity);
									return "Sumado al carrito";
								}
								
							}
					}
			}
			return "ok";


		}


		public function getEvent($id){
			return $this->eventDao->getOnlyWithCategory($id);
		}

		public function getSchedule($id){
			return $this->scheduleDao->getById($id);
		}
		

	
	}



?>