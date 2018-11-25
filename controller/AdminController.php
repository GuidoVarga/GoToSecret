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

		

		function __construct(){
		
		}


		public function index(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\dashboard.php');
			/*include(ROOT . 'views\admin\test.php');  Cantidad Vendida y Remanente de un evento*/
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		
	}



?>