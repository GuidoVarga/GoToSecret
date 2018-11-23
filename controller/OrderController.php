<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;

	Autoload::start();

	class OrderController{

		private $orderDao;

		function __construct(){
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