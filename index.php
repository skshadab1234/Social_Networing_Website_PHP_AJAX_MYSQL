<?php
	require 'session.php';
	?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Notification Bar</title>
	<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

		<!-- jQuery library -->
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<!-- Latest compiled JavaScript -->
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<style>
		nav ul li a, nav ul li a:visited{
		background-color: #fff;
		}

		a:hover{
		text-decoration: none
		}
		.navigation {
		height: 70px;
		background: #262626;
		}

		.brand {
		position: absolute;
		padding-left: 20px;
		float: left;
		line-height: 70px;
		text-transform: uppercase;
		font-size: 1.4em;
		}
		.brand a,
		.brand a:visited {
		color: #ffffff;
		text-decoration: none;
		}

		.nav-container {
		max-width: 90vw;
		margin: 0 auto;
		}

		nav {
		float: right;
		}
		nav ul {
		list-style: none;
		margin: 0;
		padding: 0;
		}
		nav ul li {
		float: left;
		position: relative;
		}
		nav ul li ul li{
			width: 38vw;
		}
		nav ul li a,
		nav ul li a:visited {
		display: block;
		padding: 0 20px;
		line-height: 70px;
		background: #262626;
		color: #ffffff;
		text-decoration: none;
		}
		nav ul li a:hover,
		nav ul li a:visited:hover {
		background: #2581DC;
		color: #ffffff;
		}
		nav ul li a:not(:only-child):after,
		nav ul li a:visited:not(:only-child):after {
		padding-left: 4px;
		content: ' ';
		}
		nav ul li ul li {
		min-width: 190px;
		}
		nav ul li ul li a {
		padding: 15px;
		line-height: 20px;
		}

		.nav-dropdown {
		position: absolute;
		display: none;
		z-index: 1;
		box-shadow: 0 3px 12px rgba(0, 0, 0, 0.15);
		}

		/* Mobile navigation */
		.nav-mobile {
		display: none;
		position: absolute;
		top: 0;
		right: 0;
		background: #262626;
		height: 70px;
		width: 70px;
		}


		@media only screen and (max-width: 798px) {
		.nav-mobile {
		display: block;
		}

		nav {
		width: 100%;
		padding: 70px 0 15px;
		}
		nav ul {
		display: none;
		}
		nav ul li {
		float: none;
		}
		nav ul li a {
		padding: 15px;
		line-height: 20px;
		}

		nav ul li ul li{
			width: 100vw;
		}

		nav ul li ul li a {
		padding-left: 30px;
		}

		.nav-dropdown {
		position: static;
		}

		.nav-container{
			max-width: 100vw
		}
		}
		@media screen and (min-width: 799px) {
		.nav-list {
		display: block !important;
		}

		}
		#nav-toggle {
		position: absolute;
		left: 18px;
		top: 22px;
		cursor: pointer;
		padding: 10px 35px 16px 0px;
		}
		#nav-toggle span,
		#nav-toggle span:before,
		#nav-toggle span:after {
		cursor: pointer;
		border-radius: 1px;
		height: 5px;
		width: 35px;
		background: #ffffff;
		position: absolute;
		display: block;
		content: '';
		transition: all 300ms ease-in-out;
		}
		#nav-toggle span:before {
		top: -10px;
		}
		#nav-toggle span:after {
		bottom: -10px;
		}
		#nav-toggle.active span {
		background-color: transparent;
		}
		#nav-toggle.active span:before, #nav-toggle.active span:after {
		top: 0;
		}
		#nav-toggle.active span:before {
		transform: rotate(45deg);
		}
		#nav-toggle.active span:after {
		transform: rotate(-45deg);
		}

.container1	 {
background: #262626;
position: relative;
line-height: 37px;
/* top: 10px; */
padding: 10px;
}

.search-box {
  display: inline-block;
  width: 100%;
  border-radius: 3px;
  padding: 4px 55px 4px 15px;
  position: relative;
  background: #fff;
  border: 1px solid #ddd;
  -webkit-transition: all 200ms ease-in-out;
  -moz-transition: all 200ms ease-in-out;
  transition: all 200ms ease-in-out;
}
.search-box.hovered, .search-box:hover, .search-box:active {
  border: 1px solid #aaa;
}
.search-box input[type=text] {
  border: none;
  box-shadow: none;
  display: inline-block;
  padding: 0;
  background: transparent;
}
.search-box input[type=text]:hover, .search-box input[type=text]:focus, .search-box input[type=text]:active {
  box-shadow: none;
}
.search-box .search-btn {
  position: absolute;
  right: 2px;
  top: 2px;
  color: #aaa;
  border-radius: 3px;
  font-size: 21px;
  padding: 5px 10px 1px;
  -webkit-transition: all 200ms ease-in-out;
  -moz-transition: all 200ms ease-in-out;
  transition: all 200ms ease-in-out;
}
.search-box .search-btn:hover {
  color: #fff;
  background-color: #8FBE00;
}

</style>
</head>
<body>

<section class="navigation">
  <div class="nav-container">
    <div class="brand">
      <a href="#!">SKZONE</a>
    
    </div>

    <nav>
      <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
      <ul class="nav-list">
        <li>
          <a href="#!" >Notification <span class="badge badge-secondary count"></span></a>
          <ul class="nav-dropdown" id="notication">
          </ul>
        </li>
       	<?php
			if (isset($_SESSION['access_token']) || isset($_SESSION['USER_ID'])) {
				echo ' <li>
				          <a href="#!" >'.$user['firstname'].' '.$user['last_name'].'</a>
				          <ul class="nav-dropdown">
				          	<li><a href="logout.php">Logout</a></li>
				          </ul>
				       </li>';
			}else{
				echo "<li><a href='login.php'>Login</a></li>";
			}
		?>
		<li>
				<div class='container-fluid container1' >
				  <div class='row'>
				    <div class='col-md-12'>
				      <div class='search-box'>
				        <form class='search-form' action="serach_query.php" method="post">
				          <input class='form-control' id="search" placeholder='Search user' type='text'>
				          <button class='btn btn-link search-btn'>
				            <i class='glyphicon glyphicon-search'></i>
				          </button>
				        </form>
				      </div>
				    </div>
				  </div>
				</div>
 					<ul class="nav-dropdown" id="drop">
				          	<!-- <a href="logout.php" style="position: absolute;display: block;width: 100%;">Logout</a> -->
				     </ul>
		</li>
      </ul>
    </nav>
  </div>
</section>

<script>
	$(document).ready(function() {

		function message_unseen(message = '')
		{
			$.ajax({
				url: "get_msg.php",
				method: "post",
				dataType: "JSON",
				data: {message:message},
				success: function(data){
					$("#notication").html(data.notification);
					$(".count").html(data.unseen_message);
				}
			});
		}


		setInterval( () => {
			message_unseen();
		}, 2000)

		$("#search").on("keyup", function(){
			var search = $(this).val();
				if (search != '') {
					$.ajax({
					url: "search_user.php",
					type: "post",
					data: {search:search},
					success: function(result){
				        jQuery("#drop").fadeIn();
						$("#drop").html(result);
					}
				});
				}else{
					$("#drop").fadeOut();
					$("#drop").html("");
				}	
		});
		$(document).on('click', '#myitem', function(){
					$("#search").val(jQuery(this).text());
					$("#drop").fadeOut();
		}); 

		$("#search").focusout( () => {
			$("#drop").fadeOut();
		});
	});	
</script>
<script>
	(function($) { // Begin jQuery
  $(function() { // DOM ready
    // If a link has a dropdown, add sub menu toggle.
    $('nav ul li a:not(:only-child)').click(function(e) {
      $(this).siblings('.nav-dropdown').toggle();
      // Close one dropdown when selecting another
      $('.nav-dropdown').not($(this).siblings()).hide();
      e.stopPropagation();
    });
    // Clicking away from dropdown will remove the dropdown class
    $('html').click(function() {
      $('.nav-dropdown').hide();
    });
    // Toggle open and close nav styles on click
    $('#nav-toggle').click(function() {
      $('nav ul').slideToggle();
    });
    // Hamburger to X toggle
    $('#nav-toggle').on('click', function() {
      this.classList.toggle('active');
    });
  }); // end DOM ready
})(jQuery); // end jQuery
</script>
</body>
</html>