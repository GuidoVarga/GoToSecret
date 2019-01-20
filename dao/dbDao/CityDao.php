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

	class CityDao extends Singleton implements iDao{


		public function add($object){

				try {

				$sql = "INSERT INTO cities (id,name) VALUES (null,:name)";
				
				$obj_pdo = new Connection();

				$connection = $obj_pdo->connect();

				$query = $connection->prepare($sql);

				$name=$object->getName();
			
				
				$query->bindParam(":name", $name);
			
			
		
				$query->execute();
				return $connection->lastInsertId();
			
			} catch(PDOException $Exception) {
			
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
			}



		}

		public function get($id){
			try {
					$sql = "SELECT * FROM cities WHERE id = :id";
					
					$obj_pdo = new Connection();

					$connection = $obj_pdo->connect();
				
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
					$sql = "SELECT * FROM cities";
					$obj_pdo = new Connection();

					$connection = $obj_pdo->connect();
					
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
				$sql="DELETE FROM cities WHERE id=:id";
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

			$sql = "UPDATE cities SET name=:name WHERE id=:id";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();


			$query = $connection->prepare($sql);
			$id=$object->getId();
			$name=$object->getName();
			
			$query->bindParam(":id", $id);
			$query->bindParam(":name", $name);
		
			$query->execute();
			
		} catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}


	} 

		public function map($objects)
		{
			
			$cities = is_array($objects) ? $objects : [];
			return array_map(function($p){
				return new City($p['id'],$p['name']);
			}, $cities);
		}

		public function mapOnlyOne($array){

			if(isset($array)){
				$p = $array[0];
				return new City($p['id'],$p['name']);
			}
		}

	}

?>