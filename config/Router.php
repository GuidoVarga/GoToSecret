<?php namespace config;

    require_once (ROOT.'Config\Autoload.php');
  

    use Config\Autoload as Autoload;

    Autoload::start();


    class Router {

        /**
         * Se encarga de direccionar a la pagina solicitada
         *
         * @param Request
         */

        public function __construct()
        {
            # code...
        }
        

        public static function route(Request $request) {

            /**
             *  
             */

            $controller = $request->getController() . 'Controller';



            /**
             * 
             */

            $method = $request->getMethod();

            /**
             * 
             */

            $parameters = $request->getParameters();

            /**
             * 
             */

            $show = "controller\\". $controller;


            /**
             * 
             */

            $controller = new $show;


            /**
             * 
             */

            if(!isset($parameters)) {
                call_user_func(array($controller, $method));
            } else {
                call_user_func_array(array($controller, $method), $parameters);

            }
        }
    }

?>