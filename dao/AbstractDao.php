<?php namespace dao;

interface AbstactDao{ 



	abstract function add($object);

	abstract function get($id);

	abstract function delete($id);

	abstract function update($object); 

}





?>