<?php
require 'session.php';

if (isset($_POST['message'])) {
	$message = $_POST['message'];
	if (!empty($message)) {
		echo "seen";
	}else{

		$sql = "SELECT * FROM `messages` left join users ON users.msg_id = messages.message_from LEFT JOIN google_user ON messages.message_from = google_user.msg_id WHERE users.msg_id = 2511 OR google_user.msg_id = 2511";
		$res = mysqli_query($con,$sql);
		$output = ' ';
		if (mysqli_num_rows($res) > 0) {
			while ($row = mysqli_fetch_assoc($res)) {
				$output .= '<li>
								<a href="javacript:" id="nav-bar-bak" style="padding:0px 20px;height:50px;line-height:50px">
									<div class="container-fluid">
										<div class="row">
											<div class="col-1">
												<img src="'.$row['picture_link'].'" alt="" style="width: 35px;height: 35px;border-radius: 50%;position:absolute;left: 18px;top: 5px;">
											</div>	

											<div class="col-9">
												<strong style="font-size: .7rem;letter-spacing:.03rem">'.$row['firstname'].' '.$row['last_name'].'</strong>
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