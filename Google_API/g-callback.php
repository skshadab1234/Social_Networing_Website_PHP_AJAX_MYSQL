<?php
	require_once "../database.inc.php";
	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: signup.php');
		exit();
	}
	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();
	// echo "<pre>";
	// print_r($userData);
	// die();
	$_SESSION['google_id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];
	$date= date("Y-m-d h:i:s");

	$sql = "Select * from google_user where google_email = '".$_SESSION['email']."'";
	$res= mysqli_query($con,$sql);

	if (mysqli_num_rows($res) > 0) {
		$_SESSION['exist_error'] = "Welcome Back,";
	}else{
		 	$sql="insert into google_user (clint_id,firstname,last_name,google_email,picture_link,added_on) values
		 ('".$userData['id']."','".$userData['givenName']."','".$userData['familyName']."','".$userData['email']."','".$userData['picture']."','".$date."')";
			mysqli_query($con,$sql);
		}
			header('Location: ../index.php');
	


	exit();
?>