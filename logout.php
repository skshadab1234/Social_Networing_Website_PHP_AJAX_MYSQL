<?php
	require_once "database.inc.php";
	unset($_SESSION['access_token']);
	unset($_SESSION['USER_ID']);
	$gClient->revokeToken();
	session_destroy();
	header('Location: signup.php');
	exit();
?>