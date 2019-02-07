<?php namespace controller;
	
	require_once(ROOT.'config\Autoload.php');
	
	//require_once(ROOT.'Dao\Singleton.php');
	
	use config\Autoload as Autoload;
	use config\Request as Request;
	use models\Artist as Artist;
	use dao\dbDao\ArtistDao as ArtistDao;
	//use dao\listDao\ArtistDao as ArtistDao;
	use dao\Singleton as Singleton;
	use controller\Middleware as Middleware;

	Autoload::start();

	class AdminArtistController{

		private $artistDao;

		function __construct(){
		$middleware = Middleware::getInstance();
			$middleware->checkAdmin();

			$this->artistDao=ArtistDao::getInstance();
			/*$this->artistDao = new ArtistDao(); LISTA*/ 
		}


		public function index(){

			$artists=$this->artistDao->getAll();
			
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\artist\artist_view.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}


		public function addView(){
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\artist\artist_add.php');
			include(ROOT . 'views\admin\footer_admin.php');			
		}

		public function editView(){
			
			$id=$_GET['id'];
			$artist=$this->artistDao->get($id);
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\artist\artist_edit.php');
			include(ROOT . 'views\admin\footer_admin.php');
			
		}

		public function add(){

			$name=$_POST['name'];
			$image = $this->loadImage();
			$description=$_POST['description'];

			
			if(isset($image)){
				$imgName=basename($_FILES['img']['name']);
				$artist = new Artist(0,$name,$imgName,$description);
				$this->artistDao->add($artist);
				echo 'ok';
			}
						
		}

		public function update(){

			$id=$_POST['id'];
			$name=$_POST['name'];
			$description=$_POST['description'];
			$checkbox= $_POST['checkbox'];
			$oldImg=$_POST['oldImg'];

			if($checkbox==='true'){
				$artist = new Artist($id,$name,$oldImg,$description);
				$this->artistDao->update($artist);
				echo 'ok';
			}else{
			
				$image=$this->loadImage();
				if(isset($image)){
					$imgName=$_FILES['img']['name'];
					$artist = new Artist($id,$name,$imgName,$description);
					$this->artistDao->update($artist);
					echo 'ok';
				}
	
			}
		
		}

		public function delete(){
			$id = $_POST['artist_id'];
			$this->artistDao->delete($id);
		}

		public function getArtists(){

			$result=$this->artistDao->getAll();
			$artists=$this->artistDao->map($result);
			var_dump($artists);
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
	
						if($width <= 960 && $height <=900) 
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