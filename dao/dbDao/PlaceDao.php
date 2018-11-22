<?php namespace dao\dbDao;

	require_once(ROOT.'config\Autoload.php');

	use config\Autoload as Autoload;
	use models\Place as Place;
	use models\City as City;
	use dao\dbDao\Connection as Connection;
	use \PDOException as PDOException;
	use dao\iDao as iDao;
	use dao\Singleton as Singleton;
	use \PDO as PDO;

	Autoload::start();

	class PlaceDao extends Singleton implements iDao{


		public function add($object){

				try {

				$sql = "INSERT INTO places (id,name,address) VALUES (null,:name,:address)";
				
				$obj_pdo = new Connection();

				$connection = $obj_pdo->connect();

				$query = $connection->prepare($sql);

				$name=$object->getName();
				$address=$object->getAddress();
				
				$query->bindParam(":name", $name);
				$query->bindParam(":address", $address);
			
		
				$query->execute();
				return $connection->lastInsertId();
			
			} catch(PDOException $Exception) {
			
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
			}



		}

		public function get($id){
			try {
					$sql = "SELECT * FROM places INNER JOIN cities ON cities.id=places.id WHERE places.id=:id";
					
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
					$sql = "SELECT * FROM places INNER JOIN cities ON cities.id=places.id";
					
					$obj_pdo = new Connection();

					$connection = $obj_pdo->connect();
					$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
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
			
			$places = is_array($objects) ? $objects : [];
			return array_map(function($p){
				return new Place($p['places.id'],$p['places.name'],$p['places.address'], new City($p['cities.id'],$p['cities.name']));
			}, $places);
		}

	}

?>