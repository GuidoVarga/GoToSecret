<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use dao\dbDao\ArtistDao as ArtistDao;
	use dao\dbDao\EventDao as EventDao;
	use models\Artist as Artist;

	Autoload::start();


	class ArtistDetailController{

		private $artistDao;
		private $eventDao;

		public function __construct(){
			//$this->cartController = new cartController();
			$this->artistDao = ArtistDao::getInstance();
			$this->eventDao = EventDao::getInstance();
		}

		public function index(){

			$artist = $this->getArtist();
			$events = $this->eventDao->getEventByArtist($artist->getId());
			isset($_SESSION['user']) ? $user = $_SESSION['user']: null;
            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\detail_item_artist.php');
			include(ROOT . 'views\user\footer.php');
			
		}

		public function getArtist(){
			$id=$_GET['id'];
			return $this->artistDao->get($id);
		}
	
	}



?>