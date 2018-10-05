<?php namespace config;

	
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