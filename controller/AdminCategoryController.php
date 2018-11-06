<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\Category as Category;
	use dao\dbDao\ArtistDao as CategoryDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class AdminCategoryController{

		private $categoryDao;

		function __construct(){
			$this->categoryDao=CategoryDao::getInstance();
		}


		public function index(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\category\category_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function addView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\category\category_add.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function editView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\category\category_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function add(){}

		public function edit(){}

		public function delete(){}

		public function getLocations(){}

	}



?>