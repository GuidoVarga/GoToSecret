<?php namespace dao\dbDao;

	require_once(ROOT.'config\Autoload.php');

	use config\Autoload as Autoload;
	use models\Place as Place;
	use dao\dbDao\Connection as Connection;
	use \PDOException as PDOException;
	use dao\iDao as iDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class PlaceDao extends Singleton implements iDao{


		public function add($object){

				try {

				$sql = "INSERT INTO places (id,name,address) VALUES (null,:name,:address)";
				
				$obj_pdo = new Connection();

				$conexion = $obj_pdo->connect();

				$sentencia = $conexion->prepare($sql);

				$name=$object->getName();
				$address=$object->getAddress();
				
				$sentencia->bindParam(":name", $name);
				$sentencia->bindParam(":address", $address);
			
		
				$sentencia->execute();
			
			} catch(PDOException $Exception) {
			
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
			}



		}

		public function get($id){

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
				return new Place($p['id'],$p['name'],$p['address'], null );
			}, $places);
		}

	}

?>