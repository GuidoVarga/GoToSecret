<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use models\User as User;
	use dao\dbDao\UserDao as UserDao;
	use dao\dbDao\OrderDao as OrderDao;

	Autoload::start();

	class AccountController{

		private $userDao;
		private $orderDao;

		function __construct(){
		

			$this->userDao=UserDao::getInstance();
			$this->orderDao=OrderDao::getInstance();
			
		}

		public function index(){
			session_start();
			if(isset($_SESSION['user'])){
				$user=$_SESSION['user'];
			}
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\profile_user.php');
			include(ROOT . 'views\user\footer.php');
		}

		public function updateInfo($user){
			
		}

		public function showOrders(){

		}

		public function showTickets(){
			
		}

		
	}



?>