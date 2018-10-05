<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\Artist as Artist;
	use dao\dbDao\ArtistDao as ArtistDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class AdminController{

		private $artistDao;

		function __construct(){
			//$artistDao=ArtistDao::getInstance(ArtistDao::class);
			$this->artistDao= new ArtistDao();
		}


		public function index(){

			$artist=new Artist(0,"tuvieja","carlos","imagen");
			
			$this->artistDao->add($artist);


		}


		public function addArtist($name,$description,$img){
		
			$artist=new Artist(0,$name,$description,$img);

			$artistDao->add($artist);
			//header("location: http://".HOST_INTERNET."/proyecto/Admin");

		}










	}



?>