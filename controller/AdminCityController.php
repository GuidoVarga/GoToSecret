<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\City as City;
	use models\Place as Place;
	use dao\dbDao\CityDao as CityDao;
	use dao\dbDao\PlaceDao as PlaceDao;
	use dao\Singleton as Singleton;
use controller\Middleware as Middleware;
	Autoload::start();

	class AdminCityController{

		private $cityDao;

		function __construct(){
			/*$middleware = Middleware::getInstance();
			$middleware->checkAdmin();*/
			$this->cityDao=CityDao::getInstance();
		}

		
		public function index(){
			
			$cities=$this->cityDao->getAll();

			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\city\city_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function addView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\city\city_add.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function editView(){

			$id=$_GET['id'];
			$city=$this->cityDao->get($id);
			var_dump($city);
			
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\city\city_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function add(){

			$name=$_POST['name'];

			$city = new City(0,$name);

			$this->cityDao->add($city);

			header('location: http://'.HOST.'/'.DIRECTORY.'/AdminCity');

		}

		public function update(){

			$id = $_POST['id'];
			$name= $_POST['name'];

			$city=new City($id,$name);
			$this->cityDao->update($city);

			header('location: http://'.HOST.'/'.DIRECTORY.'/AdminCity');

		}

		public function delete(){

			$id = $_POST['city_id'];
			$this->cityDao->delete($id);
		}

		public function getPlaces(){}
	
	}



?>