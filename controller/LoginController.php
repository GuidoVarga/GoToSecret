<?php namespace controller;


	require_once(ROOT.'Config\Autoload.php');
	
	use Config\Autoload as Autoload;
	
	Autoload::start();

	use dao\dbDao\UserDao as UserDao;
	use models\User as User;

	class LoginControlador{

		private $userDao;

		public function __construct(){
				$this->userDao = UserDao::getInstance();
		}

		public function index(){

			
			if(isset($_SESSION['usuario']) || isset($_SESSION['admin'])){
				header('Location: http://'.HOST_INTERNET.'/'.DIRECTORIO.'/Home');
			}


			include(ROOT.'Vistas\header.php');
			include(ROOT.'Vistas\VistaLogin.php');
		}


		public function validateLogin($email,$password){

		session_start();

		$resultado=$this->userDao->validarLogin($email,$password);

		if($resultado){

					if(password_verify($password,$resultado['0']['password'])){

						if($resultado['0']['id_personal']){

							$usuario=$this->userDao->mapearPersonal($resultado);

							$_SESSION['admin']=$usuario;
							
						}	
						else
						{
							$usuario=$this->userDao->mapearCliente($resultado);

							$_SESSION['usuario']=$usuario;

						}

						echo 1;
					}
					else
						echo 'password';
		
				}
				else
					echo 'email';
	}

}

?>