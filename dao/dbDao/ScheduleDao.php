<?php namespace dao\dbDao;

require_once(ROOT.'config\Autoload.php');

use config\Autoload as Autoload;
use models\Schedule as Schedule;
use dao\dbDao\Connection as Connection;
use dao\dbDao\SubEventDao as SubEventDao;
use \PDOException as PDOException;
use dao\iDao as iDao;
use dao\Singleton as Singleton;
use \PDO as PDO;

Autoload::start();

class ScheduleDao extends Singleton implements iDao{

	private $subEventDao;
	private $placeDao;
	private $locationDao;

	public function __construct(){
		$this->subEventDao = SubEventDao::getInstance();
		$this->placeDao = PlaceDao::getInstance();
		$this->locationDao = LocationDao::getInstance();
	}

	public function add($object){

		try {

			$sql = "INSERT INTO schedules (id,day,event_id,place_id) VALUES (null,:day,:event_id,:place_id)";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);

			$day=$object->getDay();
			$placeId=$object->getPlace()->getId();

			$query->bindParam(":day", $day);
			$query->bindParam(":event_id", $eventId);
			$query->bindParam(":place_id", $placeId);
			

			$query->execute();
			return $connection->lastInsertId();
			
		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}
	}

	public function save($schedule,$eventId){
		try {

			$sql = "INSERT INTO schedules (id,day,event_id,place_id) VALUES (null,:day,:event_id,:place_id)";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);

			$day=$schedule->getDay();
			$placeId=$schedule->getPlace()->getId();

			$query->bindParam(":day", $day);
			$query->bindParam(":event_id", $eventId);
			$query->bindParam(":place_id", $placeId);
			

			$query->execute();
			return $connection->lastInsertId();
			
		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}


	}

	public function get($id){

		try {
			$sql = "SELECT * FROM schedules WHERE event_id = :id";

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

	public function getById($id){

		try {
			$sql = "SELECT * FROM schedules WHERE id = :id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);

			$query->bindParam(":id", $id);
			
			$query->execute();

			$result=$query->fetchAll();

			return $this->mapOnlyOne($result);

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function getByIdForEdit($id){

		try {
			$sql = "SELECT * FROM schedules WHERE id = :id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);

			$query->bindParam(":id", $id);
			
			$query->execute();

			$result=$query->fetchAll();

			return $this->mapOnlyOneForEdit($result);

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function getOnlySchedule($id){

		try {
			$sql = "SELECT * FROM schedules WHERE id = :id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);

			$query->bindParam(":id", $id);
			
			$query->execute();

			$result=$query->fetchAll();

			return $this->mapOnlySchedule($result);

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function getAll(){

		try {
			$sql = "SELECT * FROM artists";

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

		$sql="DELETE FROM schedules WHERE id=:id";
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

	public function update($object){

		try {

			$sql = "UPDATE schedules SET day=:day, place_id=:place_id WHERE id=:id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();


			$query = $connection->prepare($sql);
			$id=$object->getId();
			$day=$object->getDay();
			$placeId=$object->getPlace()->getId();

		

			$query->bindParam(":id", $id);
			$query->bindParam(":day", $day);
			$query->bindParam(":place_id", $placeId);

			$query->execute();
			
		} catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}


	} 

	public function map($objects)
	{

		$schedules = is_array($objects) ? $objects : [];
		return array_map(function($p){

			$schedule = new Schedule($p['id'],$p['day'],$this->placeDao->get($p['place_id']));

			$schedule->setSubEvents($this->subEventDao->getByScheduleId($schedule->getId()));

			$schedule->setLocations($this->locationDao->getByScheduleId($schedule->getId()));
			return $schedule;
		}, $schedules);
	}


	public function mapOnlyOne($array){

		if(isset($array)){
			$p = $array[0];
			$schedule = new Schedule($p['id'],$p['day'],$this->placeDao->get($p['place_id']));

			$schedule->setSubEvents($this->subEventDao->getByScheduleId($schedule->getId()));

			$schedule->setLocations($this->locationDao->getByScheduleId($schedule->getId()));
			return $schedule;
		}

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

	public function mapOnlySchedule($array) {

		if(isset($array)){
			$p = $array[0];
			$schedule = new Schedule($p['id'],$p['day'],$this->placeDao->get($p['place_id']));
			return $schedule;
		}

	}

}

?>