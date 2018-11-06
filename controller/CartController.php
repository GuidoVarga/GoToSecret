<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;

	Autoload::start();


	class CartController{

		public function __construct(){

		}

		public function index(){

		
            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\cart.php');
			include(ROOT . 'views\user\footer.php');
			
			
		
		}

		
	}



?>