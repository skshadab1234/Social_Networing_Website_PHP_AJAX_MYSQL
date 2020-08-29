<?php
require 'database.inc.php';
    /*Just for your server-side code*/
    header('Content-Type: text/html; charset=ISO-8859-1');
    
if (isset($_SESSION['access_token'])) {
	$sql = "SELECT * FROM google_user where google_email = '".$_SESSION['email']."'";
	$res = mysqli_query($con,$sql);
	$user = mysqli_fetch_assoc($res);
}elseif(isset($_SESSION['USER_ID'])){
	$sql = "SELECT * FROM users where id = '".$_SESSION['USER_ID']."'";
	$res = mysqli_query($con,$sql);
	$user = mysqli_fetch_assoc($res);
}else{
	header("location:signup.php");
}

$userimg = (!empty($user['picture_link']) ? $user['picture_link'] : "https://eruditegroup.co.nz/wp-content/uploads/2016/07/profile-dummy3.png");

