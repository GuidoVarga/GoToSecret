<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use controller\Middleware as Middleware;
	use dao\dbDao\OrderLineDao as OrderLineDao;
	use dao\dbDao\OrderDao as OrderDao;

	Autoload::start();

	class OrderController{

		private $orderDao;
		private $orderLineDao;

		function __construct(){
			//$middleware = Middleware::getInstance();
			//$middleware->checkUser();
			$this->orderDao=OrderDao::getInstance();
			$this->orderLineDao=OrderLineDao::getInstance();
		}



		public function index(){
			session_start();
			isset($_SESSION['user']) ? $user = $_SESSION['user']: null;

			if(isset($_GET['order'])&&isset($_GET['id'])){

				$token = $_GET['order'];
				$orderId = $_GET['id'];

				if(isset($token)){
					$key = SECRECT_KEY.$orderId;
					if(password_verify($key,$token)){

						$orderLine = $this->orderLineDao->get(22);
						$orderJson = $this->generateJson($orderLine,$token);

						var_dump($orderJson);

						include(ROOT . 'views\head.php');
						include(ROOT . 'views\user\header.php');
						include(ROOT . 'views\user\order_confirmed.php');
						include(ROOT . 'views\user\footer.php');
					}


				}
			}
			
		}

		public function confirmOrder(){

		}

		public function generateJson($orderLine,$token){

		$object = new \stdClass();
		$object->id= $orderLine->getId();
		$object->token= $token;
		
		$object->event = $orderLine->getEvent()->getName();
		$object->date = $orderLine->getSchedule()->getDay();
		$object->place = $orderLine->getSchedule()->getPlace()->getName().'-'.$orderLine->getSchedule()->getPlace()->getCity()->getName();
		$object->address = $orderLine->getSchedule()->getPlace()->getAddress();
		
		$json=json_encode($object,JSON_PRETTY_PRINT);

		$json = str_replace('"',"'",$json);

		return $json;

		}

		public function generateOrderLines(){
			
		}

		private function sendTicketToEmail(){

		}

		public function saveOrder(){

		}

		public function sendEmail(){
				session_start();
				$user=$_SESSION['user'];
				$to = $user->getAccount()->getEmail();
				$subject = "¡Gracias por tu compra!";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				 
				$message = "
				<html>
				<head>
				<title>HTML</title>
				</head>
				<body>
				<h1>Esto es un H1</h1>
				<p>Esto es un párrafo en HTML</p>
				</body>
				</html>";
				 
				mail($to, $subject, $message, $headers);
		}

		
	}



?>