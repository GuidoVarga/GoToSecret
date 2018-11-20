<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;

	Autoload::start();


	class EventDetailController{

		private $cartController;

		public function __construct(){
			//$this->cartController = new cartController();
		}	

		public function index(){

		
            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\detail_item.php');
			include(ROOT . 'views\user\footer.php');
			
		}

		public function validateSelection(){}

		public function addToCart(){
		}
	
	}



?>