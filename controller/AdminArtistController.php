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

			$artists=$this->artistDao->getAll();
			
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
			
			$id=$_GET['id'];
			$artist=$this->artistDao->get($id);
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\artist\artist_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function add(){

			$name=$_POST['name'];
			$description=$_POST['description'];

			$artist = new Artist(0,$name,$description);
			$this->artistDao->add($artist);
			echo 'ok';
		
			
		}

		public function update(){

			$id=$_POST['id'];
			$name=$_POST['name'];
			$description=$_POST['description'];

			$artist = new Artist($id,$name,$description);
			$this->artistDao->update($artist);
			echo 'ok';
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