<?php namespace dao\dbDao;

require_once(ROOT.'config\Autoload.php');

use config\Autoload as Autoload;
use models\Artist as Artist;
use dao\dbDao\Connection as Connection;
use dao\dbDao\RoleDao as RoleDao;
use \PDOException as PDOException;
use dao\iDao as iDao;
use dao\Singleton as Singleton;

Autoload::start();

class AccountDao extends Singleton implements iDao{

	private $roleDao;

	public function __construct(){
		$this->roleDao = RoleDao::getInstance();
	}


	public function add($object){

		try {

			$sql = "INSERT INTO accounts (id,email,password,token,role_id) VALUES (null,:email,:password,:token,:role_id)";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);


			$email=$object->getEmail();
			$password =$object->getPassword();
			$token =$object->getFbToken();
			$role_id = $object->getRole();


			$query->bindParam(":email", $email);
			$query->bindParam(":password", $password);
			$query->bindParam(":token", $token);
			$query->bindParam(":role_id", $role_id);
			
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

			return $this->map($result);

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