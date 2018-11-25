<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\Event as Event;
	use models\EventCategory as EventCategory;
	use dao\dbDao\EventDao as EventDao;
	use dao\dbDao\EventCategoryDao as EventCategoryDao;
	use dao\Singleton as Singleton;

	Autoload::start();

	class AdminEventController{

		private $dao;
		private $eventCategoryDao;

		function __construct(){
			$this->dao=EventDao::getInstance();
			$this->eventCategoryDao=eventCategoryDao::getInstance();
		}


		public function index(){
			$events = $this->getEvents();
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\event\event_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function addView(){

			$categories = $this->eventCategoryDao->getAll();
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\event\event_add.php');
			include(ROOT . 'views\admin\footer_admin.php');
		}

		public function editView(){
			$id=$_GET['id'];
			$event=$this->dao->get($id);
			$categories = $this->eventCategoryDao->getAll();
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\event\event_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
		}

		public function add(){
			
			
		}

		public function update(){
			$id=$_POST['id'];
			$name=$_POST['name'];
			$description=$_POST['description'];
			$category=$_POST['category'];

			$event = new Event($id,$name,$description,null, new EventCategory($category,null));

			$this->dao->update($event);
		}

		public function delete(){
		
		}

		public function getEvents(){
			return $this->dao->getAllWithCategories();
		}
	
	}
?>