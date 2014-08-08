<?php

	// keep track of session data
	session_start();

	// grabbing person's UID & name info
	$_SESSION['prof_UID'] 	= isset($_GET['user']) ? $_GET['user'] : "";
	$_SESSION['prof_name'] 	= isset($_GET['name']) ? $_GET['name'] : "";

	// picture URL request
	$pic = "https://graph.facebook.com/" . $_SESSION['prof_UID'] . "/picture?type=large";

	// FB Graph API request to grab user's communities
	$_SESSION['user_networks_request'] = "http://api.go-vibe.com/api/location.php?action=getLocations&uid=";
	$_SESSION['user_networks_request'] .= $_SESSION['prof_UID'] . "&token=" . $_SESSION['token'];
?>

<!DOCTYPE html>

<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->
<head>
	<title><?php echo $_SESSION['prof_name']; ?></title>

	<!-- jQuery & jQuery UI -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

	<!-- font awesome -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<script type="text/javascript">

		// initializing the last stored element to none
		localStorage.setItem("latest_pid_profile", "null value");

		$(function() {

			// JSON of person's communities
			var user_networks_url = "<?php echo $_SESSION['user_networks_request']; ?>";

			$.getJSON(user_networks_url, function(data) {

				var network_string 	= ""; 
				var num_networks 	= data['data'].length;

				for(var i = 0; i < num_networks; i++) {
		
					// limit output of communities
					if(i < 1) {
						network_string += data['data'][i]['Name'] + '<br />'; 
					}
				}

				$('#network_info').html(network_string);
			});

		});
	</script>

	<!-- loading of elements -->
	<script type="text/javascript">
		
		$(function() {
			// loading the navbar
			$('#new_navbar').load('new_navbar.php'); 

			// loading sidebar
			$('#new_sidebar').load('new_sidebar.php'); 

			// loading profile element
			$('#posts_location').load('new_profile_element.php'); 
		});
	</script>

	<!-- overall settings -->
	<?php require_once("webpage_settings.php"); ?>
	
</head>
<body class="scripts-async menu-right-hidden">
	
	<!-- Main Container Fluid -->
	<div class="container-fluid ">
	
		<!-- Content START -->
		<div id="content">
			
			<!-- loading NAVBAR here... -->	
			<div id="new_navbar"></div>

			<!-- <div class="layout-app">  -->
			<div class="container"><div class="innerAll">
				<div class="row">
					<div class="col-lg-9 col-md-8">
						
						<div class="timeline-cover">	
							<div class="cover image ">
								<div style="height: 50px"></div>
								<ul class="list-unstyled">
									<li class="active"><a href="index.html?lang=en"><i class="fa fa-fw fa-clock-o"></i> <span>Timeline</span></a></li>
								</ul>
							</div>
							<div class="widget cover image">	
								<div class="widget-body padding-none margin-none">
									<div class="photo">
										<!-- NOTE: on failure (i.e. FB 2.0 non-user), it should load up a default gray person symbol -->
										<img src=<?php echo '"' . $pic .'"' ?> class="img-circle" style="width: 100px"/> 
									</div>
									<div class="innerAll border-right pull-left">
										<h3 class="margin-none"><?php echo $_SESSION['prof_name'] ?></h3>
										<span id="network_info"></span>
									</div>
									<div class="innerAll pull-left">
										<p class="lead margin-none ">
											<i class="fa fa-quote-left text-muted fa-fw"></i> Hello! This is an optional caption.
										</p>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>

						<!-- structure of profile post -->
						
						<!-- denotes one post and all of its comments (for now) -->
						<div id="posts_location"></div>

					</div>

					<!-- STARTING WIDGETS ON THE SIDE -->
					<div class="col-md-4 col-lg-3">

						<!-- load SIDEBAR here... -->	
						<div id="new_sidebar"></div>
							
					</div>
					<!-- // Content END -->
					
					<div class="clearfix"></div>
						
				</div>
				<!-- // Main Container Fluid END -->
			</div></div>
			

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
			
</body>
</html>