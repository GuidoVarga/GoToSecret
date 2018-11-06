<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\Date as Date;
	use dao\dbDao\DateDao as DateDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class AdminDateController{

		/*private $dateDao;

		function __construct(){
			$this->dateDao=DateDao::getInstance();
		}*/


		public function index(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\date\date_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
		}

		public function addView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\date\date_add.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function editView(){
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\date\date_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function add(){}

		public function edit(){}

		public function delete(){}

		public function getDates(){}


	}



?>