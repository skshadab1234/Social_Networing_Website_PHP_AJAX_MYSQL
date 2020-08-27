<?php
	require 'session.php';

	if (isset($_POST['search'])) {
	$search = $_POST['search'];

	$sql = "SELECT id,user_name,firstname,last_name,picture_link FROM google_user WHERE user_name LIKE '%$search%' UNION SELECT id,user_name,firstname,last_name,picture_link FROM users WHERE user_name LIKE '%$search%'";
	$res = mysqli_query($con,$sql); 
	$output = ' ';
	if (mysqli_num_rows($res) > 0) {
		while ($row = mysqli_fetch_assoc($res)) {
			$image = (!empty($row['picture_link']) ? $row['picture_link'] : "https://eruditegroup.co.nz/wp-content/uploads/2016/07/profile-dummy3.png");
			$output .= '<li style="background:#262626"> 
								<a href="javacript:" id="nav-bar-bak">
									<div class="container-fluid">
										<div class="row" >
											<div class="col-1" >
												<img src='.$image.' alt="" style="width: 35px;height: 35px;border-radius: 50%;position:absolute;left: 10px;top: -4px;">
											</div>	
											<div class="col-8" >
												<strong id="myitem" style="font-size: .8rem;letter-spacing:1px">'.$row['user_name'].'</strong><br>
											</div>
										</div>
									</div>	
								</a>
							<li>
								<hr style="padding:0;margin:0px 0">
							'; 	
		}
	}else{
		$output .= '<li><a href="javascript:void(0)">No record Found</a></li>'; 	
	}

	echo $output;
}