
<?php
require 'session.php';
require 'top.php';


if (isset($_GET['search']) and isset($_GET['search']) != '') {
	$search = $_GET['search'];
	   $search=preg_replace('/[^A-Za-z0-9-]+/', '-', $search);
	
	$sql = "SELECT id,user_name,firstname,last_name,picture_link,post_id,follow_id,bio,following_id FROM google_user WHERE user_name = '$search' UNION ALL SELECT id,user_name,firstname,last_name,picture_link,post_id,follow_id,bio,following_id FROM users WHERE user_name = '$search'";
	
	$res = mysqli_query($con,$sql);

	$row = mysqli_fetch_assoc($res);
	$main_bio = $row['bio'];
	$image = (!empty($row['picture_link']) ? $row['picture_link'] : "https://eruditegroup.co.nz/wp-content/uploads/2016/07/profile-dummy3.png");
  $loader = '<img src="https://www.aoa.org/events-register/images/Loading.gif" width="20px" height="20px" alt="">';
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

  .swiper-container {
      width: 100%;
      height: 100%;
      background: #eee;
      padding: 10px;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;
      height: 187.6px;

      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
</style>


</script>
<main class="bg-gray-100 bg-opacity-25">

  <div class="lg:w-8/12 lg:mx-auto mb-8">

    <header class="flex flex-wrap items-center p-4 md:py-8">

      <div class="md:w-3/12 md:ml-16" id="user_img">
        <img class="w-20 h-20 md:w-40 md:h-40 object-cover rounded-full border-2 border-pink-600 p-1" src="https://www.familyfirstsolicitors.co.uk/wp-content/uploads/2015/11/placeholder-team-pic_small.jpg" alt="">
        <!-- profile image -->
        <!-- <img class="w-20 h-20 md:w-40 md:h-40 object-cover rounded-full -->
                     <!-- border-2 border-pink-600 p-1" src="<?= $image ?>" alt="profile"> -->
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
								echo '<span id="follow_button"></span>
                        &nbsp;&nbsp;&nbsp;
                        <a href="#" class=" px-2 py-1 text-black font-semibold text-sm rounded  text-center sm:inline-block show_suggest" style="border:1px solid">
                              <i class="fa fa-angle-down"></i>
                        </a>

                        <a href="#" class="hidden  px-2 py-1 text-black font-semibold text-sm rounded  text-center sm:inline-block hide_suggest" style="border:1px solid">
                              <i class="fa fa-angle-up"></i>
                        </a>


                          ';
							}
						}else{
							echo '<a href="#" class="bg-blue-500 px-2 py-1 
                        text-white font-semibold text-sm rounded block text-center 
                        sm:inline-block block">Login To Follow</a>';
						}
					?>
        </div>

        <!-- post, following, followers list for medium screens -->
        <ul class="hidden md:flex space-x-8 mb-4">
          <li>
            <span class="font-semibold post_count"><?= $loader ?></span>
            posts
          </li>

          <li>
             <span class="font-semibold follower_count"><?= $loader ?></span>
            followers
          </li>
          <li>
            <span class="font-semibold following_count"><?= $loader ?></span>
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
      <div class="md:hidden">
         <!-- Swiper -->
  <div class="swiper-container suggested_div">
    <h5 class="h-10 font-weight-bold" style="color: #262626">Suggested For You</h5>
    <div class="swiper-wrapper">
      <?php 
        $sql = "SELECT id,my_id,user_name,firstname,last_name,picture_link,post_id,follow_id,bio,following_id FROM google_user UNION ALL SELECT id,my_id,user_name,firstname,last_name,picture_link,post_id,follow_id,bio,following_id FROM users";
        
        $res = mysqli_query($con,$sql);

        if (mysqli_num_rows($res) > 0) {
          while ($suggest = mysqli_fetch_assoc($res)) {
$suggestimg = (!empty($suggest['picture_link']) ? $suggest['picture_link'] : "https://eruditegroup.co.nz/wp-content/uploads/2016/07/profile-dummy3.png");

            ?>
        <div class="swiper-slide user_div_<?= $suggest['my_id'] ?>" style="display: flex;flex-direction: column;position: relative;padding:11px 0px;height: auto">
        <a href=""><div class="inner" style="background-image: url(<?= $suggestimg ?>);width: 100px;height: 100px;background-size: cover;background-repeat: no-repeat;border-radius: 50%;"></div></a><br>
          <h5 style="font-size: 12px;font-weight: bold">
            <?= $suggest['user_name'] ?><br>
            <small><?= $suggest['firstname'].' '.$suggest['last_name'] ?></small>
          </h5>
          <span onclick="remove_user(<?= $suggest['my_id'] ?>)"  style="position: absolute;top: 0px;right: 12px;">
            <a href="javascript:" >x</a>
          </span>

          <div class="container-fluid" style="padding-top:10px">
            
          <a href="#" class="bg-blue-500 px-2 py-1 
                        text-white font-semibold text-sm rounded block text-center 
                        sm:inline-block block">Follow</a>
          </div>
      </div>
            <?php
          }
        }
      ?>
    </div>
  </div>
      </div>
      <!-- user following for mobile only -->
      <ul class="flex md:hidden justify-around space-x-8 border-t 
                text-center p-2 text-gray-600 leading-snug text-sm">
        <li>
          <span class="font-semibold text-gray-800 block post_count"><?= $loader ?></span>
          posts
        </li>

        <li>
          <span class="font-semibold text-gray-800 block follower_count" ><?= $loader ?></span>
          followers
        </li>
        <li>
          <span class="font-semibold text-gray-800 block following_count"><?= $loader ?></span>
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
      <div class="flex flex-wrap -mx-px md:-mx-3 allposts">
                  <?php 
                $posts = "SELECT * FROM `post` left join users ON users.post_id = post.post_by LEFT JOIN google_user ON post.post_by = google_user.post_id WHERE post_by = ".$row['post_id']."";
              $posts_res = mysqli_query($con,$posts);

                if (mysqli_num_rows($posts_res) > 0) {
                  while ($po_row = mysqli_fetch_assoc($posts_res)) {
                    ?>
                <!-- column -->
                <div class="w-1/3 p-px md:px-3" >
                  <!-- post 1-->
                    <article class="post bg-gray-100 text-white relative pb-full md:mb-6">
                      <!-- post image-->
                      <img class="w-full h-full absolute left-0 top-0 object-cover" src="https://i2.wp.com/www.cssscript.com/wp-content/uploads/2019/06/skeleton-loader-placeholder.jpg?fit=520%2C394&ssl=1" alt="image">
                    </article>
                </div>

                <?php 

              }
            }
        ?>
      </div>

        <!-- igtv -->
       <div class="flex flex-wrap -mx-px md:-mx-3 igtv"> 


       </div>

      <!-- tags -->
      <div class="flex flex-wrap -mx-px md:-mx-3 tags"></div>

    </div>
  </div>
</main>

<input type="hidden" value="<?= $row['user_name'] ?>" id="user_name">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js"></script>

<script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 2.5,
      spaceBetween: 30,
      slidesPerGroup: 3,
      loop: false,
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script>
<?php 
require 'js/script.js';
?>
