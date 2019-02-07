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
			return new ($p['id'],$p['quantity'],$p['price'],'schedule','location','event');
		}, $order_lines);
	}

}

?>