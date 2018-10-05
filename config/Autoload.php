<?php namespace config;


	//require_once ('Config.php');

	//use Config\Config as Config;
	
    class Autoload {
        
        public static function start() {

            spl_autoload_register(function($classPath)
			{
				$classFile = ROOT . str_replace("\\", "/", $classPath)  . ".php";
				require_once($classFile);
			});
        }
    }
?>