<?php namespace controller;

	require_once(ROOT . 'config\Autoload.php');

	use config\Autoload as Autoload;
	use dao\dbDao\EventDao as EventDao;
	use dao\dbDao\EventCategoryDao as EventCategoryDao;
	use controller\Middleware as Middleware;
	use dao\dbDao\QueryDao as QueryDao;
	Autoload::start();


	class AdminQueryController{

		private $eventDao;

		public function __construct(){
		$middleware = Middleware::getInstance();
			$middleware->checkAdmin();
			$this->eventDao=EventDao::getInstance();
			$this->eventCategoryDao=EventCategoryDao::getInstance();
			$this->queryDao = queryDao::getInstance();
			
		}	

		public function index(){
			
			
		}

		public function checkQuantitySurplus(){
			$events=$this->eventDao->getAll();
		
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\check_surplus_quantity.php');
			include(ROOT . 'views\admin\footer_admin.php');
		}

		public function soldByCategory(){
			$events=$this->eventDao->getAll();
			$categories = $this->eventCategoryDao->getAll();
			$categories=$this->getSoldByCategory($categories);
			include(ROOT . 'views\head.php');
			include(ROOT . 'views\admin\check_sold_by_category.php');
			include(ROOT . 'views\admin\footer_admin.php');
		}

		public function getSoldByCategory($categories){
			foreach ($categories as $category) {
				$id=$category->getId();
				$surplus=$this->queryDao->getSurplusQuantityByCategory($id);
				$total=$this->queryDao->getTotalQuantityByCategory($id);
				$sold=$total-$surplus;
				if($sold<0)
					$sold=0;

				$category->setSoldQuantity($sold);	
			}
			return $categories;
		}

		public function getSurplusAndSoldQuantity($id){
			$surplus=$this->queryDao->getSurplusQuantity($id);
			$total=$this->queryDao->getTotalQuantity($id);
			$name=$this->eventDao->getName($id);
			$sold=$total-$surplus;
			if($sold<0)
				$sold=0;

			$object = new \stdClass();
			$object->surplus= $surplus;
			$object->sold = $sold;
			$object->name = $name;
			$json=json_encode($object);
			echo $json;
		}
		
		public function getSurplusAndSoldQuantityByCategory($id){
			$surplus=$this->queryDao->getSurplusXPriceByCategory($id);
			$total=$this->queryDao->getTotalQuantityXPriceByCategory($id);
			$name=$this->eventCategoryDao->getName($id);
			$sold=$total-$surplus;
			if($sold<0)
				$sold=0;

			$object = new \stdClass();
			$object->surplus= $surplus;
			$object->total= $total;
			$object->sold = $sold;
			$object->name = $name;
			$json=json_encode($object);
			echo $json;
		}

	
	
	}



?>