<?php namespace dao\dbDao;

require_once(ROOT.'config\Autoload.php');

use config\Autoload as Autoload;
use models\User as User;
use models\Account as Account;
use models\Role as Role;
use dao\dbDao\Connection as Connection;
use dao\dbDao\AccountDao as AccountDao;
use \PDOException as PDOException;
use dao\iDao as iDao;
use dao\Singleton as Singleton;
use \PDO as PDO;

Autoload::start();

class UserDao extends Singleton implements iDao{

	private $accountDao;

	public function __construct(){
		$this->accountDao = AccountDao::getInstance();
	}


	public function add($object){

		try {

			$sql = "INSERT INTO users (id,name,description) VALUES (null,:name,:description)";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);


			$name=$object->getName();
			$description=$object->getDescription();


			$query->bindParam(":name", $name);
			$query->bindParam(":description", $description);
			

			$query->execute();
			
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

	public function getByEmail($email){

		try {
			$sql = "SELECT * FROM accounts INNER JOIN users ON accounts.id = users.account_id INNER JOIN roles ON accounts.role_id=roles.id WHERE email = :email";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query = $connection->prepare($sql);
			$query->bindParam(":email", $email);
			$query->execute();

			$result=$query->fetchAll();

			var_dump($result);
			return $this->map($result);

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}

	public function delete($id){

	}

	public function update($object){

	} 

	public function getPasswordByEmail($email){
			
			try{

				$sql= "SELECT password FROM accounts WHERE accounts.email = :email";
				
				$obj_pdo = new Connection();

				$connection = $obj_pdo->connect();
				$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
				$query=$connection->prepare($sql);

				$query->bindParam(":email",$email);
	
				$query->execute();

				$resultado=$query->fetchAll();
				
				return $resultado[0][0];
				
			}
			catch(PDOException $Exception) {
			
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
			}	
	}

	public function map($objects)
	{

		$users = is_array($objects) ? $objects : [];
		return array_map(function($p){
			return new User($p['users.id'],$p['users.name'],$p['users.last_name'],new Account($p['accounts.id'],$p['accounts.email'],$p['accounts.password'],$p['accounts.token'], new Role($p['roles.id'],$p['roles.description'])));
		}, $users);
	}

}

?>