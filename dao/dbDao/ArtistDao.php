<?php namespace dao\dbDao;

require_once(ROOT.'config\Autoload.php');

use config\Autoload as Autoload;
use models\Artist as Artist;
use dao\dbDao\Connection as Connection;
use \PDOException as PDOException;
use dao\iDao as iDao;
use dao\Singleton as Singleton;

Autoload::start();

class ArtistDao extends Singleton implements iDao{


	public function add($object){

		try {

			$sql = "INSERT INTO artists (id,name,img,description) VALUES (null,:name,:img,:description)";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);


			$name=$object->getName();
			$img=$object->getImg();
			$description=$object->getDescription();


			$query->bindParam(":name", $name);
			$query->bindParam(":img", $img);
			$query->bindParam(":description", $description);
			

			$query->execute();
			return $connection->lastInsertId();
			
		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function get($id){

		try {
			$sql = "SELECT * FROM artists WHERE id = :id";

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
			$sql = "SELECT * FROM artists";

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
			$sql="DELETE FROM artists WHERE id=:id";
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

			$sql = "UPDATE artists SET name=:name, description=:description,img=:img WHERE id=:id ";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();


			$query = $connection->prepare($sql);
			$id=$object->getId();
			$name=$object->getName();
			$img=$object->getImg();
			$description=$object->getDescription();

		

			$query->bindParam(":id", $id);
			$query->bindParam(":name", $name);
			$query->bindParam(":img", $img);
			$query->bindParam(":description", $description);

			$query->execute();
			
		} catch(PDOException $Exception) {
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		}


	} 

	public function map($objects)
	{

		$artists = is_array($objects) ? $objects : [];
		return array_map(function($p){
			return new Artist($p['id'],$p['name'],$p['img'],$p['description']);
		}, $artists);
	}

	public function mapOnlyOne($array){

		if(isset($array)){
			$a = $array[0];
			return new Artist($a['id'],$a['name'],$a['img'],$a['description']);
		}

	}

}

?>