<?php namespace dao\dbDao;

	require_once(ROOT.'config\Autoload.php');
	
	use config\Autoload as Autoload;
	use models\Event as Event;
	use models\Location as Location;
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

		}

	public function getAll(){

	try {
		$sql = "SELECT * FROM events left JOIN events_x_locations ON events_x_locations.event_id=events.id left JOIN locations ON locations.id=events_x_locations.location_id ";

			/*

			

			left JOIN places ON places.id=events.place_id left JOIN cities ON cities.id=places.city_id left JOIN event_categories ON event_categories.id = events.event_category_id left JOIN calendars ON calendars.id = events.calendar_id left JOIN dates ON dates.calendar_id = calendars.id left JOIN artists ON artists.id=dates.artist_id



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



		
	} catch(PDOException $Exception) {
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

		public function map2($events){

			$array = array();

			foreach ($events as $event) {
				if(!$this->searchEvent($array,$event['events.id'])){
					$e = new Event($event['events.id'],$event['events.name'],'d','ec','place','calendar');

					$e->addLocation(new Location($event['locations.id'],$event['locations.name'],$event['events_x_locations.total_quantity'],$event['events_x_locations.remament'],$event['events_x_locations.price']));


					array_push($array, $e);
				}
				

				
			}

			//return $event= new Event($e['events.id'],$e['events.name'],'d','place','category','calendar');
			return $array;
		}

		
		
		public function map($objects)
		{
			
			$events = is_array($objects) ? $objects: [];
		
			return array_map(function($e,$events){

				var_dump($events);
				$event = $this->mapEvent($e);

				$event->addLocation(new Location($e['locations.id'],$e['locations.name'],$e['events_x_locations.total_quantity'],$e['events_x_locations.remament'],$e['events_x_locations.price']));
				return $event;
			}, $events);

			}

		}


?>