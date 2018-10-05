<?php

	/**
	 * Mostrar errores de PHP
	 */
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	/**
	 * Archivos necesarios de inicio
	 */

	require "config/Autoload.php";
	require "config/Config.php";


	/**
	 * Alias
	 */

	use config\Autoload as Autoload;
	use config\Router 	as Router;
	use config\Request 	as Request;


	$autoload = new Autoload();
	$autoload->start();

	
	$request = new Request();
	$router = new Router();

	

	$router->route($request);


	//Autoload::start();
	//Router::direccionar(new Request());

?>