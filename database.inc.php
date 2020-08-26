<?php
	session_start();
	require_once "GOOGLE_API/API/vendor/autoload.php";
	$gClient = new Google_Client();
	// used ksfjjks@gmail.com id
	$gClient->setClientId("927434094587-1nt4c4vqkjbp3jchb36s99m733dpohon.apps.googleusercontent.com");
	$gClient->setClientSecret("KDD1J0VlC_5NGqk64pxkL0_2");
	$gClient->setApplicationName("shadabzone");
	$gClient->setRedirectUri("http://localhost/Projects/Notification_Like_Facebook_PPH_AJAX/Google_API/g-callback.php"); // Add your redirect url where your call back bpage is called ..
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");	
	$con = new mysqli('localhost', 'root','' ,'notification_system');
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}	
?>