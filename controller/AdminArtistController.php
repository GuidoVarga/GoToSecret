<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\Artist as Artist;
	use dao\dbDao\ArtistDao as ArtistDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class AdminArtistController{

		private $artistDao;

		function __construct(){
			$this->artistDao=ArtistDao::getInstance();
		}


		public function index(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\artist\artist_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function addView(){
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\artist\artist_add.php');
			include(ROOT . 'views\admin\footer_admin.php');			
		}

		public function editView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\artist\artist_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function add(){

			$artist=new Artist(0,$name,$description);

			$this->artistDao->add($artist);

			var_dump($this->artistDao);
			//header("location: http://".HOST_INTERNET."/proyecto/Admin");
		
			
		}

		public function edit(){
		
			
		}

		public function delete(){

		}

		public function getArtists(){

			$result=$this->artistDao->getAll();
			$artists=$this->artistDao->map($result);
			var_dump($artists);
		}	


	 }

?>