<?php
	session_start();

	// grabbing user ID & name info
	$user = isset( $_GET['user'] ) ? $_GET['user'] : "";
	$name = isset( $_GET['name'] ) ? $_GET['name'] : "";

    $_SESSION['temp_name'] = $name; 

	// picture URL request
	$pic = "https://graph.facebook.com/$user/picture?type=large"
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie lt-ie9 lt-ie8 lt-ie7 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 7]>    <html class="ie lt-ie9 lt-ie8 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if IE 8]>    <html class="ie lt-ie9 paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if gt IE 8]> <html class="ie paceCounter paceSocial footer-sticky"> <![endif]-->
<!--[if !IE]><!--><html class="paceCounter paceSocial footer-sticky"><!-- <![endif]-->
<head>
	<title><?php echo $_SESSION['temp_name']; ?></title>
	
	<!-- Meta -->
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	
	<!-- 
	**********************************************************
	In development, use the LESS files and the less.js compiler
	instead of the minified CSS loaded by default.
	**********************************************************
	<link rel="stylesheet/less" href="../assets/less/admin/module.admin.stylesheet-complete.layout_fixed.true.less" />
	-->

		<!--[if lt IE 9]><link rel="stylesheet" href="../assets/components/library/bootstrap/css/bootstrap.min.css" /><![endif]-->
	
		<link rel="stylesheet" href="../assets/css/admin/module.admin.stylesheet-complete.layout_fixed.true.min.css" />
	
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

	<script src="../assets/plugins/core_ajaxify_loadscript/script.min.js?v=v2.0.0-rc8&sv=v0.0.1.2"></script>

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
	
</head>
<body class=" scripts-async menu-right-hidden">
	
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
				<img src=<?php echo '"' .$pic.'"' ?> class="img-circle" style="width: 100px"/> 
			</div>
			<div class="innerAll border-right pull-left">
				<h3 class="margin-none"><?php echo $_SESSION['temp_name']; ?></h3>
				<span>Works at Anchorage Capital, L.L.C.</span>
			</div>
			<div class="innerAll pull-left">
				<p class="lead margin-none "> <i class="fa fa-quote-left text-muted fa-fw"></i> Hello! This is an optional caption.</p> 
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

			<!-- DENOTES A SPECIFIC POST GROUP (NOT JUST ONE POST) -->
			<div class="widget">
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
				<!-- Comment -->
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