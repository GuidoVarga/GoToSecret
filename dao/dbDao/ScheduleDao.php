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

			$sql = "INSERT INTO schedules (id,day,event_id) VALUES (null,:day,1)";

			$obj_pdo = new Connection();

			$conexion = $obj_pdo->connect();

			$sentencia = $conexion->prepare($sql);

			$day=$object->getDay();

			$sentencia->bindParam(":day", $day);
			

			$sentencia->execute();
			
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

	}

	public function update($object){

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

}

?>