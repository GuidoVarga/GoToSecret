<?php namespace dao\dbDao;



    class Connection {
        
        public function connect() {
        	try {
        		return new \PDO("mysql:host=".HOST."; dbname=".DB_NAME, USER, PASS);
        	} catch (\PDOException $e) {
				die("Database connection error: " . $e->getMessage());
			}
            
        }
    }
?>