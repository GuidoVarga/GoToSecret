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

				$conexion = $obj_pdo->connect();

				$sentencia = $conexion->prepare($sql);

				$name=$object->getName();
				
				$sentencia->bindParam(":name", $name);
			
		
				$sentencia->execute();
			
			} catch(PDOException $Exception) {
			
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
			}

		}

		public function get($id){

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

		public function getAll(){

				try {
					$sql = "SELECT * FROM locations";
					
					$obj_pdo = new Connection();

					$connection = $obj_pdo->connect();
					$query = $connection->prepare($sql);

					$query->execute();

					var_dump($query);
					$result=$query->fetchAll();
					var_dump($result);

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
			
			$locations = is_array($objects) ? $objects : [];
			return array_map(function($p){
				return new Location($p['locations.id'],$p['locations.name'],null,null,null);
			}, $locations);
		}

		public function mapByDate($objects)
		{
			
			$locations = is_array($objects) ? $objects : [];
			return array_map(function($p){
				return new Location($p['schedules_x_locations.id'],$p['locations.name'],$p['schedules_x_locations.total_quantity'],$p['schedules_x_locations.surplus'],$p['schedules_x_locations.price']);
			}, $locations);
		}

	}

?>