<?php namespace dao\dbDao;

	require_once(ROOT.'config\Autoload.php');

	use config\Autoload as Autoload;
	use models\SubEvent as SubEvent;
	use dao\dbDao\ArtistDao as ArtistDao;
	use dao\dbDao\PlaceDao as PlaceDao;
	use dao\dbDao\LocationDao as LocationDao;
	use dao\dbDao\Connection as Connection;
	use \PDOException as PDOException;
	use dao\iDao as iDao;
	use dao\Singleton as Singleton;
	use \PDO as PDO;

	Autoload::start();

	class SubEventDao extends Singleton implements iDao{

		private $artistDao;
	

		public function __construct(){
			$this->artistDao = ArtistDao::getInstance();
		}

		public function add($object){
/*
				try {

						
				$sql = "INSERT INTO subEvents (id,artist_id,`subEvent`,start_hour,finish_hour,calendar_id,subEvent_category_id,place_id) VALUES (null,:artist_id,:`subEvent`,:start_hour,:finish_hour,:calendar_id, :subEvent_category_id,:place_id)";
				
				$obj_pdo = new Connection();

				$conexion = $obj_pdo->connect();

				$sentencia = $conexion->prepare($sql);
		

				$artistId = $object->getArtist()->getId();
				$subEvent = $object->getSubEvent();
				$startHour = $object->getStartHour();
				$finishHour = $object->getFinishHour();
				$calendarId = 1;
				$subEventCategoryId = 1;
				$placeId = $object->getPlace()->getId();
				

				$sentencia->bindParam(":artist_id", $artistId);
				$sentencia->bindParam(":subEvent", $subEvent);
				$sentencia->bindParam(":start_hour", $startHour);
				$sentencia->bindParam(":finish_hour", $finishHour);
				$sentencia->bindParam(":place_id", $placeId);
		
				$sentencia->execute();
			
			} catch(PDOException $Exception) {
			
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
			}
			*/
		}

		public function get($id){

		}

		public function getByScheduleId($id){

			try {
					$sql = "SELECT * FROM sub_events WHERE schedule_id = :id";
					
					$obj_pdo = new Connection();

					$connection = $obj_pdo->connect();
					$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
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
					$sql = "SELECT * FROM sub_events";
					
					$obj_pdo = new Connection();

					$connection = $obj_pdo->connect();
					$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
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
			
			$subEvents = is_array($objects) ? $objects : [];
			return array_map(function($p){
				$subEvent = new SubEvent($p['sub_events.id'],$this->artistDao->get($p['sub_events.artist_id']),$p['sub_events.start_hour'],$p['sub_events.finish_hour']);

				return $subEvent;
			}, $subEvents);
		}

	}

?>