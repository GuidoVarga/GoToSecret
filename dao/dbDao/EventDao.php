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
			$sql = "INSERT INTO events (id,name,description,img,event_category_id) VALUES (null,:name,:description,:img,:event_category_id)";
			$obj_pdo = new Connection();
			$connection = $obj_pdo->connect();
			$query = $connection->prepare($sql);

			$name=$object->getName();
			$description=$object->getDescription();
			$img=$object->getImg();
			$categoryId=$object->getEventCategory()->getId();

			$query->bindParam(":name", $name);
			$query->bindParam(":description", $description);
			$query->bindParam(":img", $img);
			$query->bindParam(":event_category_id", $categoryId);

			$query->execute();

			return $connection->lastInsertId();
		
		} catch(PDOException $Exception) {	
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}
	}

	public function get($id){

		try {
			$sql = "SELECT * FROM events WHERE id=:id";

			/*

			$sql= "SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') as fecha FROM pedidos LEFT JOIN tipo_cerveza ON tipo_cerveza.id_tipo_cerveza=pedidos.id_tipo_cerveza LEFT JOIN tipo_envase ON tipo_envase.id_tipo_envase=pedidos.id_tipo_envase LEFT JOIN tipo_estado ON tipo_estado.id_tipo_estado=pedidos.id_tipo_estado LEFT JOIN sucursales ON sucursales.id_sucursal=pedidos.id_sucursal LEFT JOIN cuentas ON cuentas.id_cuenta=pedidos.id_cuenta LEFT JOIN clientes ON clientes.id_cuenta=cuentas.id_cuenta ";
			*/

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
		
			$query = $connection->prepare($sql);
			$query->bindParam(":id", $id);

			$query->execute();

			$result=$query->fetchAll();
			return $this->mapOnlyOne($result);

		} 
		catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}

	public function getOnlyWithCategory($id){

		try {
			$sql = "SELECT * FROM events WHERE id=:id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
		
			$query = $connection->prepare($sql);
			$query->bindParam(":id", $id);

			$query->execute();

			$result=$query->fetchAll();
			return $this->mapOnlyOneWithoutSchedules($result);

		} 
		catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}

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

			return $this->map($result);

		} 
		catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}

	public function getAllWithCategories(){

		try {
			$sql = "SELECT * FROM events";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
		
			$query = $connection->prepare($sql);

			$query->execute();

			$result=$query->fetchAll();

			return $this->mapWithoutSchedules($result);

		} 
		catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}

	public function getEventByArtist($id){
		try{
			$sql = "SELECT * FROM events INNER JOIN schedules ON schedules.event_id = events.id INNER JOIN sub_events ON sub_events.schedule_id = schedules.id INNER JOIN artists ON artists.id = sub_events.artist_id WHERE artists.id = :id";


			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
		
			$query = $connection->prepare($sql);
			$query->bindParam(":id", $id);

			$query->execute();

			$result=$query->fetchAll();
			return $this->mapByArtist($result);
		}
		catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}
	}


	public function getAllWithLimit($limit){

		try {
			$sql = "SELECT * FROM events ORDER BY id DESC LIMIT $limit";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
	
			$query = $connection->prepare($sql);
			//$query->bindParam(":num", $limit);
			$query->execute();

			$result=$query->fetchAll();	

			return $this->map($result);

		} 
		catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}

	}

	public function delete($id){

				$sql="DELETE FROM events WHERE id=:id";
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

			$sql = "UPDATE events SET name=:name, description=:description,img=:img, event_category_id=:event_category_id WHERE id=:id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();


			$query = $connection->prepare($sql);
			$id=$object->getId();
			$name=$object->getName();
			$img=$object->getImg();
			$description=$object->getDescription();
			$eventCategoryId=$object->getEventCategory()->getId();

		

			$query->bindParam(":id", $id);
			$query->bindParam(":name", $name);
			$query->bindParam(":description", $description);
			$query->bindParam(":img", $img);
			$query->bindParam(":event_category_id", $eventCategoryId);

			$query->execute();
			
		} catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}


	} 	
	
	public function map($objects)
	{
		
		$events = is_array($objects) ? $objects: [];
	
		return array_map(function($e){

			$event = new Event($e['id'],$e['name'],'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur condimentum, ex vel pretium vehicula, mauris erat tristique metus, et ultricies sapien mi sit amet lectus. Nulla egestas sollicitudin lectus et porttitor.',$e['img'],$this->eventCategoryDao->get($e['event_category_id']));
			$event->setSchedules($this->scheduleDao->get($event->getId()));
			return $event;

		}, $events);

	}


	public function mapWithoutSchedules($objects)
	{
		
		$events = is_array($objects) ? $objects: [];
	
		return array_map(function($e){

		$event = new Event($e['id'],$e['name'],$e['description'],$e['img'],$this->eventCategoryDao->get($e['event_category_id']));

			return $event;

		}, $events);

	}

	public function mapOnlyOne($array){

		if(isset($array)){
			$e = $array[0];
			$event = new Event($e['id'],$e['name'],$e['description'],$e['img'],$this->eventCategoryDao->get($e['event_category_id']));
			$event->setSchedules($this->scheduleDao->get($event->getId()));

			return $event;
		}

	}

	public function mapByArtist($objects){
		$events = is_array($objects) ? $objects : [];
		$array = array();

		foreach ($events as $e) {

			$event = new Event($e['events.id'],$e['events.name'],$e['events.description'],$e['events.img'],$this->eventCategoryDao->get($e['events.event_category_id']));
			if(!empty($array)){
				$lastEvent = array_values(array_slice($array, -1))[0];
				if($lastEvent->getId()!=$event->getId()){
					array_push($array, $event);
				}
			}else{
				array_push($array, $event);
			}
		}
		return $array;
	}

	public function mapOnlyOneWithoutSchedules($array){

		if(isset($array)){
			$e = $array[0];
			$event = new Event($e['id'],$e['name'],$e['description'],$e['img'],$this->eventCategoryDao->get($e['event_category_id']));

			return $event;
		}

	}

}


?>