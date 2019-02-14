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
		private $googleChartAPI = 'http://chart.apis.google.com/chart';

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

						//$orderLine = $this->orderLineDao->get(22);

						$order = $this->orderDao->get($orderId);
						$orderLines = $order->getOrderLines();
						foreach ($orderLines as $orderLine) {
							$key = SECRECT_KEY.$orderLine->getId();
							$token = password_hash($key,PASSWORD_DEFAULT);
							$orderLineJson = $this->generateJson($orderLine,$token);
						}
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

		private function generateJson($orderLine,$token){
			$orderLineId=$orderLine->getId();
			$object = new \stdClass();
			$object->id= $orderLineId;
			$object->token= $token;
			
			$object->event = $orderLine->getEvent()->getName();
			$object->date = $orderLine->getSchedule()->getDay();
			$object->place = $orderLine->getSchedule()->getPlace()->getName().'-'.$orderLine->getSchedule()->getPlace()->getCity()->getName();
			$object->address = $orderLine->getSchedule()->getPlace()->getAddress();
			$object->uses = $orderLine->getQuantity();
			
			$json=json_encode($object,JSON_PRETTY_PRINT);
			$this->generateQr(300,'resources/qr/qr'.$orderLineId,$json);
			$this->sendEmail($orderLineId);
			return $json;

		}

		public function generateOrderLines(){
			
		}

		private function sendTicketToEmail(){

		}

		public function saveOrder(){

		}

		public function qr(){

		}

		private function generateQr($size = 200, $filename = null, $codeData){

			        $ch = curl_init();
			        curl_setopt($ch, CURLOPT_URL, $this->googleChartAPI);
			        curl_setopt($ch, CURLOPT_POST, true);
			        curl_setopt($ch, CURLOPT_POSTFIELDS, "chs={$size}x{$size}&cht=qr&chl=" . urlencode($codeData));
			        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			        curl_setopt($ch, CURLOPT_HEADER, false);
			        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			        $img = curl_exec($ch);
			        curl_close($ch);
			    
			        if($img) {
			            if($filename) {
			                if(!preg_match("#.png$#i", $filename)) {
			                    $filename .= ".png";
			                    return $filename;
			                }
			                
			                return file_put_contents($filename, $img);
			            } else {
			                header("Content-type: image/png");
			                print $img;
			                return true;
			            }
			        }
			        return false;
			    
		}

		private function sendEmail($id){

				$user=$_SESSION['user'];
				$to = $user->getAccount()->getEmail();
				$subject = "¡Gracias por tu compra!";
				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
				$qr = '<img src="http://localhost/GoToSecret/resources/qr/qr'.$id.'.png"/>';
				$message = '
				<html>
				<head>
				<title>Gracias por tu compra</title>
				</head>
				<body>
				<h1>Tu compra ha sido confirmada</h1>
				<p>Con este qr puedes entrar al evento. Tiene un limite de uso (la cantidad de plazas que compraste)</p>
				'.$qr.'
				</body>
				</html>';
				 
				mail($to, $subject, $message, $headers);
		}

		
	}



?>