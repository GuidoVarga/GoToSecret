<?php namespace dao\dbDao;

require_once(ROOT.'config\Autoload.php');

use config\Autoload as Autoload;
use models\Location as Location;
use dao\dbDao\Connection as Connection;
use \PDOException as PDOException;
use dao\iDao as iDao;
use dao\Singleton as Singleton;
use \PDO as PDO;

Autoload::start();

class LocationDao extends Singleton implements iDao{


	public function add($object){

		try {

			$sql = "INSERT INTO locations (id,name) VALUES (null,:name)";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);

			$name=$object->getName();

			$query->bindParam(":name", $name);
			

			$query->execute();
			return $connection->lastInsertId();
			
		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function addLocationSchedule($object,$scheduleId){
		try {

			$sql = "INSERT INTO schedules_x_locations (id,schedule_id,location_id,price,surplus,total_quantity) VALUES (null,:schedule_id,:location_id,:price,:surplus,:total_quantity)";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);

			$locationId=$object->getId();
			$price=$object->getPrice();
			$surplus=$object->getSurplus();
			$totalQuantity=$object->getTotalQuantity();


			$query->bindParam(":schedule_id", $scheduleId);
			$query->bindParam(":location_id", $locationId);
			$query->bindParam(":price", $price);
			$query->bindParam(":surplus", $surplus);
			$query->bindParam(":total_quantity", $totalQuantity);
			

			$query->execute();
			return $connection->lastInsertId();
			
		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}
	}

	public function get($id){

		try {
			$sql = "SELECT * FROM locations WHERE id = :id";

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


	public function getByScheduleLocationId($id){

		try {

			$sql = "SELECT * FROM schedules_x_locations INNER JOIN locations ON locations.id = schedules_x_locations.location_id WHERE schedules_x_locations.id = :id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query = $connection->prepare($sql);
			$query->bindParam(":id", $id);
			$query->execute();

			$result=$query->fetchAll();

			return $this->mapByDateOnlyOne($result);

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	

	public function getEventIdByScheduleLocationId($id){

		try {

			$sql = "SELECT events.id FROM schedules_x_locations INNER JOIN schedules ON schedules.id = schedules_x_locations.schedule_id INNER JOIN events ON events.id = schedules.event_id  WHERE schedules_x_locations.id = :id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query = $connection->prepare($sql);
			$query->bindParam(":id", $id);
			$query->execute();

			$result=$query->fetchAll();

			return $result;

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function getScheduleIdByScheduleLocationId($id){

		try {

			$sql = "SELECT schedules.id FROM schedules_x_locations INNER JOIN schedules ON schedules.id = schedules_x_locations.schedule_id WHERE schedules_x_locations.id = :id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query = $connection->prepare($sql);
			$query->bindParam(":id", $id);
			$query->execute();

			$result=$query->fetchAll();

			return $result;

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function getByScheduleAndLocation($scheduleId, $locationId){

		try {

			$sql = "SELECT * FROM schedules_x_locations INNER JOIN locations ON locations.id = schedules_x_locations.location_id WHERE schedules_x_locations.location_id = :location_id AND schedules_x_locations.schedule_id = :schedule_id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query = $connection->prepare($sql);
			$query->bindParam(":location_id ", $locationId);
			$query->bindParam(":schedule_id ", $scheduleId);
			var_dump($scheduleId);
			var_dump($locationId);
			$query->execute();

			$result=$query->fetchAll();

			return $this->mapByDateOnlyOne($result);

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function getByScheduleId($id){

		try {

			$sql = "SELECT * FROM schedules_x_locations INNER JOIN locations ON locations.id = schedules_x_locations.location_id WHERE schedules_x_locations.schedule_id = :id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query = $connection->prepare($sql);
			$query->bindParam(":id", $id);
			$query->execute();

			$result=$query->fetchAll();

			return $this->mapByDate($result);

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function getByScheduleIdEdit($id){

		try {

			$sql = "SELECT * FROM schedules_x_locations INNER JOIN locations ON locations.id = schedules_x_locations.location_id WHERE schedules_x_locations.schedule_id = :id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query = $connection->prepare($sql);
			$query->bindParam(":id", $id);
			$query->execute();

			$result=$query->fetchAll();

			return $this->mapByDateForEdit($result);

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function getAll(){

		try {
			$sql = "SELECT * FROM locations";

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

		$sql="DELETE FROM locations WHERE id=:id";
		$obj_pdo = new Connection();

		try {

			$connection = $obj_pdo->connect();
			$query = $connection->prepare($sql);
			$query->bindParam("id", $id);
			$query->execute();
			
		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function deleteByScheduleId($id){



		try {
			$sql="DELETE FROM schedules_x_locations WHERE schedule_id=:id";
			$obj_pdo = new Connection();
			$connection = $obj_pdo->connect();
			$query = $connection->prepare($sql);
			$query->bindParam("id", $id);
			$query->execute();
			
		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function update($object){

		try {

			$sql = "UPDATE locations SET name=:name WHERE id=:id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();


			$query = $connection->prepare($sql);
			$id=$object->getId();
			$name=$object->getName();

			$query->bindParam(":id", $id);
			$query->bindParam(":name", $name);

			$query->execute();
			
		} catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}


	}

	public function validateSubtract($id, $subtractQuantity){

		try {

			$sql = "SELECT surplus FROM schedules_x_locations WHERE schedules_x_locations.id= :id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query = $connection->prepare($sql);
			$query->bindParam(":id", $id);
			$query->execute();

			$result=$query->fetchAll();

			$surplus=$result[0][0];

			if($surplus-$subtractQuantity>=0){
				return true;
			}
			else{
				return false;
			}

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}


	}

	public function subtract($id, $subtractQuantity){

		try {

			$sql = "UPDATE schedules_x_locations SET surplus=surplus-:quantity WHERE id=:id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();


			$query = $connection->prepare($sql);

			$query->bindParam(":id", $id);
			$query->bindParam(":quantity", $subtractQuantity);

			$query->execute();

			return true;
			
		} catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}
	}

	public function map($objects)
	{

		$locations = is_array($objects) ? $objects : [];
		return array_map(function($p){
			return new Location($p['id'],$p['name'],null,null,null);
		}, $locations);
	}

	public function mapByDate($objects)
	{

		$locations = is_array($objects) ? $objects : [];
		return array_map(function($p){
			return new Location($p['schedules_x_locations.id'],$p['locations.name'],$p['schedules_x_locations.total_quantity'],$p['schedules_x_locations.surplus'],$p['schedules_x_locations.price']);
		}, $locations);
	}

	public function mapByDateOnlyOne($array)
	{

		if(isset($array)){
			$p = $array[0];
			$location = new Location($p['schedules_x_locations.id'],$p['locations.name'],$p['schedules_x_locations.total_quantity'],$p['schedules_x_locations.surplus'],$p['schedules_x_locations.price']);
			return $location;
		}else{
			return null;
		}
	}

	public function mapByDateForEdit($objects)
	{

		$locations = is_array($objects) ? $objects : [];
		return array_map(function($p){
			return new Location($p['locations.id'],$p['locations.name'],$p['schedules_x_locations.total_quantity'],$p['schedules_x_locations.surplus'],$p['schedules_x_locations.price']);
		}, $locations);
	}



}

?>