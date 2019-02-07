<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use models\User as User;
	use dao\dbDao\UserDao as UserDao;
	use dao\dbDao\OrderDao as OrderDao;
	use dao\dbDao\OrderLineDao as OrderLineDao;

	Autoload::start();

	class AccountController{

		private $userDao;
		private $orderDao;
		private $orderLineDao;


		function __construct(){

			$this->userDao=UserDao::getInstance();
			$this->orderDao=OrderDao::getInstance();
			$this->orderLineDao=OrderLineDao::getInstance();
	
		}

		public function index(){
			session_start();
			if(isset($_SESSION['user'])){
				$user=$_SESSION['user'];
			}

			$orders = $this->orderDao->getAll();
			
			foreach ($orders as $order) {
				$id = $order->getId();
				echo '<pre>';
				var_dump($this->orderLineDao->getByOrderId($id));
				echo '</pre>';
				//$order->setOrderLines();
			}
	;

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