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


				$sql = "INSERT INTO artists (id,name,description) VALUES (null,:name,:description)";
				
				$obj_pdo = new Connection();

				$conexion = $obj_pdo->connect();

				$sentencia = $conexion->prepare($sql);
		

				$name=$object->getName();
				$description=$object->getDescription();
				

				$sentencia->bindParam(":name", $name);
				$sentencia->bindParam(":description", $description);
			
		
				$sentencia->execute();
			
			} catch(PDOException $Exception) {
			
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
			}



		}

		public function get($id){

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