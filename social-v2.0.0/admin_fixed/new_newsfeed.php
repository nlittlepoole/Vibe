<?php
	
	session_start();


	// HEADER FRIEND LIST PARSING 
	// -------------------------- 

	// (NOTE: for now, it throws the PHP everytime on loadup)
	$request = "http://api.go-vibe.com/api/user.php?action=getFriends&blocked=no&uid=". $_SESSION['userID'];
	$request .= "&token=" . $_SESSION['token'];

	$friends = json_decode(file_get_contents($request),true);

	$friends = $friends['data'];

	usort($friends, function($a, $b) {
		return strcmp($a['Name'], $b['Name']);
	});

	$_SESSION['friend_list'] = $friends;

	// NEWSFEED FRIEND POST PARSING
	// ---------------------------- 

	$_SESSION['newsfeed_elems_request'] = "http://api.go-vibe.com/api/user.php?action=getFeed&uid=" . $_SESSION['userID'];
	$_SESSION['newsfeed_elems_request'] .= "&token=" . $_SESSION['token'];
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->
<head>
	
	<title>Vibe</title>
	
	<!-- Meta -->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	
	<!-- In development, use the LESS files and the less.js compiler instead of the minified CSS loaded by default. -->
	<!-- <link rel="stylesheet/less" href="../assets/less/admin/module.admin.stylesheet-complete.layout_fixed.true.less" /> -->

	<!--[if lt IE 9]><link rel="stylesheet" href="../assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->

	<link rel="stylesheet" href="../assets/css/admin/module.admin.stylesheet-complete.layout_fixed.true.min.css" />
	
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

	<script src="../assets/plugins/core_ajaxify_loadscript/script.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>

	<!-- NOAH'S DEPENDENCIES -->

	<!-- jQuery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<!-- jQuery UI -->
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

	<!-- FONT AWESOME -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- END NOAH'S DEPENDENCIES -->

	<script>var App = {};</script>

	<script data-id="App.Scripts">
	App.Scripts = {

		/* CORE scripts always load first; */
		core: [
			'../assets/library/jquery/jquery.min.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/library/modernizr/modernizr.js?v=v2.0.0-rc8&sv=v0.0.1.2'
		],

		/* PLUGINS_DEPENDENCY always load after CORE but before PLUGINS; */
		plugins_dependency: [
			'../assets/library/bootstrap/js/bootstrap.min.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/library/jquery/jquery-migrate.min.js?v=v2.0.0-rc8&sv=v0.0.1.2'
		],

		/* PLUGINS always load after CORE and PLUGINS_DEPENDENCY, but before the BUNDLE / initialization scripts; */
		plugins: [
			'../assets/plugins/core_nicescroll/jquery.nicescroll.min.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/plugins/core_breakpoints/breakpoints.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/plugins/core_ajaxify_davis/davis.min.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/plugins/core_ajaxify_lazyjaxdavis/jquery.lazyjaxdavis.min.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/plugins/core_preload/pace.min.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/plugins/menu_sidr/jquery.sidr.js?v=v2.0.0-rc8', 
			'../assets/plugins/media_blueimp/js/blueimp-gallery.min.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/plugins/media_blueimp/js/jquery.blueimp-gallery.min.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/plugins/media_holder/holder.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/plugins/core_less-js/less.min.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/plugins/charts_flot/excanvas.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/plugins/core_browser/ie/ie.prototype.polyfill.js?v=v2.0.0-rc8&sv=v0.0.1.2'
		],

		/* The initialization scripts always load last and are automatically and dynamically loaded when AJAX navigation is enabled; */
		bundle: [
			'../assets/components/core_ajaxify/ajaxify.init.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/components/core_preload/preload.pace.init.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/components/widget_twitter/twitter.init.js?v=v2.0.0-rc8&sv=v0.0.1.2', 
			'../assets/components/core/core.init.js?v=v2.0.0-rc8'
		]

	};
	</script>

	<script>
	$script(App.Scripts.core, 'core');

	$script.ready(['core'], function(){
		$script(App.Scripts.plugins_dependency, 'plugins_dependency');
	});
	$script.ready(['core', 'plugins_dependency'], function(){
		$script(App.Scripts.plugins, 'plugins');
	});
	$script.ready(['core', 'plugins_dependency', 'plugins'], function(){
		$script(App.Scripts.bundle, 'bundle');
	});
	</script>
	<script>if (/*@cc_on!@*/false && document.documentMode === 10) { document.documentElement.className+=' ie ie10'; }</script>

	<!-- AUTOCOMPLETE CODE -->
	<script type="text/javascript">
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

		    $("#inputFriend").autocomplete({
		      source: friends_names
		    });
		});
	</script>

	<style type="text/css">
	  .ui-autocomplete {
	    max-height: 400px;
	    overflow-y: auto;

	    /* prevent horizontal scrollbar */
	    overflow-x: hidden;
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
							<form class="form-horizontal" role="form">
							    <div class="form-group">
							        
							        <label for="inputFriend" class="col-sm-2 control-label">Friend</label>
							        
							        <div class="col-sm-9">
							            <input type="text" class="form-control" id="inputFriend" placeholder="Who's this about? Type in a Facebook friend!">
							        </div>

							    </div>
							    <div class="form-group">
							        
							        <label for="inputVibe" class="col-sm-2 control-label">Vibe</label>
							        
							        <div class="col-sm-9">
							            <input type="text" class="form-control" id="inputVibe" placeholder="What do you want to say?">
							        </div>

							    </div>
							    <div class="form-group">

							        <div class="col-sm-offset-2 col-sm-10">
							            <button type="submit" class="btn btn-primary" style="width: 20%">Submit&nbsp;&nbsp;<i class="fa fa-arrow-circle-right"></i> </button>
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
				
				<li>
					<span class="marker"></span>
					<div class="block">
						<div class="caret"></div>
							
							<div class="inline-block box-generic" style="width: 100%; border: 1px solid #ececec;">

								<!-- SOCIAL MEDIA POST FOR TESTING PURPOSES -->

								<div class="widget">

								<!-- Info -->
									<div class="bg-primary">
										<div class="media">
											<div class="media-body innerTB" style="padding-left:20px;">
												<a href="" class="text-white strong">Someone</a>
												<span>upped your <a href="" class="text-white strong">Chillness</a> on 15th January, 2014 <i class="icon-time-clock"></i></span>

											</div>

										</div>
									</div>

									<!-- Content -->
									<div class="innerAll">
										<p class="lead">Yo, Carman lyfe tho. You were a good host!</p>
									</div>
									<!-- Comment -->
									<div class="bg-gray innerAll border-top border-bottom text-small ">
										<span>View all <a href="" class="text-primary">2 Comments</a></span>
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
											<div>I can see this as being true!</div>

										</div>
									</div>

									<!-- Second Comment -->
									<div class="media margin-none bg-gray">
										<a href="" class="pull-left innerAll half">
											<img src="../assets//images/people/100/11.jpg" width="60" class="media-object">
										</a>
										<div class="media-body innerTB">
											<a href="#" class="pull-right innerT innerR">
												<i class="icon-reply-all-fill fa fa-2x text-muted "></i>
											</a>
											<a href="" class="strong text-inverse">Jenny Adams</a> 	<small class="text-muted ">wrote on Jan 15th, 2014</small> <a href="" class="text-small">like</a>
											<div>Yep! So much Keystone haha</div>
										</div>
									</div>
									
									<input type="text" class="form-control" style="border: none;" placeholder="Comment here...">

								</div>
						</div>
					</div>
				</li>

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
	
</body>
</html>