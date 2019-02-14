<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\EventCategory as EventCategory;
	use dao\dbDao\EventCategoryDao as EventCategoryDao;
	use dao\Singleton as Singleton;
	use controller\Middleware as Middleware;

	Autoload::start();

	class AdminCategoryController{

		private $dao;
		private $categories;

		function __construct(){
			$middleware = Middleware::getInstance();
			$middleware->checkAdmin();
			$this->dao=EventCategoryDao::getInstance();
			$this->categories = $this->getCategories();
		}


		public function index(){
			$categories = $this->categories;
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
			$id = $_GET['id'];
			$category = $this->dao->get($id);

			if(is_array($category)){
				$category = $category[0];
			}

			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\category\category_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function add($name){
			$category = new EventCategory(0,$name);
			$this->dao->add($category);
			header('Location: http://'.HOST.'/'.DIRECTORY.'/AdminCategory');
		}

		public function edit($id,$name){
			$category = new EventCategory($id,$name);
			$this->dao->update($category);
			header('Location: http://'.HOST_INTERNET.'/'.DIRECTORY.'/AdminCategory');
		}

		public function delete($id){

			$this->dao->delete($id);
		}

		public function getCategories(){
			return $this->dao->getAll();
		}

	


	}



?>