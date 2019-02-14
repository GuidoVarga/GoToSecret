<?php namespace dao\dbDao;

require_once(ROOT.'config\Autoload.php');
	
use config\Autoload as Autoload;
use models\Event as Event;
use dao\dbDao\Connection as Connecction;
use dao\dbDao\EventCategoryDao as EventCategoryDao;
use dao\dbDao\ScheduleDao as ScheduleDao;
use \PDOException as PDOException;
use dao\iDao as iDao;
use dao\Singleton as Singleton;
use \PDO as PDO;

Autoload::start();

class QueryDao extends Singleton{


	public function getTotalQuantity($id){
		try {
			$sql = "SELECT SUM(schedules_x_locations.total_quantity) FROM schedules_x_locations INNER JOIN schedules ON schedules_x_locations.schedule_id = schedules.id INNER JOIN events ON schedules.event_id = events.id WHERE events.id=:id";
			$obj_pdo = new Connection();
			$connection = $obj_pdo->connect();
			$query = $connection->prepare($sql);
		
			$query->bindParam(":id", $id);

			$query->execute();
			$result=$query->fetchAll();
			return $result[0][0];
		
		} catch(PDOException $Exception) {	
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}

	public function getSurplusQuantity($id){

		try {
			$sql = "SELECT SUM(schedules_x_locations.surplus) FROM schedules_x_locations INNER JOIN schedules ON schedules_x_locations.schedule_id = schedules.id INNER JOIN events ON schedules.event_id = events.id WHERE events.id=:id";
			$obj_pdo = new Connection();
			$connection = $obj_pdo->connect();
			$query = $connection->prepare($sql);
		
			$query->bindParam(":id", $id);

			$query->execute();
			$result=$query->fetchAll();
			return $result[0][0];
		
		} catch(PDOException $Exception) {	
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}

	public function getTotalQuantityByCategory($id){
		try {
			$sql = "SELECT SUM(schedules_x_locations.total_quantity) FROM schedules_x_locations INNER JOIN schedules ON schedules_x_locations.schedule_id = schedules.id INNER JOIN events ON schedules.event_id = events.id INNER JOIN event_categories ON events.event_category_id=event_categories.id WHERE event_categories.id=:id";
			$obj_pdo = new Connection();
			$connection = $obj_pdo->connect();
			$query = $connection->prepare($sql);
		
			$query->bindParam(":id", $id);

			$query->execute();
			$result=$query->fetchAll();
			return $result[0][0];
		
		} catch(PDOException $Exception) {	
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}

	public function getSurplusQuantityByCategory($id){

		try {
			$sql = "SELECT SUM(schedules_x_locations.surplus) FROM schedules_x_locations INNER JOIN schedules ON schedules_x_locations.schedule_id = schedules.id INNER JOIN events ON schedules.event_id = events.id INNER JOIN event_categories ON events.event_category_id=event_categories.id WHERE event_categories.id=:id";
			$obj_pdo = new Connection();
			$connection = $obj_pdo->connect();
			$query = $connection->prepare($sql);
		
			$query->bindParam(":id", $id);

			$query->execute();
			$result=$query->fetchAll();
			return $result[0][0];
		
		} catch(PDOException $Exception) {	
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}


	public function getSurplusXPriceByCategory($id){

		try {
			$sql = "SELECT SUM(schedules_x_locations.surplus*schedules_x_locations.price) FROM schedules_x_locations INNER JOIN schedules ON schedules_x_locations.schedule_id = schedules.id INNER JOIN events ON schedules.event_id = events.id INNER JOIN event_categories ON events.event_category_id=event_categories.id WHERE event_categories.id=:id";
			$obj_pdo = new Connection();
			$connection = $obj_pdo->connect();
			$query = $connection->prepare($sql);
		
			$query->bindParam(":id", $id);

			$query->execute();
			$result=$query->fetchAll();
			return $result[0][0];
		
		} catch(PDOException $Exception) {	
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}

	public function getTotalQuantityXPriceByCategory($id){

		try {
			$sql = "SELECT SUM(schedules_x_locations.total_quantity*schedules_x_locations.price) FROM schedules_x_locations INNER JOIN schedules ON schedules_x_locations.schedule_id = schedules.id INNER JOIN events ON schedules.event_id = events.id INNER JOIN event_categories ON events.event_category_id=event_categories.id WHERE event_categories.id=:id";
			$obj_pdo = new Connection();
			$connection = $obj_pdo->connect();
			$query = $connection->prepare($sql);
		
			$query->bindParam(":id", $id);

			$query->execute();
			$result=$query->fetchAll();
			return $result[0][0];
		
		} catch(PDOException $Exception) {	
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}


}

//"SELECT schedules_x_locations.surplus FROM events INNER JOIN schedules ON schedules.event_id = events.id INNER JOIN schedules_x_locations ON schedules_x_locations.schedule_id = schedules.id  WHERE events.id=:id";
