<?php namespace dao\dbDao;

require_once(ROOT.'config\Autoload.php');

use config\Autoload as Autoload;
use models\Order as Order;
use dao\dbDao\Connection as Connection;
use \PDOException as PDOException;
use dao\iDao as iDao;
use dao\Singleton as Singleton;

Autoload::start();

class OrderDao extends Singleton implements iDao{

	private $orderLineDao;

	public function add($object){

		try {

			$sql = "INSERT INTO orders (id,date,account_id) VALUES (null,:fecha,:account_id)";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);


			$date=$object->getName();
			$account_id=$object->getDescription();


			$query->bindParam(":fecha", $date);
			$query->bindParam(":account_id", $account_id);
			

			$query->execute();
			return $connection->lastInsertId();
			
		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function addOrder($object,$account_id){

		try {

			$sql = "INSERT INTO orders (id,date,account_id) VALUES (null,:fecha,:account_id)";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);

			$date=$object->getDate();

			$query->bindParam(":fecha", $date);
			$query->bindParam(":account_id", $account_id);
			
			$query->execute();
			return $connection->lastInsertId();
			
		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function get($id){

		try {
			$sql = "SELECT * FROM orders WHERE id = :id";

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

	public function getByAccountId($id){

		try {
			$sql = "SELECT * FROM orders WHERE account_id = :id";

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
			$sql = "SELECT * FROM orders";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);
			
			$query->execute();

			$result=$query->fetchAll();

			return $this->map($result);

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

		$orders = is_array($objects) ? $objects : [];
		return array_map(function($p){
			return new Order($p['id'],$p['date']);
		}, $orders);
	}

}

?>