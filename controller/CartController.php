<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
use controller\Middleware as Middleware;
	Autoload::start();

	class CartController{

		function __construct(){
			$middleware = Middleware::getInstance();
			$middleware->checkUser();
		}

		public function index(){


			session_start();
			if(isset($_SESSION['cart'])){
			$cart=$_SESSION['cart'];
			$total=$this->getTotal($cart);
		}
            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\cart.php');
			include(ROOT . 'views\user\footer.php');
		}

		public function addItem($item){

		}

		public function deleteItem($item){
			
		}

		public function updateItem($item){
			
		}

		public function getTotal($cart){

			$total=0;
			foreach ($cart as $orderLine) {
				$total+=$orderLine->getPrice();
			}
			return $total;
		}

		public function empty(){
			session_start();
			session_destroy();
		}

		
		
	}



?>