<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use controller\Middleware as Middleware;
	Autoload::start();

	class OrderController{

		private $orderDao;

		function __construct(){
			//$middleware = Middleware::getInstance();
			//$middleware->checkUser();
			//$this->orderDao=OrderDao::getInstance();
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

		public function generateTickets(){

		}

		public function generateOrderLines(){
			
		}

		private function sendTicketToEmail(){

		}

		public function saveOrder(){

		}

		public function sendEmail(){

				$to = "guidovargamartinez123@gmail.com";
				$subject = "Asunto del email";
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