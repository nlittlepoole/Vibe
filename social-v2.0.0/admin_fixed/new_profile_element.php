<?php
	// for now, just profile element, but dynamic rendering in future

	// continue session
	session_start();

	$_SESSION['profile_elems_request'] = "http://api.go-vibe.com/api/user.php?action=getStream";
	$_SESSION['profile_elems_request'] .= "&uid=" . $_SESSION['userID']  . "&token=" . $_SESSION['token'];
	$_SESSION['profile_elems_request'] .= "&user=" . $_SESSION['prof_UID']; 
?>

<script type="text/javascript">

	$(function() {

		// JSON request for profile elements
		var profile_url = "<?php echo $_SESSION['profile_elems_request']; ?>";

		console.log('profile url of elements: ' + profile_url); 
		console.log('[STATUS] did get to the JavaScript...'); 

		// grabbing JSON...
		$.getJSON(profile_url, function(data) {

		    if (!data.error) {
		    	console.log("The number of posts about this person is: " + data['data'].length); 
		    }
		    else {
		    	// there was an error with grabbing JSON
		    	console.log('[STATUS] error grabbing JSON for profile elements');
		    }
		}); 
	});

</script>

<!-- DENOTES A SPECIFIC POST GROUP (NOT JUST ONE POST) -->
<div class="widget profile-post-group">
	<!-- Info -->
	<div class="bg-primary">
		<div class="media">
			<div class="media-body innerTB" style="padding-left:20px;">
				<a href="" class="text-white strong">Someone</a>
				<span>upped your <a href="" class="text-white strong">Foodaholic</a> on 15th January, 2014 <i class="icon-time-clock"></i></span>

			</div>

		</div>
	</div>
	<!-- Content -->
	<div class="innerAll">
		<p class="lead">Dude, you got to lay off the Subway.</p>
	</div>
	<!-- Comment Header -->
	<div class="bg-gray innerAll border-top border-bottom text-small ">
		<span>View all <a href="" class="text-primary">1 Comment</a></span>
	</div>
	
	<!-- First Comment -->
	<div class="media border-bottom margin-none bg-gray">
		<a href="" class="pull-left innerAll half">
			<img src="../assets//images/people/100/2.jpg" width="60" class="media-object">
		</a>
		<div class="media-body innerTB">
			<a href="#" class="pull-right innerT innerR text-muted">
				<i class="icon-reply-all-fill fa fa-2x "></i>
			</a>
			<a href="" class="strong text-inverse">Adrian Demian</a> <small class="text-muted ">wrote on Jan 15th, 2014</small> <a href="" class="text-small">like</a>
			
			<div>That $5 is worth it though.</div>

		</div>
	</div>
	
	<input type="text" class="form-control" placeholder="Comment here...">

</div>