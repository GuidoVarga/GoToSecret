<?php namespace dao;

interface iDao{ 



	abstract function add($object);

	abstract function get($id);

	abstract function delete($id);

	abstract function update($object); 

}





?>