<?php namespace dao\dbDao;

require_once(ROOT.'config\Autoload.php');

use config\Autoload as Autoload;
use models\OrderLine as OrderLine;
use dao\dbDao\Connection as Connection;
use \PDOException as PDOException;
use dao\iDao as iDao;
use dao\Singleton as Singleton;

Autoload::start();

class OrderLineDao extends Singleton implements iDao{

	private $ticketDao;
	private $subEventDao;
	private $placeDao;
	private $locationDao;
	private $scheduleDao;
	private $eventDao;

	public function __construct(){
		$this->subEventDao = SubEventDao::getInstance();
		$this->placeDao = PlaceDao::getInstance();
		$this->locationDao = LocationDao::getInstance();
		$this->scheduleDao = ScheduleDao::getInstance();
		$this->eventDao = EventDao::getInstance();
	}

	public function add($object){

		try {

			$sql = "INSERT INTO order_lines (id,name,description) VALUES (null,:name,:description)";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);


			$name=$object->getName();
			$description=$object->getDescription();


			$query->bindParam(":name", $name);
			$query->bindParam(":description", $description);
			

			$query->execute();
			return $connection->lastInsertId();
			
		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function addOrderLine($object,$orderId, $schedule_x_location_id){

		try {

			$sql = "INSERT INTO order_lines (id,quantity,price,schedule_x_location_id,order_id, ticket_id) VALUES (null,:quantity,:price,:schedule_x_location_id,:order_id,:ticket_id)";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);


			$quantity=$object->getQuantity();
			$price=$object->getPrice();
			$ticketId=$object->getTicket()->getId();


			$query->bindParam(":quantity", $quantity);
			$query->bindParam(":price", $price);
			$query->bindParam(":order_id", $orderId);
			$query->bindParam(":schedule_x_location_id", $schedule_x_location_id);
			$query->bindParam(":ticket_id", $ticketId);
			
			

			$query->execute();
			return $connection->lastInsertId();
			
		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}


	public function get($id){

		try {
			$sql = "SELECT * FROM order_lines WHERE id = :id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);
			$query->bindParam(":id", $id);
			$query->execute();

			$result=$query->fetchAll();

			return $this->map($result);

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function getByOrderId($id){

		try {
			$sql = "SELECT * FROM order_lines WHERE order_id = :id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);
			$query->bindParam(":id", $id);
			$query->execute();

			$result=$query->fetchAll();

			return $this->map($result);

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function getAll(){

		try {
			$sql = "SELECT * FROM order_lines";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);
			
			$query->execute();

			$result=$query->fetchAll();

			return $result;

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function delete($id){

	}

	public function update($object){

	} 

	public function map($objects)
	{

		$order_lines = is_array($objects) ? $objects : [];
		return array_map(function($p){
			$orderLine = new OrderLine ($p['id'],$p['quantity'],$p['price'],'schedule','location','event');
			$orderLine->setLocation($this->locationDao->getByScheduleLocationId($p['schedule_x_location_id']));
			$eventId = $this->locationDao->getEventIdByScheduleLocationId($p['schedule_x_location_id']);
			$scheduleId = $this->locationDao->getScheduleIdByScheduleLocationId($p['schedule_x_location_id']);
			$orderLine->setEvent($this->eventDao->get($eventId[0][0]));
			$orderLine->setSchedule($this->scheduleDao->getById($scheduleId[0][0]));
			return $orderLine;
		}, $order_lines);
	}


	public function mapOnlyOneForEdit($array){

		if(isset($array)){
			$p = $array[0];
			$schedule = new Schedule($p['id'],$p['day'],$this->placeDao->get($p['place_id']));

			$schedule->setSubEvents($this->subEventDao->getByScheduleId($schedule->getId()));

			$schedule->setLocations($this->locationDao->getByScheduleIdEdit($schedule->getId()));
			return $schedule;
		}

	}

}

?>