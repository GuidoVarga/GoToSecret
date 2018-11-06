<?php namespace dao\dbDao;

	require_once(ROOT.'config\Autoload.php');

	use config\Autoload as Autoload;
	use models\Artist as Artist;
	use dao\dbDao\ArtistDao as ArtistDao;
	use dao\dbDao\Connection as Connection;
	use \PDOException as PDOException;
	use dao\iDao as iDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class DateDao extends Singleton implements iDao{


		public function add($object){

				try {


				$sql = "INSERT INTO dates (id,artist_id,`date`,start_hour,finish_hour,calendar_id,date_category_id,place_id) VALUES (null,:artist_id,:`date`,:start_hour,:finish_hour,:calendar_id, :date_category_id,:place_id)";
				
				$obj_pdo = new Connection();

				$conexion = $obj_pdo->connect();

				$sentencia = $conexion->prepare($sql);
		

				$artistId = $object->getArtist()->getId();
				$date = $object->getDate();
				$startHour = $object->getStartHour();
				$finishHour = $object->getFinishHour();
				$calendarId = 1;
				$dateCategoryId = 1;
				$placeId = $object->getPlace()->getId();
				

				$sentencia->bindParam(":artist_id", $artistId);
				$sentencia->bindParam(":date", $date);
				$sentencia->bindParam(":start_hour", $startHour);
				$sentencia->bindParam(":finish_hour", $finishHour);
				$sentencia->bindParam(":place_id", $placeId);
		
				$sentencia->execute();
			
			} catch(PDOException $Exception) {
			
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
			}
		}

		public function get($id){

		}

		public function getAllByEventId($id){

			try {
					$sql = "SELECT * FROM dates INNER JOIN artists ON artists.id = dates.artist_id INNER JOIN places ON places.id = dates.place_id WHERE dates.event_id = id";
					
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

		public function getAll(){

				try {
					$sql = "SELECT * FROM dates";
					
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
			
			$artists = is_array($objects) ? $objects : [];
			return array_map(function($p){
				return new Artist($p['id'],$p['name'],$p['description']);
			}, $artists);
		}

	}

?>