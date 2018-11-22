<?php namespace controller;


require_once(ROOT.'Config\Autoload.php');

use Config\Autoload as Autoload;

Autoload::start();

use dao\dbDao\UserDao as UserDao;
use models\User as User;

class LoginController{

	private $userDao;

	public function __construct(){
		$this->userDao = UserDao::getInstance();
	}

	public function index(){


		if(isset($_SESSION['usuario']) || isset($_SESSION['admin'])){
			header('Location: http://'.HOST_INTERNET.'/'.DIRECTORIO.'/Home');
		}


		include(VIEWS.'head.php');
		include(VIEWS.'header.php');
		include(VIEWS.'user\login.php');
		include(VIEWS.'footer.php');
	}


	public function validateLogin($email,$password){

		$hash=$this->userDao->getPasswordByEmail($email);

		if(password_verify($password,$hash)){

			$this->login($email);
			return true;
		}
		else{
			echo 'error';
		}
	}

	public function login($email){

		session_start();

		$user=$this->userDao->getByEmail($email);

		$_SESSION['user']=$user;

		echo '<pre>';
		var_dump($user);
		echo '</pre>';


	}

}


?>