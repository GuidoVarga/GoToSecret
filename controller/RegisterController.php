<?php namespace controller;


	require_once(ROOT.'Config\Autoload.php');
	//require_once(ROOT.'Facebook\Config.php');

	use Config\Autoload as Autoload;
	use controller\Middleware as Middleware;
	Autoload::start();


	use dao\dbDao\UserDao as UserDao;
	use dao\dbDao\AccountDao as AccountDao;
	use models\User as User;
	use models\Account as Account;
	use models\Role as Role;

	class RegisterController{

		private $userDao;
		private $accountDao;

		public function __construct(){
			
			$this->userDao = UserDao::getInstance();
			$this->accountDao = AccountDao::getInstance();
		}

		public function index(){	
			
			include(ROOT.'Vistas\header.php');
			include(ROOT.'Vistas\VistaRegistro.php');
		}

		public function register($name,$lastname,$email,$password){

			$hash=password_hash($password,PASSWORD_DEFAULT);
			
			$account= new Account(0,$email,$hash,NULL,1);
			$idAccount=$this->accountDao->add($account);;
			$user= new User(0,$name,$lastname,$idAccount);
			$this->userDao->add($user);
			echo 'ok';

			//header('Location: http://'.HOST_INTERNET.'/'.DIRECTORIO.'/Login');
		}

		public function validateEmail($name,$lastname,$email,$password){
		
			/*if(isset($_POST['email'])){
				$email=$_POST['email'];
			}*/

			$validEmail = $this->userDao->getAccountByEmail($email);
			if(!$validEmail){
				
				$this->register($name,$lastname,$email,$password);
				
			}
			else{
				echo 'email' ;
			}
			//echo $this->userDao->validarEmail($email);

		}

/*
	public function registrarFacebook(){

			$fb = new Facebook([
  				'app_id' => '514718105572039', // Replace {app-id} with your app id
  			'app_secret' => '7471e6d56686284e621cd98e24a8000b',
  			'default_graph_version' => 'v2.2',
  			]);

			$helper = $fb->getRedirectLoginHelper();

			try {
  					$accessToken = $helper->getAccessToken();
			} catch(Apis\Facebook\Exceptions\FacebookResponseException $e) {
  				// When Graph returns an error
  				echo 'Graph returned an error: ' . $e->getMessage();
  				exit;
			} catch(Apis\Facebook\Exceptions\FacebookSDKException $e) {
  				// When validation fails or other local issues
  			echo 'Facebook SDK returned an error: ' . $e->getMessage();
  			exit;
			}

			if (! isset($accessToken)) {
  				if ($helper->getError()) {
    				header('HTTP/1.0 401 Unauthorized');
    				echo "Error: " . $helper->getError() . "\n";
    				echo "Error Code: " . $helper->getErrorCode() . "\n";
    				echo "Error Reason: " . $helper->getErrorReason() . "\n";
    				echo "Error Description: " . $helper->getErrorDescription() . "\n";
  				} else {
    				header('HTTP/1.0 400 Bad Request');
    				echo 'Bad request';
  				}
  				exit;
			}

			// Logged in
			echo '<h3>Access Token</h3>';
			var_dump($accessToken->getValue());

			// The OAuth 2.0 client handler helps us manage access tokens
			$oAuth2Client = $fb->getOAuth2Client();

			// Get the access token metadata from /debug_token
			$tokenMetadata = $oAuth2Client->debugToken($accessToken);
			echo '<h3>Metadata</h3>';
			var_dump($tokenMetadata);

			// Validation (these will throw FacebookSDKException's when they fail)
			$tokenMetadata->validateAppId('{app-id}'); // Replace {app-id} with your app id
			// If you know the user ID this access token belongs to, you can validate it here
			//$tokenMetadata->validateUserId('123');
			$tokenMetadata->validateExpiration();

			if (! $accessToken->isLongLived()) {
			  // Exchanges a short-lived access token for a long-lived one
			  	try {
			    	$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
			  	} catch (Facebook\Exceptions\FacebookSDKException $e) {
			    	echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
			    exit;
			  	}

			  echo '<h3>Long-lived</h3>';
			  var_dump($accessToken->getValue());
			}

			$_SESSION['fb_access_token'] = (string) $accessToken;

					
	}
			*/					
	}
?>