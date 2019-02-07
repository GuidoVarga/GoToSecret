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

			$sql = "INSERT INTO users (id,name,last_name,account_id) VALUES (null,:name,:last_name,:account_id)";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();

			$query = $connection->prepare($sql);


			$name=$object->getName();
			$last_name=$object->getLastName();
			$account_id=$object->getAccount();


			$query->bindParam(":name", $name);
			$query->bindParam(":last_name", $last_name);
			$query->bindParam(":account_id", $account_id);
			
			

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

	public function getByEmail($email){

		try {
			$sql = "SELECT * FROM accounts INNER JOIN users ON accounts.id = users.account_id INNER JOIN roles ON accounts.role_id=roles.id WHERE accounts.email = :email";

			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query = $connection->prepare($sql);
			$query->bindParam(":email", $email);
			$query->execute();

			$result=$query->fetchAll();
			var_dump($result);
			return $this->mapOnlyOne($result);

		} catch(PDOException $Exception) {
			
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
		}

	}
	

	public function delete($id){

	}

	public function update($object){

	} 

	public function getAccountByEmail($email){
			
		try{

			$sql= "SELECT * FROM accounts WHERE accounts.email = :email";
			
			$obj_pdo = new Connection();

			$connection = $obj_pdo->connect();
			$connection->setAttribute(PDO::ATTR_FETCH_TABLE_NAMES,true);
			$query=$connection->prepare($sql);

			$query->bindParam(":email",$email);

			$query->execute();

			$resultado=$query->fetchAll();

			if($resultado){
			return $resultado[0][0];
			}else{
				return null;
			}	
			
		}
		catch(PDOException $Exception) {
		
			throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
		
		}	
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

				if($resultado){
				return $resultado[0][0];
				}else{
					return null;
				}	
				
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

	public function mapOnlyOne($array)
	{
		if(isset($array)){
			$p = $array[0];

			$user = new User($p['users.id'],$p['users.name'],$p['users.last_name'],new Account($p['accounts.id'],$p['accounts.email'],$p['accounts.password'],$p['accounts.token'], new Role($p['roles.id'],$p['roles.description'])));
			return $user;

		}
		
	}

}

?>