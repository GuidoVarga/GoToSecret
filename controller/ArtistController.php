<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use dao\dbDao\ArtistDao as ArtistDao;
	use dao\dbDao\EventDao as EventDao;

	Autoload::start();

	class ArtistController{

		private $dao;
		

		function __construct(){
		
			$this->dao=ArtistDao::getInstance();
		}

		public function index(){

			
			session_start();
			//session_destroy();

			$artists = $this->dao->getAll();
			isset($_SESSION['user']) ? $user = $_SESSION['user']: null;

            include(ROOT . 'views\head.php');
			include(ROOT . 'views\user\header.php');
			include(ROOT . 'views\user\artists.php');
			include(ROOT . 'views\user\footer.php');
			
		}
	}



?>