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
			$this->artistDao=ArtistDao::getInstance();
		}


		public function index(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\dashboard.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		
	}



?>