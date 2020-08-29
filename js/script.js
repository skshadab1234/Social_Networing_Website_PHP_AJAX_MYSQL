<script>
	$(document).ready(function() {
		$(".suggested_div").hide();
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


		function fetch_follow_following_data(){
			var user_name = $("#user_name").val();
			$.ajax({
				url: "fetch_follow_following_data.php",
				method: "post",
				dataType: "JSON",
				data: {user_name:user_name},
				success: function(data){
					$("#user_img").html(data.user_img);
					$(".follower_count").html(data.follow_count);
					$(".following_count").html(data.following_count);
					$(".post_count").html(data.posts);
					$("#follow_button").html(data.followby_output);
					$(".allposts").html(data.post_output);
					$(".igtv").html(data.igtv);
					$(".tags").html(data.tags);
				}
			});
		}

		setInterval( () => {
			fetch_follow_following_data();
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

		$(".igtv").hide();
		$(".tags").hide();
		$("#post").css("border-top","2px solid #4299e1");
		$("#post").addClass(" md:-mt-px md:text-gray-700");
		$("#post").css({"color": "#4299e1"});
		$("#igtv").click(function(){
			$(".igtv").show();
			$(".tags").hide();
			$(".allposts").hide();

			$("#post").css("color","#000");
			$("#tags").css("color","#000");
			$("#post").css("border-top","0px solid #4299e1");
			$("#tags").css("border-top","0px solid #4299e1");
			$(this).css("color","#4299e1");
			$(this).css("border-top","2px solid #4299e1");
			$(this).addClass(" md:-mt-px md:text-gray-700");
			$("#post").removeClass(" md:-mt-px md:text-gray-700");
			$("#tags").removeClass(" md:-mt-px md:text-gray-700");
		});

		$("#post").click(function(){
			$(".igtv").hide();
			$(".tags").hide();
			$(".allposts").show();
			$("#igtv").css("color","#000");
			$("#tags").css("color","#000");
			$("#igtv").css("border-top","0px solid #4299e1");
			$("#tags").css("border-top","0px solid #4299e1");
			$(this).css("color","#4299e1");
			$(this).css("border-top","2px solid #4299e1");
			$(this).addClass(" md:-mt-px md:text-gray-700");
			$("#igtv").removeClass(" md:-mt-px md:text-gray-700");
			$("#tags").removeClass(" md:-mt-px md:text-gray-700");

		});


		$("#tags").click(function(){
			$(".allposts").hide();
			$(".igtv").hide();
			$(".tags").show();
			$("#igtv").css("color","#000");
			$("#post").css("color","#000");
			$("#igtv").css("border-top","0px solid #4299e1");
			$("#post").css("border-top","0px solid #4299e1");
			$(this).css("color","#4299e1");
			$(this).css("border-top","2px solid #4299e1");
			$(this).addClass(" md:-mt-px md:text-gray-700");
			$("#igtv").removeClass(" md:-mt-px md:text-gray-700");
			$("#post").removeClass("md:-mt-px md:text-gray-700");
		});

	
		$(".show_suggest").click(function() {
				$(this).hide();
				$(".hide_suggest").show();
				$(".suggested_div").fadeIn();
				$(".suggested_div").show();

		});


		$(".hide_suggest").click(function() {
			$(this).hide();
			$(".show_suggest").show();
			$(".suggested_div").fadeIn();
			$(".suggested_div").hide();
		});
	});	

	function remove_user(id){
		$(".user_div_"+id).remove();
		$(".user_div_"+id).fadeOut();
	}


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