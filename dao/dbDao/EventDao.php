<?php namespace dao\dbDao;

	require_once(ROOT.'config\Autoload.php');
	
	use config\Autoload as Autoload;
	use models\Event as Event;
	use dao\dbDao\Connection as Connecction;
	use \PDOException as PDOException;
	use dao\iDao as iDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class EventDao extends Singleton implements iDao{


		public function add($object){

				try {


				$sql = "INSERT INTO events (id,name,description,img) VALUES (null,:name,:description,:img)";
				
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

		public function getAll(){

				try {
					$sql = "SELECT * FROM events INNER JOIN places ON places.id=events.place_id INNER JOIN event_categories ON event_categories.id = events.event_category_id INNER JOIN calendars ON calendars.id = events.calendar_id INNER JOIN dates ON dates.calendar_id = calendars.id";

					/*
					$sql= "SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') as fecha FROM pedidos LEFT JOIN tipo_cerveza ON tipo_cerveza.id_tipo_cerveza=pedidos.id_tipo_cerveza LEFT JOIN tipo_envase ON tipo_envase.id_tipo_envase=pedidos.id_tipo_envase LEFT JOIN tipo_estado ON tipo_estado.id_tipo_estado=pedidos.id_tipo_estado LEFT JOIN sucursales ON sucursales.id_sucursal=pedidos.id_sucursal LEFT JOIN cuentas ON cuentas.id_cuenta=pedidos.id_cuenta LEFT JOIN clientes ON clientes.id_cuenta=cuentas.id_cuenta ";
					*/
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
			
			
		}







	}








?>