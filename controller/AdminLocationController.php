<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	

	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\Location as Location;
	use dao\dbDao\LocationDao as LocationDao;
	use dao\Singleton as Singleton;
use controller\Middleware as Middleware;
	Autoload::start();

	class AdminLocationController{

		private $dao;

		function __construct(){
			/*$middleware = Middleware::getInstance();
			$middleware->checkAdmin();*/
			$this->dao=LocationDao::getInstance();
		}


		public function index(){
			
			$locations = $this->getLocations();
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\location\location_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function addView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\location\location_add.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function editView(){
			
			$id = $_GET['id'];
			$location = $this->dao->get($id);

			if(is_array($location)){
				$location = $location[0];
			}

			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\location\location_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function add($name){
			$location = new Location($id,$name,null,null,null);
			$this->dao->add($location);
			header('Location: http://'.HOST_INTERNET.'/'.DIRECTORY.'/AdminLocation');
		}

		public function edit($id,$name){

			$location = new Location($id,$name,null,null,null);
			$this->dao->update($location);
			header('Location: http://'.HOST_INTERNET.'/'.DIRECTORY.'/AdminLocation');
			
		}

		public function delete($id){

			$this->dao->delete($id);
		}

		public function getLocations(){
			return $this->dao->getAll();
		}


	}



?>