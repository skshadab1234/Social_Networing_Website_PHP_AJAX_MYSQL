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

		$(".igtv").hide();
		$(".tags").hide();
		$("#post").css("border-top","2px solid #4299e1");
		$("#post").addClass(" md:-mt-px md:text-gray-700");
		$("#post").css({"color": "#4299e1", "font-weight": "700", "font-size" : "1rem"});
		$("#igtv").click(function(){
			$(".igtv").show();
			$(".post").hide();
			$(".tags").hide();
			$("#post").css("color","#000");
			$("#tags").css("color","#000");
			$("#post").css("border-top","0px solid #4299e1");
			$("#tags").css("border-top","0px solid #4299e1");
			$(this).css("color","#4299e1");
			$(this).css({"font-weight": "700", "font-size" : "1rem"});
			$("#post").css({"font-weight": "lighter", "font-size" : ".75rem"});
			$("#tags").css({"font-weight": "lighter", "font-size" : ".75rem"});
			$(this).css("border-top","2px solid #4299e1");
			$(this).addClass(" md:-mt-px md:text-gray-700");
			$("#post").removeClass(" md:-mt-px md:text-gray-700");
			$("#tags").removeClass(" md:-mt-px md:text-gray-700");
		});

		$("#post").click(function(){
			$(".igtv").hide();
			$(".tags").hide();
			$(".post").show();
			$("#igtv").css("color","#000");
			$("#tags").css("color","#000");
			$("#igtv").css("border-top","0px solid #4299e1");
			$("#tags").css("border-top","0px solid #4299e1");
			$(this).css("color","#4299e1");
			$(this).css("border-top","2px solid #4299e1");
			$(this).css({"font-weight": "700", "font-size" : "1rem"});
			$("#igtv").css({"font-weight": "lighter", "font-size" : ".75rem"});
			$("#tags").css({"font-weight": "lighter", "font-size" : ".75rem"});
			$(this).addClass(" md:-mt-px md:text-gray-700");
			$("#igtv").removeClass(" md:-mt-px md:text-gray-700");
			$("#tags").removeClass(" md:-mt-px md:text-gray-700");

		});


		$("#tags").click(function(){
			$(".post").hide();
			$(".igtv").hide();
			$(".tags").show();
			$("#igtv").css("color","#000");
			$("#post").css("color","#000");
			$("#igtv").css("border-top","0px solid #4299e1");
			$("#post").css("border-top","0px solid #4299e1");
			$(this).css("color","#4299e1");
			$(this).css("border-top","2px solid #4299e1");
			$(this).css({"font-weight": "700", "font-size" : "1rem"});
			$("#post").css({"font-weight": "lighter", "font-size" : ".75rem"});
			$("#igtv").css({"font-weight": "lighter", "font-size" : ".75rem"});
			$(this).addClass(" md:-mt-px md:text-gray-700");
			$("#igtv").removeClass(" md:-mt-px md:text-gray-700");
			$("#post").removeClass("md:-mt-px md:text-gray-700");
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