<?php
require 'session.php';

if (isset($_POST['message'])) {
	$message = $_POST['message'];
	if (!empty($message)) {
		echo "seen";
	}else{

		if (isset($_SESSION['access_token'])) {
			$sql = "SELECT * FROM `messages` left join users ON users.msg_id = messages.message_from LEFT JOIN google_user ON messages.message_from = google_user.msg_id WHERE message_to = ".$user['id']."";
		}else{
			$sql = "SELECT * FROM `messages` left join users ON users.msg_id = messages.message_from LEFT JOIN google_user ON messages.message_from = google_user.msg_id WHERE message_to = ".$user['id']."";
		}

		$res = mysqli_query($con,$sql);
		$output = ' ';
		if (mysqli_num_rows($res) > 0) {
			while ($row = mysqli_fetch_assoc($res)) {
				$output .= '<li>
								<a href="javacript:" id="nav-bar-bak">
									<div class="container-fluid">
										<div class="row">
											<div class="col-2 col-2" >
												<img src="'.$row['picture_link'].'" alt="" style="width: 40px;height: 40px;border-radius: 50%;position:absolute;left: 8px;top: 2px;">
											</div>	
											<div class="col-2 col-9" >
												<strong style="font-size: .8rem;">'.$row['firstname'].' '.$row['last_name'].'</strong><br>
												<small>'.$row['message'].'</small>
											</div>
										</div>
									</div>	
								</a>
							<li>
							';
			}

		}
	}
	$sql1 = "SELECT * FROM messages where status = 0 and messages.message_to = ".$user['id']."";
	$res1 = mysqli_query($con,$sql1);
	$count = mysqli_num_rows($res1);

	$data = array(
		'notification' 			=> $output,
		'unseen_message' 		=> $count
	);

	echo json_encode($data);
}