<?php
require 'database.inc.php';

if (isset($_SESSION['access_token'])) {
	$sql = "SELECT * FROM google_user where google_email = '".$_SESSION['email']."'";
	$res = mysqli_query($con,$sql);
	$user = mysqli_fetch_assoc($res);
}elseif(isset($_SESSION['USER_ID'])){
	$sql = "SELECT * FROM users where id = '".$_SESSION['USER_ID']."'";
	$res = mysqli_query($con,$sql);
	$user = mysqli_fetch_assoc($res);
}