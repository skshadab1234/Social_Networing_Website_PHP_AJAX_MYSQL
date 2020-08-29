<?php

require 'session.php';
require 'function.inc.php';
if (isset($_POST['user_name'])) {
	$search = $_POST['user_name'];
// for posts
	$sql = "SELECT id,user_name,firstname,last_name,picture_link,post_id,follow_id,bio,following_id FROM google_user WHERE user_name = '$search' UNION ALL SELECT id,user_name,firstname,last_name,picture_link,post_id,follow_id,bio,following_id FROM users WHERE user_name = '$search'";
	$res = mysqli_query($con,$sql);

	$row = mysqli_fetch_assoc($res);
	$main_bio = $row['bio'];
	$image = (!empty($row['picture_link']) ? '<img class="w-20 h-20 md:w-40 md:h-40 object-cover rounded-full border-2 border-pink-600 p-1" src="'.$row['picture_link'].'" alt="profile">' : '<img class="w-20 h-20 md:w-40 md:h-40 object-cover rounded-full border-2 border-pink-600 p-1" src="https://eruditegroup.co.nz/wp-content/uploads/2016/07/profile-dummy3.png " alt="profile">');


	$post_query = "SELECT COUNT(*) as numrows FROM `post` left join users ON users.post_id = post.post_by LEFT JOIN google_user ON post.post_by = google_user.post_id WHERE post_by = ".$row['post_id']."";
		$post_res = mysqli_query($con,$post_query);
	$post_row = mysqli_fetch_assoc($post_res);
	$post_count = shortNumber($post_row['numrows']);

	// for followers

	$follow_query = "SELECT COUNT(*) as numrows FROM `followers` left join users ON users.follow_id = followers.followed_by LEFT JOIN google_user ON followers.followed_by = google_user.follow_id WHERE followed_by = ".$row['follow_id']."";
	$follow_res = mysqli_query($con,$follow_query);
	$follow_row = mysqli_fetch_assoc($follow_res);
	$follow_count = shortNumber($follow_row['numrows']);

	// for following

	$following = "SELECT COUNT(*) as numrows FROM `following` left join users ON users.following_id = following.follwing_to LEFT JOIN google_user ON following.follwing_to = google_user.following_id WHERE who_following = ".$row['follow_id']."";
	$following_res = mysqli_query($con,$following);
	$following_row = mysqli_fetch_assoc($following_res);
	$following_count = shortNumber($following_row['numrows']);


	// posts
	$post_output = '';
	$posts = "SELECT *, post.id as postid FROM `post` left join users ON users.post_id = post.post_by LEFT JOIN google_user ON post.post_by = google_user.post_id WHERE post_by = ".$row['post_id']."";
	   	$posts_res = mysqli_query($con,$posts);

      	if (mysqli_num_rows($posts_res) > 0) {
      		while ($po_row = mysqli_fetch_assoc($posts_res)) {
			$post_img = (!empty($po_row['post_img']) ? $po_row['post_img'] : "https://eruditegroup.co.nz/wp-content/uploads/2016/07/profile-dummy3.png");

      		$post_output .= '
      			  <!-- column -->
      			  <div class="w-1/3 p-px md:px-3 post" > 
          <a href="post.php?postid='.$po_row['postid'].'">
            <article class="post bg-gray-100 text-white relative pb-full md:mb-6">
              <!-- post image-->
              <img class="w-full h-full absolute left-0 top-0 object-cover" src="'.$post_img.'" alt="image">

              <i class="fas fa-square absolute right-0 top-0 m-1"></i>
              <!-- overlay-->
              <div class="overlay bg-gray-800 bg-opacity-25 w-full h-full absolute 
                                left-0 top-0 hidden">
                <div class="flex justify-center items-center 
                                    space-x-4 h-full">
                  <span class="p-2">
                    <i class="fas fa-heart"></i>
                    412K
                  </span>

                  <span class="p-2">
                    <i class="fas fa-comment"></i>
                    2,909
                  </span>
                </div>
              </div>

            </article>
          </a></div>';
        ?>
      			<?php
      		}
      	}else{
      		$post_output .= '
				<div class="container">
					<div class="button-wrap">
						<i class="fa fa-plus" style="color:#4299e1;position: relative;left: 9px "></i> <label class ="new-button" for="upload"> Add your First Post
						<input id="upload" type="file" >
					<div>
				</div>';
	      	}


	      	$igtv  = "This is Igtv";
	      	$tags  = "This is tags";

	      	$followby = "SELECT * FROM `followers` LEFT JOIN google_user ON followers.followed_by = google_user.follow_id LEFT JOIN users ON followers.followed_by = users.follow_id WHERE followed_by = ".$row['follow_id']."";
	      	$followby_res = mysqli_query($con,$followby);

	      	$followby_output= '';

	      	if (mysqli_num_rows($followby_res) > 0) {
	      		while ($followby_row = mysqli_fetch_assoc($followby_res)) {
	      		$followby_output .= '<a href="#" class="px-2 py-1 
                        text-black font-semibold text-sm rounded  text-center 
                        sm:inline-block  unfollow_user" style="border: 1px solid #000">Following <i class="fa fa-angle-down"></i></a>';
	      		}
	      	}else{
	      		$followby_output .= '<a href="#" class="bg-blue-500 px-2 py-1 
                        text-white font-semibold text-sm rounded  text-center 
                        sm:inline-block follow_user">Follow</a>';
	      	}


	$data = array(
		'post_output'       => $post_output,
		'followby_output'   => $followby_output,
		'igtv'       		=> $igtv,
		'tags'       		=> $tags,	
		'user_img'          => $image,
		'posts'             => $post_count,
 		'follow_count' 		=> $follow_count,
		'following_count'   => $following_count,
	);

	echo json_encode($data);

}
