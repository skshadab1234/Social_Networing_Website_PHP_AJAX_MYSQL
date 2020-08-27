<?php
	session_start();
	require_once "GOOGLE_API/API/vendor/autoload.php";
	$gClient = new Google_Client();
	// used ksfjjks@gmail.com id
	$gClient->setClientId("939779406455-oosfu4c470cuuugfc61r0jh6qc53k0t3.apps.googleusercontent.com");
	$gClient->setClientSecret("I1zodGOA5vk3wfrUW2cYNSd3");
	$gClient->setApplicationName("shadabzone");
	$gClient->setRedirectUri("http://localhost/Social_Networing_Website_PHP_AJAX_MYSQL/Google_API/g-callback.php"); // Add your redirect url where your call back bpage is called ..
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");	
	$con = new mysqli('localhost', 'root','' ,'notification_system');
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}	
?>