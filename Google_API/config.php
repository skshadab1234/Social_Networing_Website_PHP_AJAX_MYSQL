<!-- <?php
	session_start();
	require_once "API/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("");
	$gClient->setClientSecret("");
	$gClient->setApplicationName("");
	$gClient->setRedirectUri("http://localhost/Projects/Google_Login_PHP_MYSQLI/Google_API/g-callback.php"); // Add your redirect url where your call back bpage is called ..
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");	
	$con = new mysqli('localhost', 'root','' ,'google_user');
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}	
?> -->