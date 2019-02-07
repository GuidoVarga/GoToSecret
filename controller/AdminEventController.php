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
use controller\Middleware as Middleware;
Autoload::start();

class AdminEventController{

	private $dao;
	private $eventCategoryDao;

	function __construct(){
		$middleware = Middleware::getInstance();
			$middleware->checkAdmin();
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

		$name=$_POST['name'];
		$description=$_POST['description'];
		$image=$this->loadImage();
		$categoryId=$_POST['category'];



		if(isset($image)){
			$imgName=basename($_FILES['img']['name']);
			$event = new Event(0,$name,$description,$imgName,new EventCategory($categoryId,null));
			$this->dao->add($event);
			echo 'ok';
		}

	}

	public function update(){
		$id=$_POST['id'];
		$name=$_POST['name'];
		$description=$_POST['description'];
		$categoryId=$_POST['category'];
		$checkbox= $_POST['checkbox'];
		$oldImg=$_POST['oldImg'];

		if($checkbox==='true'){
			$event = new Event($id,$name,$description,$oldImg, new EventCategory($categoryId,null));
			$this->dao->update($event);
			echo 'ok';
		}else{
		
			$image=$this->loadImage();
			if(isset($image)){
				$imgName=$_FILES['img']['name'];
				$event = new Event($id,$name,$description,$imgName,new EventCategory($categoryId,null));
				$this->dao->update($event);
				echo 'ok';
			}

		}

	}

	public function delete(){

		$id=$_POST['event_id'];

		$this->dao->delete($id);

		
	}

	public function getEvents(){
		return $this->dao->getAllWithCategories();
	}

	public function loadImage(){


		$imageDirectory = IMAGES;

		if(!file_exists($imageDirectory))
			mkdir($imageDirectory);



		if($_FILES)
		{

			if((isset($_FILES['img'])) && ($_FILES['img']['name'] != ''))
			{
				$extensionsAllowed = array('png','jpg','jpeg');
				$nameFile =  basename($_FILES['img']['name']);
				$file = $imageDirectory . $nameFile;	
				$img_info = getimagesize($_FILES["img"]["tmp_name"]); 
				$width=$img_info[0];
				$height=$img_info[1];
				
				$fileExtension = pathinfo($file, PATHINFO_EXTENSION);

				
				if(in_array($fileExtension, $extensionsAllowed))
				{

					if($width <= 960 && $height <=400) 
					{
						if (move_uploaded_file($_FILES["img"]["tmp_name"], $file)) 																		
						{

							return $file;

						}
						else
							echo'No se pudo subir el archivo ';
					}
					else
						echo 'El archivo es demasiado grande';
				}
				else
					echo 'El archivo cargado no es una imagen';
			}
		}else
		echo 'Elija una imagen';

		return null;
	}
	
}
?>