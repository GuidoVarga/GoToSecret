<?php namespace controller;


require_once(ROOT.'Config\Autoload.php');

use Config\Autoload as Autoload;
use controller\Middleware as Middleware;
Autoload::start();

use dao\dbDao\UserDao as UserDao;
use models\User as User;

class LoginController{

	private $userDao;

	public function __construct(){
		$middleware = Middleware::getInstance();
			$middleware->checkNotLogged();
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

		if($user->getAccount()->getRole()->getDescription()=='user')
			header('Location: http://'.HOST.'/'.DIRECTORY.'/Home');
		else
			header('Location: http://'.HOST.'/'.DIRECTORY.'/Admin');
	}

	public function logOut(){
		session_start();
		session_destroy();
	}

	public function showSession(){
		session_start();
		var_dump($_SESSION);
	}

}


?>