<?php
	
	session_start();

	// FRIENDS LIST: grab friend's data from Facebook

	$request = "http://api.go-vibe.com/api/user.php?action=getFriends&blocked=no&uid=";
	$request .= $_SESSION['userID'] . "&token=" . $_SESSION['token'];

	$friends = json_decode(file_get_contents($request),true);
	$friends = $friends['data'];

	usort($friends, function($a, $b) {
		return strcmp($a['Name'], $b['Name']);
	});

	$_SESSION['friend_list'] = $friends;

	// YOUR NEWSFEED: grabbing entire newsfeed pertaining to UID 
	// [TO CHECK] how does it efficiently grab the content relevant to you?

	$_SESSION['newsfeed_elems_request'] = "http://api.go-vibe.com/api/user.php?action=getFeed&uid=";
	$_SESSION['newsfeed_elems_request'] .= $_SESSION['userID'] . "&token=" . $_SESSION['token'];
?>

<!DOCTYPE html>

<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->

<head>
	
	<title>Newsfeed</title>

	<?php require_once("webpage_settings.php"); ?>

	<!-- NOAH'S DEPENDENCIES -->

	<!-- jQuery & jQuery UI -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

	<!-- font awesome -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- END NOAH'S DEPENDENCIES -->

	<!-- autocomplete code && form submission -->
	<script type="text/javascript">

		// initializing the last stored element to none
		localStorage.setItem("latest_pid", "null value");
		
		$(function() {
			
			// friends' list
			var my_friends = <?php echo json_encode($_SESSION['friend_list']); ?>;

			var names_to_ID = []; 
			var friends_names = []; 

			// parsing list into SESSION dictionary
			for(var i = 0; i < my_friends.length; i++) {
				names_to_ID[my_friends[i]['Name']] = my_friends[i]['UID'];
				friends_names[i] = my_friends[i]['Name'];
			}

			if(friends_names.length != 0) {
			    $("#inputFriend").autocomplete({
				     source: friends_names
			    });
			}

		    // mapping a user's friend name to UID

			$("#statusform").submit(function(event) {

	  			event.preventDefault();
	  			
	  			var inputted_name = $('#statusform input[name="recipient_to_convert"]').val();
	  			var desired_uid = names_to_ID[inputted_name]

				$('#statusform input[name="recipient"]').val(desired_uid);
	  			// $("#statusform").submit();

	  			
	  			$.post("http://api.go-vibe.com/api/vibe.php?action=postVibe", $("#statusform").serialize())

	  				.done(function(data) {
	  					// $(".vibe_newsfeed_posts").remove();
	  					$('input[id="inputFriend"]').val("");
	  					$('input[id="inputVibe"]').val("");

	  					// [TO IMPLEMENT] clear the old elements and update HTML with new elements from SQL call)
	  					// $(".vibe_newsfeed_posts").remove();
	  					$('#last_elems').load('newsfeed_element.php'); 
	  					// alert('about to trigger the newsfeed element upload');
					    
	  			});

			});


			// periodic action
			function update() {
				$('#last_elems').load('newsfeed_element.php'); 
			}
			

			setInterval(update, 60000);	 	// send the GET request every 60 seconds


			// custom design change - (dark blue on hover instead of turquoise)

			$("#status_submit").on("mouseenter", function() {
			  	$(this).css("background-color", "#275379");
			  	$(this).css("border-color", "#275379");
			});

			$("#status_submit").on("mouseleave", function() {
			  	$(this).css("background-color", "#428bca");
			  	$(this).css("border-color", "#428bca");
			});
		});

	</script>

	<style type="text/css">
	  /* autocomplete box */
	  .ui-autocomplete {
		   max-height: 400px;
		   overflow-y: auto;
		   overflow-x: hidden;		/* prevent horizontal scrollbar */
	  }
	</style>
	
</head>
<body class=" scripts-async menu-right-hidden">
	
	<!-- Main Container Fluid -->
	<div class="container-fluid ">

		
<!-- Content START -->
<div id="content">
	
	<!-- NAVBAR LOAD -->	
	<script> 
	    $(function(){
	      $('#new_navbar').load('new_navbar.php'); 
	    });
	</script> 
	<div id="new_navbar"></div>


<div class="container"><div class="innerAll">
	<div class="row">
		<div class="col-lg-9 col-md-8">
			
			<div class="timeline-cover">

				<!-- WIDGET -->
				<div class="widget widget-heading-simple widget-body-white">
					
					<div class="widget-body">
						<div class="innerLR">
							<div class="col-sm-12" style="padding: 0px; margin-bottom: 15px;">
								
								<div class="bg-gray innerAll border-top border-bottom">
									<h4 style="text-align: center; color: #428bca; margin-top: 5px; margin-bottom: 5px;" class="heading"><?php echo $_SESSION['first_name']; ?>, what's on your mind?</h4>
								</div>

							</div>
							<form name="status" id="statusform" class="form-horizontal" method="post" action="http://api.go-vibe.com/api/vibe.php?action=postVibe">
							    <div class="form-group">
							        <label for="inputFriend" class="col-sm-2 control-label">Friend</label>
							        
							        <div class="col-sm-9">
							            <input type="text" class="form-control" id="inputFriend" name="recipient_to_convert" placeholder="Who's this about? Type in a Facebook friend!">
							        	<input type="hidden" value="" name="recipient" />
							        	<input type="hidden" value="newsfeed" name="post_source" />
							        </div>

							    </div>
							    <div class="form-group">
							    	<input type="hidden" name="uid" value=<?php echo '"' . $_SESSION['userID'] . '"' ?>>
    								<input type="hidden" name="token" value=<?php echo '"' . $_SESSION['token'] . '"' ?>>
    							</div>
							    <div class="form-group">
							        
							        <label for="inputVibe" class="col-sm-2 control-label">Vibe</label>
							        
							        <div class="col-sm-9">
							            <input type="text" class="form-control" name="status" id="inputVibe" placeholder="What do you want to say?">
							        </div>

							    </div>
							    <div class="form-group">

							        <div class="col-sm-offset-2 col-sm-10">
							            <button type="submit" value="Submit" id="status_submit" class="btn btn-primary" style="width: 20%">Share&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i></button>
							        </div>

							    </div>
							</form>
						</div>
					</div>
				
				</div>
				<!-- // Widget END -->

			<!-- END OF NORMAL TIMELINE -->	
			</div>
			
			<div class="media">
				
				<a href="" class="btn btn-default pull-left">Today</a>
				<div class="media-body">
					  <div class="input-group">
					      <input type="text" class="form-control" placeholder="Share your mood...">
					      <span class="input-group-btn">
					        <button class="btn btn-primary" type="button">Search</button>
					      </span>
					    </div><!-- /input-group -->
				</div>
			</div>

			<ul class="timeline-activity list-unstyled" id="newsfeed_container">

				<div id="last_elems"></div>

				<!-- NEWSFEED LOADING INFRASTRUCTURE -->
				
				<script> 
				    $(function(){
				      	$('#last_elems').load('newsfeed_element.php'); 
				    });
				</script> 


				<!-- END OF NEWSFEED LOADING INFRASTRUCTURE -->

			</ul>				
		</div>

			<!-- SIDEBAR WIDGET -->
			<div class="col-md-4 col-lg-3">

				<script> 
				    $(function(){
				      $('#new_sidebar').load('new_sidebar.php'); 
				    });
				</script> 
				<div id="new_sidebar"></div>
					
			</div> 
				
		</div>
		<!-- // Content END -->
		
		<div class="clearfix"></div>
		<!-- // Sidebar menu & content wrapper END -->
		
		<!-- Footer -->
		<div id="footer" class="hidden-print">
			
			<!--  Copyright Line -->
			<div class="copy">&copy; 2012 - 2014 - <a href="http://www.mosaicpro.biz">MosaicPro</a> - All Rights Reserved. <a href="http://themeforest.net/?ref=mosaicpro" target="_blank">Purchase Social Admin Template</a> - Current version: v2.0.0-rc8 / <a target="_blank" href="../assets/../../CHANGELOG.txt?v=v2.0.0-rc8">changelog</a></div>
			<!--  End Copyright Line -->
	
		</div>
		<!-- // Footer END -->
				
	</div>
	<!-- // Main Container Fluid END -->
	

	<!-- Global -->
	<script data-id="App.Config">
		var basePath = '',
		commonPath = '../assets/',
		rootPath = '../',
		DEV = false,
		componentsPath = '../assets/components/';
	
	var primaryColor = '#25ad9f',
		dangerColor = '#b55151',
		successColor = '#609450',
		infoColor = '#4a8bc2',
		warningColor = '#ab7a4b',
		inverseColor = '#45484d';
	
	var themerPrimaryColor = primaryColor;

		App.Config = {
		ajaxify_menu_selectors: ['#menu'],
		ajaxify_layout_app: false	};
	</script>

	<!-- preloading -->
	<script src="../../customjs/instantclick.min.js" data-no-instant></script>
	<script data-no-instant>InstantClick.init();</script>
	
</body>
</html>