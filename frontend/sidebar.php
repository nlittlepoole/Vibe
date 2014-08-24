
<!-- SIDEBAR, created by Noah Stebbins -->

<!-- SEE MONTH POST HISTORY -->
<!--
<div class="widget">
	<h5 class="innerAll margin-none bg-primary">Recent</h5>
	<div class="widget-body padding-none">
		<ul class="list-group list-group-1 borders-none margin-none">
			<li class="list-group-item"><a href="">January</a></li>
			<li class="list-group-item"><a href="">December</a></li>
		</ul>
	</div>
</div>
-->

<!-- SEE NOTIFICATIONS -->
<script type="text/javascript">
	$(window).load(function() {

		// dynamically load notification elements
		// TO IMPLEMENT: insert notification element loading here (from separate file)

		// render position
		var offset = $('#custom_globe').offset();
		var top_offset = $(document).scrollTop() + 38;
	  	top_offset += "px";

	  	// properties upon content
  		$('#notifications_toolbar').hide();
  		$('#notifications_toolbar').css({
		   'position' 	: 'absolute',
		   'left' 		: offset.left + 12,
		   'top' 		: top_offset,
		   'z-index' 	: '10000'
		});
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
</script>

<div id="notifications_toolbar">
	<i class="fa fa-caret-up" style="margin-bottom: 0px; padding-bottom: 0px"></i>
	<div class="widget">
		<h5 class="innerAll margin-none border-bottom bg-gray">Recent News</h5>
		<div class="widget-body padding-none">
			<div class="media border-bottom innerAll margin-none">
				<img src="../assets/images/people/35/22.jpg" class="pull-left media-object"/>
				<div class="media-body">
					<a href="" class="pull-right text-muted innerT half">
						<i class="fa fa-comments"></i> 4
					</a>
					<h5 class="margin-none"><a href="" class="text-inverse">Someone upped your Kindness</a></h5>
					<small>on February 12th, 2014 </small> 
				</div>
			</div>
		</div>
	</div>
</div>