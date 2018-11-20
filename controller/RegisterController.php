<?php namespace Controladores;


	require_once(ROOT.'Config\Autoload.php');
	require_once(ROOT.'Facebook\Config.php');

	use Config\Autoload as Autoload;
	use Facebook\Config as Config;
	use Facebook\Facebook as Facebook;

	Autoload::start();


	use dao\dbDao\UserDao as UserDao;
	use models\User as User;
	use models\Account as Account;
	use models\Role as Role;

	class RegistroControlador{

		private $userDao;

		public function __construct(){
			$this->userDao = UserDao::getInstance();
		}

		public function index(){

			session_start();
			if(isset($_SESSION['usuario'])){
				header('Location: http://'.HOST_INTERNET.'/'.DIRECTORIO.'/Home');
			}
			
			include(ROOT.'Vistas\header.php');
			include(ROOT.'Vistas\VistaRegistro.php');
		}

		public function register($nombre,$apellido,$email,$domicilio,$telefono,$password){

			$hash=password_hash($password,PASSWORD_DEFAULT);
			$cuenta= new Cuenta(0,$email, $hash);
			$cliente= new Cliente(0,$apellido,$nombre,$domicilio,$telefono,$cuenta);
			$usuarioDao=UsuariosDao::getInstance();
			$usuarioDao->add($cliente);

			header('Location: http://'.HOST_INTERNET.'/'.DIRECTORIO.'/Login');
		}

	public function validateEmail(){
	
		if(isset($_POST['email'])){
			$email=$_POST['email'];
		
		}

		echo $this->userDao->validarEmail($email);

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