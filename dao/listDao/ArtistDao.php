<?php namespace dao\listDao;

use config\Autoload as Autoload;
use models\Artist as Artist;

	class ArtistDao {

		private $list;

		function __construct(){
			$this->list = array();
		}


		 public function getSessionArtist()
	    {
	        
	        if (!isset($_SESSION['ArtistList'])) {
				
	            $_SESSION['ArtistList'] = array();
	        }
			return $_SESSION['ArtistList'];
			
	    }
	    
	    public function setSessionArtist($value)
	    {
	        $_SESSION['ArtistList'] = $value;
	    }


		function get($id){

			$this->list=$this->getSessionArtist();
			foreach ($this->list as $artist) {
				if($artist->getId() == $id)
					return $artist;
			}

			return null;
		}

		public function getAll(){

			if (!isset($_SESSION['ArtistList'])) {
				$_SESSION['ArtistList'] = array();
	        }
	        return $_SESSION['ArtistList'];
		}

		function add($object){

			$this->list=$this->getSessionArtist();
	        array_push($this->list, $object);
			$this->setSessionArtist($this->list);
		}

		function delete($id){

			$this->list=$this->getSessionArtist();
			for($i=0 ; $i < sizeof($this->list) ; $i++){

				if($artist->getId() == $id)
					unset($this->list[$id]);

			}
			$this->setSessionArtist($this->list);
			//  print_r($this->list);

		}

		function update($object){

			$this->list=$this->getSessionArtist();
			for($i=0 ; $i < sizeof($this->list) ; $i++){

				if($artist->getId() == $object->getId())
					$this->list[$id]=$object;

			}
			$this->setSessionArtist($this->list);


		}
	}









?>