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

class EventDao extends Singleton implements iDao{

	private $scheduleDao;
	private $eventCategoryDao;

	public function __construct(){
			$this->scheduleDao = ScheduleDao::getInstance();
			$this->eventCategoryDao = EventCategoryDao::getInstance();
	}

	public function add($object){
		
		try {
			$sql = "INSERT INTO events (id,name,event_category_id) VALUES (null,:name,:event_category_id)";
			$obj_pdo = new Connection();
			$conexion = $obj_pdo->connect();
			$query = $conexion->prepare($sql);

			$name=$object->getName();
			$description=$object->getDescription();
			$img=$object->getImg();
			$id=1;
			$query->bindParam(":name", $name);
			$query->bindParam(":event_category_id", $id);

			$query->execute();

			return $conexion->lastInsertId();
		
		} catch(PDOException $Exception) {	
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}
	}

	public function get($id){

		try {
			$sql = "SELECT * FROM events left JOIN event_categories ON event_categories.id = events.event_category_id left JOIN schedules ON schedules.id_event = events.id  left JOIN dates ON dates.schedule_id = schedules.id left JOIN dates_x_locations ON dates_x_locations.date_id=dates.id left JOIN locations ON locations.id=dates_x_locations.location_id left JOIN places ON places.id=dates.place_id left JOIN cities ON cities.id=places.city_id left JOIN artists ON artists.id=dates.artist_id WHERE events.id=:id";

			/*

				$sql = "SELECT * FROM events left JOIN event_categories ON event_categories.id = events.event_category_id left JOIN calendars ON calendars.id = events.calendar_id  left JOIN dates ON dates.calendar_id = calendars.id left JOIN dates_x_locations ON dates_x_locations.date_id=dates.id left JOIN locations ON locations.id=dates_x_locations.location_id left JOIN places ON places.id=dates.place_id left JOIN cities ON cities.id=places.city_id left JOIN artists ON artists.id=dates.artist_id";

			$sql= "SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') as fecha FROM pedidos LEFT JOIN tipo_cerveza ON tipo_cerveza.id_tipo_cerveza=pedidos.id_tipo_cerveza LEFT JOIN tipo_envase ON tipo_envase.id_tipo_envase=pedidos.id_tipo_envase LEFT JOIN tipo_estado ON tipo_estado.id_tipo_estado=pedidos.id_tipo_estado LEFT JOIN sucursales ON sucursales.id_sucursal=pedidos.id_sucursal LEFT JOIN cuentas ON cuentas.id_cuenta=pedidos.id_cuenta LEFT JOIN clientes ON clientes.id_cuenta=cuentas.id_cuenta ";
			*/

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query = $connection->prepare($sql);
			$query->bindParam(":id", $id);

			$query->execute();

			$result=$query->fetchAll();
			return $result;

		} 
		catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}

	/*
	public function getAll(){

		try {
			$sql = "SELECT * FROM events left JOIN event_categories ON event_categories.id = events.event_category_id left JOIN schedules ON schedules.event_id = events.id  left JOIN dates ON dates.schedule_id = schedules.id left JOIN dates_x_locations ON dates_x_locations.date_id=dates.id left JOIN locations ON locations.id=dates_x_locations.location_id left JOIN places ON places.id=dates.place_id left JOIN cities ON cities.id=places.city_id left JOIN artists ON artists.id=dates.artist_id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query = $connection->prepare($sql);

			$query->execute();

			$result=$query->fetchAll();
			return $result;

			
			https://stackoverflow.com/questions/25258845/ambiguous-field-names-add-table-name-with-fetch-obj
			https://www.w3resource.com/php/pdo/php-pdo.php
			https://stackoverflow.com/questions/15202864/pdo-fetch-class-with-joined-tables
			http://php.net/manual/es/pdo.constants.php
			
		} 
		catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}
	*/

	public function getByDate($date){

		try {
			$sql = "SELECT * FROM artists WHERE id = :id";

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

	public function getByCategory($category){

		try {
			$sql = "SELECT * FROM artists WHERE id = :id";

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
			$sql = "SELECT * FROM events";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
	
			$query = $connection->prepare($sql);

			$query->execute();

			$result=$query->fetchAll();

			return $result;

		} 
		catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}

	public function delete($id){

	}

	public function update($event){

	} 

/*
	public function addEventToArray($array,$e){

		foreach ($array as $event) {

			if($event->getId()==$e->getId()){
				$eDate = $e->getDateByIndex(0);
				$eventDate =$event->getDateById($eDate->getId());
				if( $eventDate == null){
					$event->addDate($e->getDateByIndex(0));
				}else{

					if($eventDate->getLocation(0)->getId() != $eDate->getLocation(0)->getId()){
						$eventDate->addLocation($eDate->getLocation(0));
					} 
				}
				return $array;
			}
		}

		array_push($array,$e);
		return $array;
	}

	
	public function map2($events){

		$array = array();
		foreach ($events as $event) {

			$e = new Event($event['events.id'],$event['events.name'],'description',
							new EventCategory($event['event_categories.id'],$event['event_categories.name']),
							new Schedule($event['schedules.id'],$event['schedules.day'])
						);
			
			$date = new Date($event['dates.id'], new Artist($event['artists.id'], $event['artists.name'], $event['artists.description']) ,$event['dates.start_hour'], $event['dates.finish_hour'], new Place( $event['places.id'],$event['places.name'],$event['places.address'], new City($event['cities.id'],$event['cities.name'])));

			$date->addLocation(new Location($event['locations.id'],$event['locations.name'],$event['dates_x_locations.total_quantity'],$event['dates_x_locations.remament'],$event['dates_x_locations.price']));

			$e->addDate($date);
		
			$array=$this->addEventToArray($array,$e);
		}

		return $array;
	}
*/
		
	
	public function map($objects)
	{
		
		$events = is_array($objects) ? $objects: [];
	
		return array_map(function($e){

			$event = new Event($e['id'],$e['name'],'description',$this->eventCategoryDao->get($e['event_category_id']));
			$event->setSchedules($this->scheduleDao->get($event->getId()));
			return $event;

		}, $events);

	}

}


?>