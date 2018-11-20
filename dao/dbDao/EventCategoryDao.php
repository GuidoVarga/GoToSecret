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

			$sql = "INSERT INTO event_categories (id,name) VALUES (null,:name)";

			$obj_pdo = new Connection();

			$conexion = $obj_pdo->connect();

			$query = $conexion->prepare($sql);

			$name=$object->getName();

			$query->bindParam(":name", $name);
			

			$query->execute();
			
		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function get($id){

		try {
			$sql = "SELECT * FROM event_categories WHERE id = :id";

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
			$sql = "SELECT * FROM event_categories";

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

		$eventCategories = is_array($objects) ? $objects : [];
		return array_map(function($p){
			return new EventCategory($p['id'],$p['name']);
		}, $eventCategories);
	}

}

?>