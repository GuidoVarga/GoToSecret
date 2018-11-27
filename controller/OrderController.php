<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use controller\Middleware as Middleware;
	Autoload::start();

	class OrderController{

		private $orderDao;

		function __construct(){
			$middleware = Middleware::getInstance();
			$middleware->checkUser();
			$this->orderDao=OrderDao::getInstance();
		}



		public function index(){

		}

		public function confirmOrder(){

		}

		public function generateTickets(){

		}

		public function generateOrderLines(){
			
		}

		public function sendTicketToEmail(){

		}

		public function saveOrder(){

		}

		
	}



?>