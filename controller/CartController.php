<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use controller\Middleware as Middleware;
	use dao\dbDao\OrderDao as OrderDao;
	use dao\dbDao\TicketDao as TicketDao;
	use dao\dbDao\LocationDao as LocationDao;
	use dao\dbDao\OrderLineDao as OrderLineDao;
	use models\Order as Order;
	use models\Ticket as Ticket;
	use \PDOException as PDOException;
	Autoload::start();

	class CartController {

		private $orderDao;
		private $orderLineDao;
		private $locationDao;
		private $ticketDao;

		function __construct(){
			$middleware = Middleware::getInstance();
			$middleware->checkUser();
			$this->orderDao=OrderDao::getInstance();
			$this->orderLineDao=OrderLineDao::getInstance();
			$this->locationDao=LocationDao::getInstance();
			$this->ticketDao=TicketDao::getInstance();
		}

		public function index(){

			if(isset($_SESSION['cart'])){
				$cart=$_SESSION['cart'];
				$total=$this->getTotal($cart);
			}
			isset($_SESSION['user']) ? $user = $_SESSION['user']: null;
            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\cart.php');
			include(ROOT . 'views\user\footer.php');
		}

		public function addItem($item){

		}

		public function deleteItem($eventName){

			$cart = $_SESSION['cart'];
			$i=0;
			foreach ($cart as $orderLine) {
				
				if($orderLine->getEvent()->getName()==$eventName){
					$index=$i;
				}
				$i++;
			}
			$nuevo = array_slice($cart, 0, $index);
			$nuevo2= array_slice($cart, $index+1);
			$cart=array_merge($nuevo, $nuevo2);
			$_SESSION['cart']=$cart;
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
			unset($_SESSION['cart']);
		}

		public function confirmOrder(){

			if(isset($_SESSION['cart'])){
				$cart=$_SESSION['cart'];
				$total=$this->getTotal($cart);
			}
			isset($_SESSION['user']) ? $user = $_SESSION['user']: null;

			$order = new Order(null,date('d-m-Y'));
			$orderId=$this->orderDao->addOrder($order,$user->getAccount()->getId());

			foreach ($cart as $orderLine) {
				
				$locationId = $orderLine->getLocation()->getId();
				$quantity = $orderLine->getQuantity();
				if($this->locationDao->validateSubtract($locationId,$quantity)){
					$ticket = new Ticket(null);
					$ticketId=$this->ticketDao->add($ticket);
					$ticket->setId($ticketId);
					$orderLine->setTicket($ticket);
					$this->locationDao->subtract($locationId, $quantity);
					$orderLineId=$this->orderLineDao->addOrderLine($orderLine, $orderId, $locationId);
				}
				
		}
		$this->empty();

		$key = SECRECT_KEY.$orderId;

		$hash = password_hash($key,PASSWORD_DEFAULT);

	
		$object = new \stdClass();
		$object->id= $orderId;
		$object->token= $hash;
		$json=json_encode($object);
		echo $json;
		
}

}
?>