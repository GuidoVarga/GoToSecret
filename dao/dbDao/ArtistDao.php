<?php namespace dao\dbDao;

	require_once(ROOT.'config\Autoload.php');
	
	use config\Autoload as Autoload;
	use models\Artist as Artist;
	use dao\dbDao\Connection as Connecction;
	use \PDOException as PDOException;
	use dao\iDao as iDao;

	Autoload::start();

	class ArtistDao implements iDao{


		public function add($object){

				try {


				$sql = "INSERT INTO artists (id,name,description,img) VALUES (null,:name,:description,:img)";
				
				$obj_pdo = new Connection();

				$conexion = $obj_pdo->connect();

				$sentencia = $conexion->prepare($sql);
		

				$name=$object->getName();
				$description=$object->getDescription();
				$img=$object->getImg();

				$sentencia->bindParam(":name", $name);
				$sentencia->bindParam(":description", $description);
				$sentencia->bindParam(":img", $img);
				
		
				$sentencia->execute();
			
			} catch(PDOException $Exception) {
			
				throw new MyDatabaseException( $Exception->getMessage( ) , $Exception->getCode( ) );
			
			}



		}

		public function get($id){

		}

		public function delete($id){

		}

		public function update($object){

		} 







	}








?>