<?php namespace dao\dbDao;

require_once(ROOT.'config\Autoload.php');
	
use config\Autoload as Autoload;
use models\Event as Event;
use models\EventCategory as EventCategory;
use models\Location as Location;
use models\Artist as Artist;
use models\City as City;
use models\Place as Place;
use models\Calendar as Calendar;
use models\Date as Date;
use dao\dbDao\Connection as Connecction;
use \PDOException as PDOException;
use dao\iDao as iDao;
use dao\Singleton as Singleton;
use \PDO as PDO;

Autoload::start();

class EventDao extends Singleton implements iDao{


	public function add($object){
		
		try {
			$sql = "INSERT INTO events (id,name,description,img) VALUES (null,:name,:description,:img)";
			$obj_pdo = new Connection();
			$conexion = $obj_pdo->connect();
			$sentencia = $conexion->prepare($sql);

			$name=$object->getName();
			$description=$object->getDescription();
			$img=$object->getImg();

			$sentencia->bindParam(":name", $name);
			$sentencia->bindParam(":description", $description);
			$sentencia->bindParam(":img", $img);

			$sentencia->execute();
		
		} catch(PDOException $Exception) {	
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}
	}

	public function get($id){

		try {
			$sql = "SELECT * FROM events left JOIN event_categories ON event_categories.id = events.event_category_id left JOIN calendars ON calendars.id = events.calendar_id  left JOIN dates ON dates.calendar_id = calendars.id left JOIN dates_x_locations ON dates_x_locations.date_id=dates.id left JOIN locations ON locations.id=dates_x_locations.location_id left JOIN places ON places.id=dates.place_id left JOIN cities ON cities.id=places.city_id left JOIN artists ON artists.id=dates.artist_id WHERE events.id=:id";

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

	public function getAll(){

		try {
			$sql = "SELECT * FROM events left JOIN event_categories ON event_categories.id = events.event_category_id left JOIN calendars ON calendars.id = events.calendar_id  left JOIN dates ON dates.calendar_id = calendars.id left JOIN dates_x_locations ON dates_x_locations.date_id=dates.id left JOIN locations ON locations.id=dates_x_locations.location_id left JOIN places ON places.id=dates.place_id left JOIN cities ON cities.id=places.city_id left JOIN artists ON artists.id=dates.artist_id";

			/*

				$sql = "SELECT * FROM events left JOIN event_categories ON event_categories.id = events.event_category_id left JOIN calendars ON calendars.id = events.calendar_id  left JOIN dates ON dates.calendar_id = calendars.id left JOIN dates_x_locations ON dates_x_locations.date_id=dates.id left JOIN locations ON locations.id=dates_x_locations.location_id left JOIN places ON places.id=dates.place_id left JOIN cities ON cities.id=places.city_id left JOIN artists ON artists.id=dates.artist_id";
			  

			$sql= "SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') as fecha FROM pedidos LEFT JOIN tipo_cerveza ON tipo_cerveza.id_tipo_cerveza=pedidos.id_tipo_cerveza LEFT JOIN tipo_envase ON tipo_envase.id_tipo_envase=pedidos.id_tipo_envase LEFT JOIN tipo_estado ON tipo_estado.id_tipo_estado=pedidos.id_tipo_estado LEFT JOIN sucursales ON sucursales.id_sucursal=pedidos.id_sucursal LEFT JOIN cuentas ON cuentas.id_cuenta=pedidos.id_cuenta LEFT JOIN clientes ON clientes.id_cuenta=cuentas.id_cuenta ";
			*/

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query = $connection->prepare($sql);

			$query->execute();

			$result=$query->fetchAll();
			return $result;

			/*
			https://stackoverflow.com/questions/25258845/ambiguous-field-names-add-table-name-with-fetch-obj
			https://www.w3resource.com/php/pdo/php-pdo.php
			https://stackoverflow.com/questions/15202864/pdo-fetch-class-with-joined-tables
			http://php.net/manual/es/pdo.constants.php
			*/
		} 
		catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}


	public function delete($id){

	}

	public function update($object){

	} 

	public function searchEvent($array,$id){
			
		foreach ($array as $event) {
			if($event->getId()==$id){
				return true;
			}
		}
		return false;
	}

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
							new Calendar($event['calendars.id'])
						);
			
			$date = new Date($event['dates.id'], $event['dates.date'], new Artist($event['artists.id'], $event['artists.name'], $event['artists.description']) ,$event['dates.start_hour'], $event['dates.finish_hour'], new Place( $event['places.id'],$event['places.name'],$event['places.address'], new City($event['cities.id'],$event['cities.name'])));

			$date->addLocation(new Location($event['locations.id'],$event['locations.name'],$event['dates_x_locations.total_quantity'],$event['dates_x_locations.remament'],$event['dates_x_locations.price']));

			$e->addDate($date);
		
			$array=$this->addEventToArray($array,$e);
		}

		return $array;
	}

		
	/*
	public function map($objects)
	{
		
		$events = is_array($objects) ? $objects: [];
	
		return array_map(function($e,$events){

			var_dump($events);
			$event = $this->mapEvent($e);

			$event->addLocation(new Location($e['locations.id'],$e['locations.name'],$e['dates_x_locations.total_quantity'],$e['dates_x_locations.remament'],$e['dates_x_locations.price']));
			return $event;
		}, $events);

	}
	*/

}


?>