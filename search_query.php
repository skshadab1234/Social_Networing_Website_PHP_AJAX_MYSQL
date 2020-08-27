
<?php
require 'session.php';
require 'top.php';

if (isset($_GET['search']) and isset($_GET['search']) != '') {
	$search = $_GET['search'];
	   $search=preg_replace('/[^A-Za-z0-9-]+/', '-', $search);
	
	$sql = "SELECT id,user_name,firstname,last_name,picture_link,post_id,follow_id,bio FROM google_user WHERE user_name = '$search' UNION ALL SELECT id,user_name,firstname,last_name,picture_link,post_id,follow_id,bio FROM users WHERE user_name = '$search'";
	
	$res = mysqli_query($con,$sql);

	$row = mysqli_fetch_assoc($res);
	$main_bio = $row['bio'];
	$image = (!empty($row['picture_link']) ? $row['picture_link'] : "https://eruditegroup.co.nz/wp-content/uploads/2016/07/profile-dummy3.png");

	// for posts

	$post_query = "SELECT COUNT(*) as numrows FROM `post` left join users ON users.post_id = post.post_by LEFT JOIN google_user ON post.post_by = google_user.post_id WHERE post_by = ".$row['post_id']."";
		$post_res = mysqli_query($con,$post_query);
	$post_row = mysqli_fetch_assoc($post_res);
	$post_count = $post_row['numrows'];

	// for followers

	$follow_query = "SELECT COUNT(*) as numrows FROM `followers` left join users ON users.follow_id = followers.followed_by LEFT JOIN google_user ON followers.followed_by = google_user.follow_id WHERE followed_by = ".$row['follow_id']."";
	$follow_res = mysqli_query($con,$follow_query);
	$follow_row = mysqli_fetch_assoc($follow_res);
	$follow_count = $follow_row['numrows'];

}

?>
<style>
	.container {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
  height: 200px;
}

input[type="file"] {
  position: absolute;
  z-index: -1;
  top: 6px;
  left: 0px;
  font-size: 15px;
  display: none;
  color: rgb(153,153,153);
}

.button-wrap {
  position: relative;
}

.new-button {
    display: inline-block;
    padding: 8px 12px; 
    cursor: pointer;
    border-radius: 4px;
    font-size: 16px;
    color: #4299e1;
}
</style>
<main class="bg-gray-100 bg-opacity-25">

  <div class="lg:w-8/12 lg:mx-auto mb-8">

    <header class="flex flex-wrap items-center p-4 md:py-8">

      <div class="md:w-3/12 md:ml-16">
        <!-- profile image -->
        <img class="w-20 h-20 md:w-40 md:h-40 object-cover rounded-full
                     border-2 border-pink-600 p-1" src="<?= $image ?>" alt="profile">
      </div>

      <!-- profile meta -->
      <div class="w-8/12 md:w-7/12 ml-4">
        <div class="md:flex md:flex-wrap md:items-center mb-4">
          <h2 class="text-2xl inline-block font-light md:mr-2 mb-2 sm:mb-0">
            <?= $row['user_name'] ?>
          </h2>

          <!-- badge -->
          <span class="inline-block fas fa-certificate fa-lg text-blue-500 
                               relative mr-6 text-xl transform -translate-y-2" aria-hidden="true">
            <i class="fas fa-check text-white text-xs absolute inset-x-0
                               ml-1 mt-px"></i>
          </span>

          <!-- follow button -->
                        <?php
						if (isset($_SESSION['access_token']) OR isset($_SESSION['USER_ID'])) {
							if ($user['user_name'] == $search) {
								echo '<a href="#" class=" px-2 py-1 
                        text-black font-semibold text-sm rounded block text-center 
                        sm:inline-block block" style="border:1px solid">Edit Profile</a>
                        ';
							}else{
								echo '<a href="#" class="bg-blue-500 px-2 py-1 
                        text-white font-semibold text-sm rounded block text-center 
                        sm:inline-block block">Follow</a>';
							}
						}else{
							echo '<a href="#" class="bg-blue-500 px-2 py-1 
                        text-white font-semibold text-sm rounded block text-center 
                        sm:inline-block block">Follow</a>';
						}
					?>
        </div>

        <!-- post, following, followers list for medium screens -->
        <ul class="hidden md:flex space-x-8 mb-4">
          <li>
            <span class="font-semibold"><?= $post_count ?></span>
            posts
          </li>

          <li>
            <span class="font-semibold"><?= $follow_count ?></span>
            followers
          </li>
          <li>
            <span class="font-semibold">302</span>
            following
          </li>
        </ul>

        <!-- user meta form medium screens -->
        <div class="hidden md:block">
          <h1 class="font-semibold"><?= $row['firstname'].' '.$row['last_name'] ?></h1>
          <p><?= $main_bio ?></p>
        </div>
      </div>

      <!-- user meta form small screens -->
      <div class="md:hidden text-sm my-2">
        <h1 class="font-semibold"><?= $row['firstname'].' '.$row['last_name'] ?></h1>
        <p><?= $main_bio ?></p>
      </div>

    </header>

    <!-- posts -->
    <div class="px-px md:px-3">

      <!-- user following for mobile only -->
      <ul class="flex md:hidden justify-around space-x-8 border-t 
                text-center p-2 text-gray-600 leading-snug text-sm">
        <li>
          <span class="font-semibold text-gray-800 block "><?= $post_count ?></span>
          posts
        </li>

        <li>
          <span class="font-semibold text-gray-800 block"><?= $follow_count ?></span>
          followers
        </li>
        <li>
          <span class="font-semibold text-gray-800 block">302</span>
          following
        </li>
      </ul>

      <!-- insta freatures -->
      <ul class="flex items-center justify-around md:justify-center space-x-12  
                    uppercase tracking-widest font-semibold text-xs text-gray-600
                    border-t">
        <!-- posts tab is active -->
        <li id="post_active">
          <a class="inline-block p-3" href="#" id="post">
            <i class="fas fa-th-large text-xl md:text-xs"></i>
            <span class="hidden md:inline">post</span>
          </a>
        </li>
        <li>
          <a class="inline-block p-3" href="#" id="igtv">
            <i class="far fa-square text-xl md:text-xs"></i>
            <span class="hidden md:inline">igtv</span>
          </a>
        </li>
        <li>
          <a class="inline-block p-3" href="#" id="tags">
            <i class="fas fa-user border border-gray-500
                             px-1 pt-1 rounded text-xl md:text-xs"></i>
            <span class="hidden md:inline">tagged</span>
          </a>
        </li>
      </ul>
      <!-- flexbox grid -->
      <div class="flex flex-wrap -mx-px md:-mx-3">

      <?php
	    $posts = "SELECT * FROM `post` left join users ON users.post_id = post.post_by LEFT JOIN google_user ON post.post_by = google_user.post_id WHERE post_by = ".$row['post_id']."";
		$posts_res = mysqli_query($con,$posts);

      	if (mysqli_num_rows($posts_res) > 0) {
      		while ($po_row = mysqli_fetch_assoc($posts_res)) {
			$post_img = (!empty($po_row['post_img']) ? $po_row['post_img'] : "https://eruditegroup.co.nz/wp-content/uploads/2016/07/profile-dummy3.png");
      			?>
      			  <!-- column -->
        <div class="w-1/3 p-px md:px-3 post" >
          <!-- post 1-->
          <a href="#">
            <article class="post bg-gray-100 text-white relative pb-full md:mb-6">
              <!-- post image-->
              <img class="w-full h-full absolute left-0 top-0 object-cover" src="<?= $post_img ?>" alt="image">

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
          </a>
        </div>
      			<?php
      		}
      	}else{
      		?> 
				<div class="container">
					<div class="button-wrap">
					<i class="fa fa-plus" style="color:#4299e1;position: relative;left: 9px "></i> <label class ="new-button" for="upload"> Add your First Post
					<input id="upload" type="file" >
					<div>
				</div>
      		<?php
      	}
      ?>

      <div class="asa igtv">igtv</div>
      <div class="asa tags">tags</div>

      </div>
    </div>
  </div>
</main>

<?php 
require 'js/script.js';
?>
