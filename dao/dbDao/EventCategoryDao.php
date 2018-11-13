<?php namespace dao\dbDao;

	require_once(ROOT.'config\Autoload.php');

	use config\Autoload as Autoload;
	use models\EventCategory as EventCategory;
	use dao\dbDao\Connection as Connection;
	use \PDOException as PDOException;
	use dao\iDao as iDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class EventCategoryDao extends Singleton implements iDao{


		public function add($object){

				try {

				$sql = "INSERT INTO date_categories (id,name) VALUES (null,:name)";
				
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

		public function getAll(){

				try {
					$sql = "SELECT * FROM date_categories";
					
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
			
			$eventCategories = is_array($objects) ? $objects : [];
			return array_map(function($p){
				return new EventCategory($p['id'],$p['name']);
			}, $eventCategories);
		}

	}

?>