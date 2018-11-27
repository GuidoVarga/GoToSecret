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

				$sql = "INSERT INTO places (id,name,address,city_id) VALUES (null,:name,:address,:city_id)";
				
				$obj_pdo = new Connection();

				$connection = $obj_pdo->connect();

				$query = $connection->prepare($sql);

				$name=$object->getName();
				$address=$object->getAddress();
				$cityId=$object->getCity()->getId();
				
				$query->bindParam(":name", $name);
				$query->bindParam(":address", $address);
				$query->bindParam(":city_id", $cityId);
			
		
				$query->execute();
				return $connection->lastInsertId();
			
			} catch(PDOException $Exception) {
			
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
			}



		}

		public function get($id){
			try {

				
					$sql = "SELECT * FROM places INNER JOIN cities ON cities.id=places.city_id WHERE places.id=:id";
					
					$obj_pdo = new Connection();

					$connection = $obj_pdo->connect();
					$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
					$query = $connection->prepare($sql);
					$query->bindParam(":id", $id);
					$query->execute();	

			
					$result=$query->fetchAll();
				

					return $this->mapOnlyOne($result);
				
			} catch(PDOException $Exception) {
			
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
			}

		}

		public function getAll(){

				try {
					$sql = "SELECT * FROM places INNER JOIN cities ON cities.id=places.city_id";
					
					$obj_pdo = new Connection();

					$connection = $obj_pdo->connect();
					$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
					$query = $connection->prepare($sql);

					$query->execute();

					$result=$query->fetchAll();

					return $this->map($result);
				
			} catch(PDOException $Exception) {
			
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
			}

		}

		public function delete($id){
			try {
				$sql="DELETE FROM places WHERE id=:id";
				$obj_pdo = new Connection();
			

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

			$sql = "UPDATE places SET name=:name, address=:address, city_id=:city_id WHERE id=:id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();


			$query = $connection->prepare($sql);
			$id=$object->getId();
				$name=$object->getName();
				$address=$object->getAddress();
				$cityId=$object->getCity()->getId();
				
				$query->bindParam(":id",$id);
				$query->bindParam(":name", $name);
				$query->bindParam(":address", $address);
				$query->bindParam(":city_id", $cityId);
		
			$query->execute();
			
		} catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}


	}

		public function map($objects)
		{
			
			$places = is_array($objects) ? $objects : [];
			return array_map(function($p){
				return new Place($p['places.id'],$p['places.name'],$p['places.address'], new City($p['cities.id'],$p['cities.name']));
			}, $places);
		}

		public function mapOnlyOne($array){

			if(isset($array)){
				$p = $array[0];
				return new Place($p['places.id'],$p['places.name'],$p['places.address'], new City($p['cities.id'],$p['cities.name']));
			}

		}

	}

?>