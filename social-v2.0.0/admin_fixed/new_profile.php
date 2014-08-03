<?php

	// keep track of session data
	session_start();

	// grabbing person's UID & name info
	$_SESSION['prof_UID'] 	= isset($_GET['user']) ? $_GET['user'] : "";
	$_SESSION['prof_name'] 	= isset($_GET['name']) ? $_GET['name'] : "";

	// picture URL request
	$pic = "https://graph.facebook.com/" . $_SESSION['prof_UID'] . "/picture?type=large";

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
	
	<!-- overall settings -->
	<?php require_once("webpage_settings.php"); ?>

	<!-- jQuery & jQuery UI -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

	<!-- font awesome -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<script type="text/javascript">

		$(function() {

			// REQUEST to get locations
			var user_networks_url = "<?php echo $_SESSION['user_networks_request']; ?>";

			// GRABBING THE JSON of newsfeed elements

			$.getJSON(user_networks_url, function(data) {
				//onsole.log("DATA: " + data['data'][0]['Name']);
				num_networks = data['data'].length;

				for(var i = 0; i < num_networks; i++) {
					console.log(data['data'][i]['Name']);
				}
				/*
				for (location_name in data['data']) {
    				console.log(location_name['Name']);
    			}
    			*/
			});

		});
	</script>
	
</head>
<body class="scripts-async menu-right-hidden">
	
	<!-- Main Container Fluid -->
	<div class="container-fluid ">
	
		<!-- Content START -->
		<div id="content">
			
			<!-- NAVBAR LOAD -->	
			<script src="../assets/library/jquery/jquery.min.js"></script>
			<script> 
			    $(function(){
			      $('#new_navbar').load('new_navbar.php'); 
			    });
			</script> 
			<div id="new_navbar"></div>


			<!-- <div class="layout-app">  -->
			<div class="container"><div class="innerAll">
				<div class="row">
					<div class="col-lg-9 col-md-8">
						
						<div class="timeline-cover">	
							<div class="cover image ">
								<div style="height: 50px"></div>
								<!-- <div class="top"><img src="../assets//images/photodune-2755655-party-time-s.jpg" class="img-responsive" />				</div>-->
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
										<span id="network_info">Works at Anchorage Capital, L.L.C.</span>
									</div>
									<div class="innerAll pull-left">
										<p class="lead margin-none "> <i class="fa fa-quote-left text-muted fa-fw"></i> Hello! This is an optional caption.</p> 
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>

						<!-- structure of profile post -->
						
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
									<a href="" class="strong text-inverse">Adrian Demian</a> 	<small class="text-muted ">wrote on Jan 15th, 2014</small> <a href="" class="text-small">like</a>
									<div>That $5 is worth it though.</div>

								</div>
							</div>
							
							<input type="text" class="form-control" placeholder="Comment here...">

						</div>

					</div>


					<!-- STARTING WIDGETS ON THE SIDE -->
					<div class="col-md-4 col-lg-3">


						<!-- SIDEBAR LOAD -->	
						<script src="../assets/library/jquery/jquery.min.js"></script>
						<script> 
						    $(function(){
						      $('#new_sidebar').load('new_sidebar.php'); 
						    });
						</script> 
						<div id="new_sidebar"></div>
							
					</div>
					<!-- // Content END -->
					
					<div class="clearfix"></div>
					<!-- // Sidebar menu & content wrapper END -->
				
						
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