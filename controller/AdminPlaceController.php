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

	Autoload::start();

	class AdminPlaceController{

		private $placeDao;
		private $cityDao;

		function __construct(){
			$this->placeDao=PlaceDao::getInstance();
			$this->cityDao=CityDao::getInstance();
		}

		
		public function index(){

			$places=$this->placeDao->getAll();
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\place\place_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function addView(){
			
			$cities = $this->cityDao->getAll();

			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\place\place_add.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function editView(){

			$id=$_GET['id'];

			$place=$this->placeDao->get($id);
			$cities = $this->cityDao->getAll();
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\place\place_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function add(){
			$name=$_POST['name'];
			$address=$_POST['address'];
			$cityId=$_POST['city'];

			$place = new Place(0,$name,$address,new City($cityId,null));

			$this->placeDao->add($place);
			header('location: http://'.HOST.'/'.DIRECTORY.'/AdminPlace');
		}

		public function update(){

			$id = $_POST['id'];
			$name= $_POST['name'];
			$address=$_POST['address'];
			$cityId=$_POST['city'];

			$place = new Place($id,$name,$address,new City($cityId,null));
			$this->placeDao->update($place);

			header('location: http://'.HOST.'/'.DIRECTORY.'/AdminPlace');

		}

		public function delete(){

			$id = $_POST['place_id'];
			$this->placeDao->delete($id);
		}

		public function getPlaces(){}
	
	}



?>