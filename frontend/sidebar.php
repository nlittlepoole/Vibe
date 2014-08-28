
<!-- notifications, created by Noah Stebbins -->

<!-- SEE NOTIFICATIONS -->
<script type="text/javascript">

	$(function() {

		// hide notifications toolbar (once the HTML has been generated)
		$('#notifications_toolbar').hide();

		// check if window width is large enough to make notifications bigger
		if($(window).width() > 1000) {
		  	$('#notifications_toolbar').find('.widget').css('width', '300px');
		}
	});

	// maintains dynamic POS on SCROLL
	$(window).scroll(function() {

	  var offset = $('#custom_globe').offset();
	  var top_offset = $(document).scrollTop() + 38;
	  top_offset += "px";

	  $('#notifications_toolbar').css({
		   'position' 	: 'absolute',
		   'left' 		: offset.left + 12,
		   'top' 		: top_offset,
		   'z-index' 	: '10000'
	  });
	});

	// maintains dynamic POS on RESIZE
	$(window).resize(function() {

	  // upon resize make window smaller again
	  if($(window).width() < 1000) {
	  	$('#notifications_toolbar').find('.widget').css('width', '');
	  }

	  var offset = $('#custom_globe').offset();
	  var top_offset = $(document).scrollTop() + 38;
	  top_offset += "px";

	  $('#notifications_toolbar').css({
		   'position' 	: 'absolute',
		   'left' 		: offset.left + 6,
		   'top' 		: top_offset,
		   'z-index' 	: '10000'
	  });
	});

	$(function() {
		$('#notification_elems').load('sidebar_element.php', function() {

			$(window).load(function() {

				// listen for notification click -- render the individual page if of type "posted about you"
				$(".notif_link").on("click", function() {

					var temp_post_pid 		= $(this).closest("div.notif_body").find('.pid_notif_post').text();
					var temp_post_timestamp = $(this).closest("div.notif_body").find('.timestamp_notif_post').text();
					var temp_post_JSON 		= $(this).closest("div.notif_body").find('.JSON_notif_post').text();

					var submission_form = [
						'<form class="notif_submit" action="http://api.go-vibe.com/frontend/post.php" method="post">', 
							'<input type="hidden" name="currPID" value=\'' + temp_post_pid + '\'></input>', 
							'<input type="hidden" name="currTimestamp" value="' + temp_post_timestamp + '"></input>', 
							'<input type="hidden" name="currJSON" value=\'' + temp_post_JSON + '\'></input>', 
						'</form>'
					].join('\n');

					$(submission_form).appendTo('body').submit();
				});
			});
		}); 
	});

</script>

<div id="notifications_toolbar">
	<i class="fa fa-caret-up" style="margin-bottom: 0px; padding-bottom: 0px"></i>
	<div class="widget">
		<h5 class="innerAll margin-none border-bottom bg-gray">Notifications</h5>
		<div class="widget-body padding-none">
			<div id="notification_elems"></div>
		</div>
	</div>
</div>